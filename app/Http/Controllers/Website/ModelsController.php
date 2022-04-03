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
        $details = $request->all();
        $about = 'service';
        if($request->device){
            $about = 'device';
        }
        $details['about'] = $about;
        $details['mail_message'] = $request->message;
        Mail::send('emails.inquiry', $details, function($message) use ($emails, $request)
        {
            $message->to($emails)->subject('AM Medical Inquiry');
            $message->from($request->email, $request->first_name . $request->last_name);
            $message->replyTo($request->email, $request->first_name . $request->last_name);
        });
        if( Mail:: failures()){
            return redirect()->back()->with('error', __('general.send_failed_try_again_later'));
        }
        return redirect()->back()->with('success', __('general.message_sent'));
    }
}
