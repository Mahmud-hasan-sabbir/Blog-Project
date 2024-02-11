<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public static $categories,$category;
    public static function createCategory($request)
    {
        self::$categories             = new Category();
        self::$categories->name       = $request->name;
        self::$categories->status     = $request->status;
        self::$categories->save();
    }
    public static function updateCategory($request,$id)
    {
        self::$category = Category::find($id);
        self::$category->name = $request->name;
        self::$category->status = $request->status;
        self::$category->save();
    }

}
