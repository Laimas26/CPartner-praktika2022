<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Parts;
use App\Models\PartsCategories;
use App\Models\Seller;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $seller = Seller::create(
            [
                'name' => $data['name'],
                'address' => $data['address'],
                'email' => $data['email'],
                'phone' => $data['phone']
            ]
        );
        $seller->user()->associate($user);

        $seller->save();

        return view('index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }

    public function sellaccount()
    {
        Auth::check();
        $user = Auth::user();
        $userId = Auth::id();

        $seller = Seller::where('user_id', $userId)->first();
        $vehicleBrands = VehicleBrand::all();
        $vehicleModels = VehicleModel::all();
        $vehicleParts = Parts::all();
        $partsCategories = PartsCategories::all();
        $cart = Cart::where('user_id', $userId)->get();
        $cartCount = DB::table('carts')
            ->where('user_id', $userId)->count();

        if($seller)
        {
            return view('carparts.sellparts', compact('vehicleBrands', 'vehicleModels', 'vehicleParts' , 'partsCategories', 'cart', 'cartCount'));
        }
        else
        {
            return view('carparts.sellaccount', compact('vehicleBrands', 'vehicleModels', 'vehicleParts' , 'partsCategories', 'cart', 'cartCount'));
        }
        
    }
    public function sellparts()
    {
        Auth::check();
        $user = Auth::user();
        $userId = Auth::id();

        $seller = Seller::where('user_id', $userId)->first();
        $vehicleBrands = VehicleBrand::all();
        $vehicleModels = VehicleModel::all();
        $vehicleParts = Parts::all();
        $partsCategories = PartsCategories::all();
        $cart = Cart::where('user_id', $userId)->get();
        $cartCount = DB::table('carts')
            ->where('user_id', $userId)->count();

            return view('carparts.sellparts', compact('vehicleBrands', 'vehicleModels', 'vehicleParts' , 'partsCategories', 'cart', 'cartCount'));

        
    }

    public function getModelss(Request $request) 
    {
        $brandId = $request->input('id');
        // $brandId = $request->input('tekstas');

        $models = VehicleModel::where('brand_id', $brandId)->get();
    }

    public function getModels(Request $request)
    {
        $brandId = $request->input('id');
        error_log($brandId);
        $models = VehicleModel::where('brand_id', $brandId)->get();
        return response()->json([
            'models' => $models,
        ]);
    }

}
