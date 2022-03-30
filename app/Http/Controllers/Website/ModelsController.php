<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MailSettings;
use App\Models\ModelBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ModelsController extends Controller
{
    public function show($id)
    {
        $models = ModelBrand::get();
        $model = ModelBrand::with('getImages')->where('id', $id)->first();
        return view('website.model', compact(['model', 'models']));
    }

    public function sendInquiry(Request $request)
    {
        $setup = MailSettings::first();
        $emails = json_decode($setup->to);
//        config(['mail.mailers.smtp.host' => $setup->host]);
//        config(['mail.mailers.smtp.port' => $setup->port]);
//        config(['mail.mailers.smtp.encryption' => $setup->encryption]);
//        config(['mail.mailers.smtp.username' => $setup->username]);
//        config(['mail.mailers.smtp.password' => $setup->password]);
        $details = $request->all();
        Mail::send('emails.inquiry', $details, function($message) use ($emails, $request)
        {
            $message->to($emails)->subject('This is test e-mail');
            $message->from($request->email, $request->first_name . $request->last_name);
            $message->replyTo($request->email, $request->first_name . $request->last_name);
        });
        if( Mail:: failures()){
            return redirect()->back()->with('error', __('general.send_failed_try_again_later'));
        }
        return redirect()->back()->with('success', __('general.message_sent'));
    }
}
