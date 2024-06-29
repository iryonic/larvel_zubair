<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\ContactMessages;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    public function Aboutus()
    {
        return view('frontend.aboutus');
    }
    public function ContactUs()
    {
        return view('frontend.contactus');
    }
    public function Car()
    {
        return view('frontend.car');
    }
    public function Editaboutus()
    {
        $data = Aboutus::find(1);
        return view('backend.aboutus.editaboutus', compact('data'));
    }
    public function UpdateAboutUs(Request $request)
    {
        $website_id = $request->id;
        Aboutus::find($website_id)->update([
            'aboutus' => $request->aboutus,
            'message' => $request->message,
        ]);
        $notification = array(
            'message' => "About Us updated successfully ",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function List()
    {
        $data = ContactMessages::orderBy('id', 'desc')->get();
        return view('backend.contact.list', compact('data'));
    }
    public function Contact(Request $request)
    {
        ContactMessages::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'child' => $request->child,
            'adult' => $request->adult,
            'message' => $request->message,
            'persons' => $request->persons,
            'pickupcity' => $request->pickupcity,
            'pickupdate' => $request->pickupdate,
            'pickuptime' => $request->pickuptime,
            'traveltype' => $request->traveltype,
        ]);
        $notification = array(
            'message' => "Team member added successfully",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
