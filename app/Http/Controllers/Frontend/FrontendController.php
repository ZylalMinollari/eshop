<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index () {
        $featured_products = Product::where('trending','1')->take(15)->get();
        $featured_categories = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index',compact('featured_products','featured_categories'));
    }

    public function category() {
        $categories = Category::where('status','0')->get();
        return view('frontend.category',compact('categories'));
    }

    public function viewCategory($slug) {
        $cat = Category::where('slug', $slug)->exists();
        if($cat) 
        {
            $category = Category::where('slug', $slug)->first();
            $productOfCategory = Product::where('cat_id',$category->id)
                                        ->where('status','0')
                                        ->get();
            return view('frontend.products.index',compact('category','productOfCategory'));                               
        }
        else{
            return redirect('/')->with('status',"Slug Does Not Exists");
        }
    }
}
