<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $products,$product,$image,$imageName,$imageUrl,$directory;

    public static function uploadImage($request,$product= null)
    {
        self::$image = $request->file('image');
        if (self::$image)
        {
            if ($product)
            {
                if (file_exists($product->image))
                {
                    unlink($product->image);
                }
            }
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'admin/assets/uploades-file/';
            self::$image->move(self::$directory,self::$imageName);
            self::$imageUrl = self::$directory.self::$imageName;
        }else{
            if ($product)
            {
                self::$imageUrl = $product->image;
            }else{
                self::$imageUrl = null;
            }

        }

        return self::$imageUrl;
    }

    public static function createProduct($request)
    {
        self::$products                     = new Product();
        self::$products->category_id        = $request->category_id;
        self::$products->brand_id           = $request->brand_id;
        self::$products->name               = $request->name;
        self::$products->price              = $request->price;
        self::$products->description        = $request->description;
        self::$products->image              = self::uploadImage($request);
        self::$products->status             = $request->status;
        self::$products->save();

    }
    public static function updateProduct($request,$id)
    {
        self::$product = Product::find($id);
        self::$product->category_id        = $request->category_id;
        self::$product->brand_id           = $request->brand_id;
        self::$product->name               = $request->name;
        self::$product->price              = $request->price;
        self::$product->description        = $request->description;
        self::$product->image              = self::uploadImage($request,self::$product);
        self::$product->status             = $request->status;
        self::$product->save();

    }





    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
