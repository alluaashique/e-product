<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductReview;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ProductReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_uuid' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'review' => 'required|string'
        ]);
        $product = Product::where('is_active', 1)
                        ->where('uuid', $request->product_uuid)
                        ->first();
        if(!$product)
        {
            return back()->withInput();
        }



        DB::beginTransaction();
        try {
            $data = ProductReview::create(
                [
                    'product_id'=> $product->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'review' => $request->review
                ]
            );
            DB::commit();
            if($data)
            {
                Toastr::success('Your message has been sent successfully.');
                return redirect()->route('product.show',$product->uuid);
            }
            else
            {
                Toastr::error('Something went wrong. Please try again.');
                return redirect()->route('product.show',$product->uuid);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ProductReviewController::store");
            Log::error($e);
            Toastr::error('Something went wrong. Please try again.');
            return redirect()->route('product.show',$product->uuid);
        }
    }
}
