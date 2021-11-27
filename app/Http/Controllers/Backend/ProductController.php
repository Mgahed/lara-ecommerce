<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
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
            /*'discount_price' => 'numeric|min:0',*/
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
            /*'discount_price.numeric' => __('Must be a number'),
            'discount_price.min' => __('Must be grater than 0'),*/
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
        $name_gen = md5($thumbnail_img->getClientOriginalName()) . strtotime(Carbon::now()) . '.' . $thumbnail_img->getClientOriginalExtension();
        Image::Make($thumbnail_img)->resize(400, 400)->save('upload/products/thumbnail/' . $name_gen);
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
            $name_gen = md5($multi_img->getClientOriginalName()) . strtotime(Carbon::now()) . '.' . $multi_img->getClientOriginalExtension();
            Image::Make($multi_img)->resize(400, 400)->save('upload/products/multi-image/' . $name_gen);
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

    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.product_view', compact('products'));
    }

    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::orderBy('name_en', 'asc')->get();
        $product = Product::with('subcategory')->findOrFail($id);

        return view('admin.product.product_edit', compact('product', 'categories', 'multiImgs'));
    }

    public function ProductDataUpdate(Request $request)
    {
        $rules = $this->getRules();
        unset($rules['thumbnail']);
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        Product::findOrFail($request->id)->update([
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
            'special_offer' => $request->special_offer ? $request->special_offer : 0,
            'brand' => $request->brand,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);

        $notification = [
            'message' => __('Product updated without updating Images'),
            'alert-type' => 'success'
        ];

        return redirect()->route('manage-product')->with($notification);
    }

    public function MultiImageUpdate(Request $request)/*----- For multi img update -----*/
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->name);

            $name_gen = md5($img->getClientOriginalName()) . strtotime(Carbon::now()) . '.' . $img->getClientOriginalExtension();
            Image::Make($img)->resize(400, 400)->save('upload/products/multi-image/' . $name_gen);
            $save_multi_img = 'upload/products/multi-image/' . $name_gen;

            $imgDel->update([
                'name' => $save_multi_img,
            ]);
        }

        $notification = [
            'message' => __('Product multi image updated successfully'),
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function ThambnailImageUpdate(Request $request)
    {
        $product_id = $request->id;
        $oldImg = $request->old_img;
        unlink($oldImg);

        $img = $request->file('product_thumbnail');

        $name_gen = md5($img->getClientOriginalName()) . strtotime(Carbon::now()) . '.' . $img->getClientOriginalExtension();
        Image::Make($img)->resize(400, 400)->save('upload/products/thumbnail/' . $name_gen);
        $save_multi_img = 'upload/products/thumbnail/' . $name_gen;

        Product::findOrFail($product_id)->update([
            'thumbnail' => $save_multi_img
        ]);

        $notification = [
            'message' => __('Product main image updated successfully'),
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function MultiImageDelete($id)
    {
        $img = MultiImg::findOrFail($id);
        unlink($img->name);
        $delete = $img->delete();
        if ($delete) {
            $notification = [
                'message' => __('Image deleted successfully'),
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        $notification = [
            'message' => __('Can not delete image successfully'),
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id)
    {
        $product = Product::with('multiimg')->findOrFail($id);
        foreach ($product->multiimg as $img) {
            unlink($img->name);
            MultiImg::findOrFail($img->id)->delete();
        }
        unlink($product->thumbnail);
        $delete = $product->delete();
        if ($delete) {
            $notification = [
                'message' => __('Product deleted successfully'),
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        $notification = [
            'message' => __('Can not delete product successfully'),
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }
}