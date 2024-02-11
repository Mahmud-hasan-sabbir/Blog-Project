<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $categories,$brands,$products,$product;
    public function addProduct()
    {
        $this->categories = Category::where('status',1)->get();
        $this->brands = Brand::where('status',1)->get();
        return view('admin.product.add-product',[
            'categories'=>$this->categories,
            'brands'=>$this->brands,
        ]);
    }
    public function newProduct(Request $request)
    {
        Product::createProduct($request);
        return redirect()->back()->with('message','add product save successfully');

    }
    public function manageProduct()
    {
        $this->products = Product::orderBy('id','DESC')->get();
        return view('admin.product.manage',[
            'products'=>$this->products,
        ]);
    }
    public function deleteProduct($id)
    {
        $this->product = Product::find($id);
        if (file_exists($this->product->image))
        {
            unlink($this->product->image);
        }
        $this->product->delete();
        return redirect()->back()->with('message','delete product successfully');
    }
    public function editProduct($id)
    {
        $this->categories = Category::where('status',1)->get();
        $this->brands = Brand::where('status',1)->get();
        $this->product = Product::find($id);
        return view('admin.product.edit',[
           'product'=>$this->product,
            'categories'=>$this->categories,
            'brands'=>$this->brands,

        ]);
    }
    public function updateProduct(Request $request,$id)
    {
        Product::updateProduct($request,$id);
        return redirect('/manage-product')->with('message','update product succesfully');
    }
}
