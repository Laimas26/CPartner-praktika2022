<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Parts;
use App\Models\PartsCategories;
use App\Models\Seller;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\VehicleParts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function aboutUs()
    {
        return redirect()->route('index', ['#about']);
    }
    public function contact()
    {
        return redirect()->route('index', ['#contact']);
    }
    public function search()
    {
        Auth::check();
        $user = Auth::user();
        $userId = Auth::id();

        $seller = Seller::where('user_id', $userId)->first();
        $vehicleBrands = VehicleBrand::all();
        $vehicleModels = VehicleModel::all();
        $partsCategories = PartsCategories::all();
        $vehicleParts = Parts::all();
        $cart = Cart::where('user_id', $userId)->get();
        $cartCount = DB::table('carts')
            ->where('user_id', $userId)->count();
        // dd($cart);
        return view('carparts.search', compact('vehicleBrands', 'partsCategories', 'vehicleParts', 'cart', 'cartCount'));
    }

    public function checkout()
    {
        Auth::check();
        $user = Auth::user();
        $userId = Auth::id();

        $vehicleBrands = VehicleBrand::all();
        $partsCategories = PartsCategories::all();
        $vehicleParts = Parts::all();
        $cart = Cart::where('user_id', $userId)->get();
        $cartCount = DB::table('carts')
            ->where('user_id', $userId)->count();

        $intent = auth()->user()->createSetupIntent();
        return view('carparts.checkout', compact('vehicleBrands', 'partsCategories', 'vehicleParts', 'cart', 'cartCount', 'intent'));
    }

    public function purchase(Request $request)
{
    $user          = $request->user();
    $paymentMethod = $request['payment_method'];
    $totalPrice = 0;
    $userId = $user->id;
    dd($paymentMethod);
    $carts = Cart::where('user_id', $userId)->get();
    foreach($carts as $cart)
    {
        foreach(Parts::where('id', $cart->part_id)->get() as $part)
        {
            $totalPrice += $part->price;
        } 
    }
    

    // dd($totalPrice);

    try {
        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->charge($totalPrice * 100, $paymentMethod);        
    } catch (\Exception $exception) {
        return back()->with('error', $exception->getMessage());
    }

    return back()->with('message', 'Product purchased successfully!');
}

}
