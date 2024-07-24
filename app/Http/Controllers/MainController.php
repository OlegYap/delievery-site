<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getMainPage()
    {
        if (!Auth::id()) {
            return view('register');
        }
        $products = Product::all();
        return view('main', ['products' => $products]);
    }
}
