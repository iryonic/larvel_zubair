<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\itinerary;
use App\Models\PackageDetail;
use Illuminate\Http\Request;

class FrontendPackageController extends Controller
{
    //
    public function AllPackage()
    {
        $packages = PackageDetail::latest()->get();
        return view('frontend.package.all_packages', compact('packages'));
    }
    public function PackageDetailPage($id)
    {
        $packageDetail = PackageDetail::find($id);
        $itinerary = itinerary::where('packagetype_id', $id)->get();



        return view('frontend.package.package_detail', compact('packageDetail', 'itinerary'));
    }
}