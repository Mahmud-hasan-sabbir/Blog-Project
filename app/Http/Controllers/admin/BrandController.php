<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public $brands,$brand;
    public function addBrand()
    {
        return view('admin.brand.add-brand');
    }
    public function newBrand(Request $request)
    {
        Brand::createBrand($request);
        return redirect()->back()->with('message','Brand Save successfully');
    }
    public function manageBrand()
    {
        $this->brands = Brand::orderBy('id','DESC')->get();
        return view('admin.brand.manage-brand',[
            'brands'=>$this->brands,
        ]);
    }
    public function editBrand($id)
    {
        $this->brand = Brand::find($id);
        return view('admin.brand.edit',[
            'brand'=>$this->brand,
        ]);
    }
    public function updateBrand(Request $request,$id)
    {
        Brand::updateBrand($request,$id);
        return redirect('/manage-brand')->with('message','update Brand save successfully');
    }
    public function deleteBrand($id)
    {
        $this->brand = Brand::find($id);
        $this->brand->delete();
        return redirect()->back()->with('message','delete Brand successfully');
    }

}
