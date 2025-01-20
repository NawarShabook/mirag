<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Illuminate\Validation\ValidationException;

use OneSignal;
class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index' ,'show']);
        // $this->middleware('auth')->only(['show' ,'index']);
        $this->middleware('auth:sanctum');
        // $this->middleware(['isAdmin'])->except(['index','show']);

    }

    public function user_orders()
    {
        $user = auth()->user();

        $orders_type = config('global_data.orders_type');

        $user_orders = [];
        foreach ($orders_type as $type) {
            $user_orders[$type] = $this->get_user_orders($type,$user->id);
            // return $user_orders[$type];

        }

        return $user_orders;
    }

    public function store(StoreOrderRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            // return $data;
            $order = Order::create($data);

            if ($order->user && $order->user->onesignal_playerid) {
                $message = $this->get_order_type_name($order);
                OneSignal::sendNotificationToUser(
                    $this->order_status_notification_message('waiting', $message),
                    $order->user->onesignal_playerid,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );
            }

            return response()->json([
                'message' => 'Success',
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => "Error.".$e->errors(),
            ], 422);
        }

    }

    public function cancel_order($order_id)
    {
        $order = Order::where('id',$order_id)->first();
        if(!$order || $order->user_id!==auth()->user()->id)
        {
            return response()->json([
                'message' => 'Not Allowed.',
            ], 401);
        }
        if($order->user_id!==auth()->user()->id)
        {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }
        if($order->status=='completed')
        {
            return response()->json([
                'message' => 'Cannot cancel completed orders.',
            ], 400);
        }
        try {
            $order->status = 'cancelled';
            $order->save();
            if ($order->user && $order->user->onesignal_playerid) {
                $message = $this->get_order_type_name($order).' بنجاح';
                OneSignal::sendNotificationToUser(
                    $this->order_status_notification_message($order->status, $message),
                    $order->user->onesignal_playerid,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );
            }
            return response()->json([
                'message' => 'Success.',
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Error.',
            ], 404);
        }
    }

    private function get_user_orders(string $order_type, $user_id)
    {
        $status_map = ['waiting'=>2, 'accepted'=>3, 'completed'=>4];
        return \App\Models\Order::whereNotNull($order_type . '_id')
        ->where('user_id', $user_id)
        ->where('status', '!=', 'cancelled')
        ->with("$order_type:id,name")
        ->orderBy('updated_at','desc')
        ->orderBy('status')
        ->get(['id', 'status', $order_type . '_id', 'created_at'])
        ->map(function ($order) use ($status_map, $order_type) {
            return [
                'id' => $order->id,
                'created_at' => $order->created_at->format('Y-m-d  h:i A'),
                'status' => $order->status,
                'status_number' => $status_map[$order->status],
                $order_type . '_id' => $order->$order_type->id ?? null,
                $order_type . '_name' => $order->$order_type->name ?? null,
            ];
        });

    }

    private function get_order_type_name(Order $order)
    {
        if($order->workshop_id)
        {
            return '('.$order->workshop->name.')';
        }
        elseif($order->maintenance_service_id)
        {
            if($order->status == 'accepted'){
                return ' مهني ('.$order->maintenance_service->name.')';
            }
            return ' خدمة ('.$order->maintenance_service->name.')';
        }
        elseif($order->heavy_machine_id)
        {
            return '('.$order->heavy_machine->name.')';
        }
        return '';
    }
    private function order_status_notification_message($order_status, $message='', $user_name='', )
    {

        $status_dict = [
            "waiting" => "تم إرسال طلبك ، $message بنجاح .",
            "accepted" => "تم قبول طلبك ، $message في الطريق إليك .",
            "completed" => "تم إكمال الطلب بنجاح ، شكرا لاستخدامك خدماتنا ($user_name)",
            "cancelled" => "تم إلغاء طلبك $message",
        ];

        return $status_dict[$order_status];
    }
}
