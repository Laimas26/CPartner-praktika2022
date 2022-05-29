<?php

namespace App\Http\Controllers;

use App\Models\Parts;
use App\Models\PartsCategories;
use App\Models\Seller;
use App\Models\User;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiclePartsController extends Controller
{
    

    public function store(Request $request)
    {
        // data validation
        $user = Auth::user();
        $ownerId = Auth::id();

        $seller = Seller::where([
            ['user_id', $ownerId]
        ])->first();
        
        $data = $request->validate([
            'model_id' => 'required',
            'part_name' => 'required',
            'part_category' => 'required',
            'part_wear' => 'required',
            'make_years' => 'required',
            'price' => 'required',
            'identifier_number' => '',
            'part_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        

        if($data['part_image'] != null)
        {
            $imageName = $file_name = $request->file('part_image')->hashName();
            $path = $request->file('part_image')->store('public/images'); 
        }

        $part = Parts::create(
            [
                'model_id' => $data['model_id'],
                'user_id' => $ownerId,
                'name' => $data['part_name'],
                'make_years' => $data['make_years'],
                'image_path' => $imageName,
                'part_wear' => $data['part_wear'],
                'price' => $data['price'],
            ]
        );
        $categoryId = $data['part_category'];

        $partCategory = PartsCategories::where('id', $categoryId)->first();

        $part->category()->associate($partCategory);
        $part->seller()->associate($user);

        $part->save();

        return redirect('sellparts');
    }

    function getParts(Request $request)
    {
        $modelId = $request->input('id');
        // error_log($modelId);
        $parts = Parts::where('model_id', $modelId)->get();
        return response()->json([
            'parts' => $parts
        ]);
    }
    function getOnePart(Request $request)
    {
        $partId = $request->input('id');
        $userId = $request->input('user_id');
        $modelId = $request->input('model_id');
        $categoryId = $request->input('category_id');

        $part = Parts::where('id', $partId)->get();
        $user = Seller::where('user_id', $userId)->get();
        $model = VehicleModel::where('id', $modelId)->get();
        $category = PartsCategories::where('id', $categoryId)->get();

        return response()->json([
            'part' => $part,
            'user' => $user,
            'model' => $model,
            'category' => $category,
        ]);
    }
    function filterParts(Request $request)
    {
        $modelId = $request->input('id');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $wearFilter = $request->input('wearFilter');
        $categoryFilter = $request->input('partsCategory');
        // error_log($modelId);
        
        if(!empty($fromDate) && !empty($toDate) && !empty($wearFilter))
        {
            $parts = Parts::where('model_id', $modelId)
        ->where('make_years', '>=', $fromDate)
        ->where('make_years', '<=', $toDate)
        ->where('part_wear', '=', $wearFilter)->get();
        }
        else if(!empty($fromDate) && !empty($toDate) && empty($wearFilter))
        {
            $parts = Parts::where('model_id', $modelId)
        ->where('make_years', '>=', $fromDate)
        ->where('make_years', '<=', $toDate)->get();
        }
        else if(!empty($fromDate) && empty($toDate) && empty($wearFilter))
        {
            $parts = Parts::where('model_id', $modelId)
        ->where('make_years', '>=', $fromDate)->get();
        }
        else if(!empty($fromDate) && empty($toDate) && !empty($wearFilter))
        {
            $parts = Parts::where('model_id', $modelId)
        ->where('make_years', '>=', $fromDate)
        ->where('part_wear', '=', $wearFilter)->get();
        }
        else if(empty($fromDate) && !empty($toDate) && empty($wearFilter))
        {
            $parts = Parts::where('model_id', $modelId)
        ->where('make_years', '<=', $toDate)->get();
        }
        else if(empty($fromDate) && !empty($toDate) && !empty($wearFilter))
        {
            $parts = Parts::where('model_id', $modelId)
        ->where('make_years', '<=', $toDate)
        ->where('part_wear', '=', $wearFilter)->get();
        }

        if(!empty($categoryFilter))
        {
            $parts = $parts->where('category_id', $categoryFilter);
        }
        

        return response()->json([
            'parts' => $parts
        ]);
    }
}
