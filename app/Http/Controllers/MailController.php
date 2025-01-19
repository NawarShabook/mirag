<?php

namespace App\Http\Controllers;

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

            return redirect()->back()->with('email_message_success', 'تم إرسال الإيميل بنجاح!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('email_message_errors', $th->getMessage());
        }

    }
}
