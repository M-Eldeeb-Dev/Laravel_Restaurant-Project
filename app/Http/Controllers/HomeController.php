<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $meals = Meal::with('category')->latest()->get();
        $categories = Category::all();
        return view('home', compact('meals', 'categories'));
    }


    public function category($id)
    {
        $meals = Meal::where('category_id', $id)->get();
        $categories = Category::all();
        return view('home', compact('meals', 'categories'));
    }

}
