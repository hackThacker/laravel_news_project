<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\Company;
use App\Models\post;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $company = Company::first(); // Retrieve the first company record
        $categories = Category::all(); // Retrieve all categories
        $advertise = Advertise::all();
        $posts = post::all();

        View::share([
            'company' => $company, // Share company data with all views
            'categories' => $categories, // Share categories data with all views
            'advertise' => $advertise,
            'posts' =>  $posts,
        ]);
    }

    public function home()
    {
        $latest_news = post::orderBy('id', 'desc')->first();
        $posts = post::orderBy('id', 'desc')->limit(5)->get();
        $trending_news = post::orderBy('views', 'desc')->limit(5)->get();
        return view('frontend.home', compact('latest_news', 'posts', 'trending_news')); // Return the view for the home page
    }
    public function categories($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts;
        return view('frontend.category', compact('posts'));
    }
    public function news($id){
        $news = post::find($id);
        $news->increment('views');
        return view('frontend.news', compact('news'));
    }
}
