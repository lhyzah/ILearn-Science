<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        return view('blog');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function adminLogin()
    {
        return view('admin-login');
    }

    public function adminDashboard()
    {
        return view('admin-dashboard');
    }

    public function blogAdmin()
    {
        return view('blog-admin');
    }

    public function missionControl()
    {
        return view('mission-control');
    }

    public function orders()
    {
        return view('orders');
    }

    public function orderSuccess()
    {
        return view('order-success');
    }

    public function shop()
    {
        return view('shop');
    }

    public function cellBiology()
    {
        return view('resources.cell-biology');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'business_type' => ['required', 'string', 'max:255'],
        ]);

        return 'Generated successfully';
    }
}
