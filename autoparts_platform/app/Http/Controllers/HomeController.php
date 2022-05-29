<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseMail;
use App\Mail\SellMail;
use App\Models\Cart;
use App\Models\Cities;
use App\Models\Parts;
use App\Models\PartsCategories;
use App\Models\Region;
use App\Models\Seller;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\VehicleParts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        $vehicleModels = DB::table('vehicle_models')->orderBy('name', 'asc')->get();
        $vehicleBrands = DB::table('vehicle_brands')->orderBy('name', 'asc')->get();
        $partsCategories = DB::table('parts')->orderBy('name', 'asc')->get();
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

        $vehicleBrands = DB::table('vehicle_brands')->orderBy('name', 'asc')->get();
        $partsCategories = DB::table('parts')->orderBy('name', 'asc')->get();
        $vehicleParts = Parts::all();
        $cities = DB::table('cities')->orderBy('name', 'asc')->get();
        $regions = DB::table('regions')->orderBy('name', 'asc')->get();
        $cart = Cart::where('user_id', $userId)->get();
        $cartCount = DB::table('carts')
            ->where('user_id', $userId)->count();

        $intent = auth()->user()->createSetupIntent();
        return view('carparts.checkout', compact('vehicleBrands', 'partsCategories', 'vehicleParts', 'cart', 'cartCount', 'intent', 'regions', 'cities'));
    }

    public function purchase(Request $request)
    {
    $user          = $request->user();
    $totalPrice = 0;
    $userId = $user->id;
    $buyer['name'] = $request->input('firstName');
    $buyer['surname'] = $request->input('lastName');
    $buyer['email'] = $request->input('email');
    $buyer['address'] = $request->input('address');
    $buyer['city'] = Cities::where('id', $request->input('city'))->get();
    $buyer['region'] = Region::where('id', $request->input('region'))->get();
    $buyer['zip'] = $request->input('zip');
    $carts = Cart::where('user_id', $userId)->get();
        foreach($carts as $cart)
    {
        foreach(Parts::where('id', $cart->part_id)->get() as $part)
        {
            $totalPrice += $part->price;
        } 
    }
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // `source` is obtained with Stripe.js; see https://stripe.com/docs/payments/accept-a-payment-charges#web-create-token
            try {
                \Stripe\Charge::create([
                    'amount' => $totalPrice * 100,
                    'currency' => 'eur',
                    'source' => 'tok_visa',
                    'description' => 'My First Test Charge (created for API docs)',
                    ]);        
                } catch (\Exception $exception) {
                    return back()->with('error', $exception->getMessage());
                }

                foreach($carts as $cart)
                    {
                        foreach(Parts::where('id', $cart->part_id)->get() as $part)
                        {
                            $seller = Seller::where('user_id', $part->user_id)->get();
                            $sellerEmail = $seller[0]->email;
                            Mail::to($seller[0]->email)->send(new SellMail($part, $buyer));
                        } 
                    }

                Mail::to($request->input('email'))->send(new PurchaseMail());
                foreach($carts as $cart)
                    {
                        foreach(Parts::where('id', $cart->part_id)->get() as $part)
                        {
                            $part->delete();
                        } 
                    }
                return back()->with('message', 'Prekės buvo nupirktos!');
    }

}
