<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class ProductController extends Controller
{
    protected function getRules()
    {
        return [
            'name_en' => 'required',
            'name_ar' => 'required',
            'code' => 'required',
            'quantity' => 'required|numeric|min:0',
            'color_en' => 'required',
            'color_ar' => 'required',
            'sell_price' => 'required|numeric|min:0',
            'discount_price' => 'numeric|min:0',
            'short_descp_en' => 'required',
            'short_descp_ar' => 'required',
            'long_descp_en' => 'required',
            'long_descp_ar' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
            'brand' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ];
    }

    protected function getMSG()
    {
        return [
            'name_en.required' => __('This field is required'),
            'name_ar.required' => __('This field is required'),
            'code.required' => __('This field is required'),
            'quantity.required' => __('This field is required'),
            'quantity.numeric' => __('Must be a number'),
            'quantity.min' => __('Must be grater than 0'),
            'color_en.required' => __('This field is required'),
            'color_ar.required' => __('This field is required'),
            'sell_price.required' => __('This field is required'),
            'sell_price.numeric' => __('Must be a number'),
            'sell_price.min' => __('Must be grater than 0'),
            'discount_price.numeric' => __('Must be a number'),
            'discount_price.min' => __('Must be grater than 0'),
            'short_descp_en.required' => __('This field is required'),
            'short_descp_ar.required' => __('This field is required'),
            'long_descp_en.required' => __('This field is required'),
            'long_descp_ar.required' => __('This field is required'),
            'thumbnail.required' => __('This field is required'),
            'brand.required' => __('This field is required'),
            'category_id.required' => __('This field is required'),
            'subcategory_id.required' => __('This field is required'),
        ];
    }

    public function AddProduct()
    {
        $categories = Category::orderBy('name_en', 'ASC')->get();
        return view('admin.product.product_add', compact('categories'));
    }

    public function StoreProduct(Request $request)
    {
        $rules = $this->getRules();
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

//        return $request;
        $thumbnail_img = $request->file('thumbnail');
        $name_gen = hexdec(uniqid('thu', true)) . '.' . $thumbnail_img->getClientOriginalExtension();
        Image::Make($thumbnail_img)->resize(500, 600)->save('upload/products/thumbnail/' . $name_gen);
        $save_thumbnail_img = 'upload/products/thumbnail/' . $name_gen;

        $product = Product::create([
            'name_en' => strtolower($request->name_en),
            'name_ar' => $request->name_ar,
            'code' => $request->code,
            'quantity' => $request->quantity,
            'color_en' => $request->color_en,
            'color_ar' => $request->color_ar,
            'sell_price' => $request->sell_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ar' => $request->long_descp_ar,
            'thumbnail' => $save_thumbnail_img,
            'special_offer' => $request->special_offer ? $request->special_offer : 0,
            'brand' => $request->brand,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);

        /*----- Multi IMG Upload -----*/
        $multi_imgs = $request->file('multi_img');
        $product_id = Product::orderBy('id', 'desc')->first();
        foreach ($multi_imgs as $multi_img) {
            $name_gen = hexdec(uniqid('multi', true)) . '.' . $multi_img->getClientOriginalExtension();
            Image::Make($multi_img)->resize(500, 600)->save('upload/products/multi-image/' . $name_gen);
            $save_multi_img = 'upload/products/multi-image/' . $name_gen;

            MultiImg::create([
                'product_id' => $product_id->id,
                'name' => $save_multi_img,
            ]);
        }

        $notification = [
            'message' => __('Product added successfully'),
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
