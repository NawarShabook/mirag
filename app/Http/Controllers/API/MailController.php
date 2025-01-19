<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {

        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'message_title' => $request->message_title,
                'details' => $request->details,
                'service' => $request->service,
            ];

            Mail::to('mirag@mirag.pro')->send(new SendMail($data));

            return response()->json([
                'message' => 'تم إرسال الإيميل بنجاح',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 404);
        }

    }
}
