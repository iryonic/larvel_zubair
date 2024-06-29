<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class HomePageController extends Controller
{
    //
    public function manageHome()
    {
        $data = Homepage::find(1);
        return view('backend.homepage.edithomepage', compact('data'));
    }

    public function UpdateHomePage(Request $request)
    {
        $website_id = $request->id;

        if ($request->file('homeimage')) {
            $image = $request->file('homeimage');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(1536, 720)->save('upload/homeimage/' . $name_gen);
            $image->move(public_path('upload/homeimage'), $name_gen);
            $save_url = 'upload/homeimage/' . $name_gen;

            Homepage::find($website_id)->update([
                'headertext' => $request->headertext,
                'headerparagraph' => $request->headerparagraph,
                'whatsappnumber' => $request->whatsappnumber,
                'whychooseusdescription' => $request->whychooseusdescription,
                'servicetitleone' => $request->servicetitleone,
                'serviceparaone' => $request->serviceparaone,
                'servicetitltwo' => $request->servicetitltwo,
                'serviceparatwo' => $request->serviceparatwo,
                'servicetitlethree' => $request->servicetitlethree,
                'serviceparathree' => $request->serviceparathree,
                'thirdheading' => $request->thirdheading,
                'thirdparagrapgh' => $request->thirdparagrapgh,
                'bestpackpara' => $request->bestpackpara,
                'bestpackheading' => $request->bestpackheading,
                'homeimage' => 'upload/homeimage/' . $name_gen,

            ]);
            $notification = array(
                'message' => "Website updated successfully with image",
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } elseif ($request->file('whychooseusimage')) {
            $imagesecond = $request->file('whychooseusimage');
            $name_gens = hexdec(uniqid()) . '.' . $imagesecond->getClientOriginalExtension();

            Image::make($imagesecond)->resize(713, 724)->save('upload/whychooseusimage/' . $name_gens);
            $imagesecond->move(public_path('upload/whychooseusimage'), $name_gens);
            $save_urls = 'upload/whychooseusimage/' . $name_gens;

            Homepage::find($website_id)->update([
                'headertext' => $request->headertext,
                'headerparagraph' => $request->headerparagraph,
                'whatsappnumber' => $request->whatsappnumber,
                'whychooseusdescription' => $request->whychooseusdescription,
                'servicetitleone' => $request->servicetitleone,
                'serviceparaone' => $request->serviceparaone,
                'servicetitltwo' => $request->servicetitltwo,
                'serviceparatwo' => $request->serviceparatwo,
                'servicetitlethree' => $request->servicetitlethree,
                'serviceparathree' => $request->serviceparathree,
                'thirdheading' => $request->thirdheading,
                'thirdparagrapgh' => $request->thirdparagrapgh,
                'bestpackpara' => $request->bestpackpara,
                'bestpackheading' => $request->bestpackheading,
                'whychooseusimage' => 'upload/whychooseusimage/' . $name_gens,
            ]);
            $notification = array(
                'message' => "Website updated successfully with image",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } elseif ($request->file('serviceimage')) {
            $imagesecond = $request->file('serviceimage');
            if ($imagesecond) {
                $directory = 'upload/serviceimage/';
                if (!empty($save_urls) && File::exists(public_path($save_urls))) {
                    File::delete(public_path($save_urls));
                }
                $name_gens = '1.' . $imagesecond->getClientOriginalExtension();
                Image::make($imagesecond)->resize(713, 924)->save(public_path($directory . $name_gens));
                $save_urls = $directory . $name_gens;
            }
            Homepage::find($website_id)->update([
                'headertext' => $request->headertext,
                'headerparagraph' => $request->headerparagraph,
                'whatsappnumber' => $request->whatsappnumber,
                'whychooseusdescription' => $request->whychooseusdescription,
                'servicetitleone' => $request->servicetitleone,
                'serviceparaone' => $request->serviceparaone,
                'servicetitltwo' => $request->servicetitltwo,
                'serviceparatwo' => $request->serviceparatwo,
                'servicetitlethree' => $request->servicetitlethree,
                'serviceparathree' => $request->serviceparathree,
                'thirdheading' => $request->thirdheading,
                'thirdparagrapgh' => $request->thirdparagrapgh,
                'bestpackpara' => $request->bestpackpara,
                'bestpackheading' => $request->bestpackheading,
                'serviceimage' => 'upload/serviceimage/' . $name_gens,
            ]);
            $notification = array(
                'message' => "Website updated successfully with image",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            Homepage::find($website_id)->update([
                'headertext' => $request->headertext,
                'headerparagraph' => $request->headerparagraph,
                'whatsappnumber' => $request->whatsappnumber,
                'whychooseusdescription' => $request->whychooseusdescription,
                'servicetitleone' => $request->servicetitleone,
                'serviceparaone' => $request->serviceparaone,
                'servicetitltwo' => $request->servicetitltwo,
                'serviceparatwo' => $request->serviceparatwo,
                'servicetitlethree' => $request->servicetitlethree,
                'serviceparathree' => $request->serviceparathree,
                'thirdheading' => $request->thirdheading,
                'thirdparagrapgh' => $request->thirdparagrapgh,
                'bestpackpara' => $request->bestpackpara,
                'bestpackheading' => $request->bestpackheading,

            ]);
            $notification = array(
                'message' => "Website updated successfully without image",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
