<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\itinerary;
use App\Models\ManagePackages;
use App\Models\PackageDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PackageDetailController extends Controller
{
    //
    public function EditPackage($id)
    {

        $itinerary = itinerary::where('packagetype_id', $id)->get();

        $editData = PackageDetail::find($id);
        return view('backend.packdetails.packs.edit_package', compact('editData', 'itinerary'));
    }
    public function UpdatePackage(Request $request, $id)
    {
        $pack = PackageDetail::find($id);
        $packtype = ManagePackages::find($pack->packagetype_id);
        $packtype->name = $request->name;
        $pack->price = $request->price;
        $pack->exclusions = $request->exclusions;
        $pack->discount = $request->discount;
        $pack->title = $request->maintitle;
        $pack->short_desc = $request->short_desc;
        $pack->inclusions = $request->inclusions;
        $pack->exclusions = $request->exclusions;

        $pack->status = 1;
        $packtype->save();

        // update single images or feature image
        if ($request->file('image')) {

            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('upload/packageimage/'), $name_gen);
            $pack->image = $name_gen;
            if ($pack->getOriginal('image')) {
                @unlink(public_path('upload/packageimage/' . $pack->getOriginal('image')));
            }
        }
        $pack->save();

        itinerary::where('packagetype_id', $id)->delete();

        $packs = Count($request->title);

        for ($i = 0; $i < $packs - 1; $i++) {
            $fcountt = new itinerary();
            $fcountt->packagetype_id = $pack->id;
            $fcountt->day_number = $request->day_number[$i];
            // $fcount->image_url = $request->image_url[$i];
            $fcountt->from_destination = $request->from_destination[$i] ?? null; // Use null if value is not set
            $fcountt->to_destination = $request->to_destination[$i];
            $fcountt->description = $request->description[$i];
            $fcountt->title = $request->title[$i];
            $fcountt->save();
        }





        $notification = array(
            'message' => "Package updated Succesfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function DeleteSavedPack($id)
    {
        itinerary::where('id', $id)->delete();
        $notification = array(
            'message' => "Day plan deleted successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function DeletePackage(Request $request, $id)
    {
        $room = PackageDetail::find($id);
        if (file_exists('upload/packageimage/' . $room->image) and !empty($room->image)) {
            @unlink('upload/packageimage/' . $room->image);
        }
        ManagePackages::where('id', $room->packagetype_id)->delete();
        itinerary::where('packagetype_id', $room->id)->delete();
        $room->delete();
        $notification = array(
            'message' => "Package deleted succesfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

