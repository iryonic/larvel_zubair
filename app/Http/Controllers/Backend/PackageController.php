<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ManagePackages;
use App\Models\PackageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PackageController extends Controller
{
    public function ManagePackageList()
    {
        $allData = ManagePackages::orderBy('id', 'desc')->get();
        return view('backend.packdetails.package.manage_package', compact('allData'));
    }
    public function PackageNameStore(Request $request)
    {
        $packagetype_id = ManagePackages::insertGetId([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        PackageDetail::insert([
            'packagetype_id' => $packagetype_id,
        ]);

        $notification = array(
            'message' => "Package Type inserted successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('manage.package.list')->with($notification);
    }

}