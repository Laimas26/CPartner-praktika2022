<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();

        $seller = Seller::where('user_id', $userId)->first();

        return view('index', compact('seller', 'userId'));
    }
    // public function index()
    // {
    //     return view('index');
    // }
    public function aboutUs()
    {
        return redirect()->route('index', ['#about']);
        // return view('index');
    }
    public function contact()
    {
        return redirect()->route('index', ['#contact']);
        // return view('index');
    }
    public function search()
    {
        return view('carparts.search');
    }

}
