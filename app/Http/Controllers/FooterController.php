<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    //
    public function ManageFooter()
    {
        $datas = Footer::find(1);
        return view('backend.footer.footer',compact('datas'));
    }
    public function UpdateFooter(Request $request)
    {
        $thisid = $request->id;
        footer::find($thisid)->update([
            'footertitle' => $request->footertitle,
            'footerpara' => $request->footerpara,
            'fb' => $request->fb,
            'ig' => $request->ig,
            'privacy' => $request->privacy,
            'twitter' => $request->twitter,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'alphone' => $request->alphone,
        ]);
        $notification = array(
            'message' => "Footer updated successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
