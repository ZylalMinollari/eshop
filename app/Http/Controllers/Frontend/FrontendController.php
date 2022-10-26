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

    public function viewProduct($category_slug, $product_slug) {
            $cat = Category::where('slug', $category_slug)->exists();
            $prod = Product::where('slug', $product_slug)->exists();

            if($cat) {
                if($prod) {
                    $products = Product::where('slug',$product_slug)->first();
                    return view('frontend.products.view',compact('products'));
                }

                else {
                    return redirect('/')->with('status',"The link was broken");
                }
            }
            else {
                return redirect('/')->with ('status',"No such category found");
            }

    }
}
