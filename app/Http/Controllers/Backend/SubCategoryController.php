<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    protected function getRules()
    {
        return [
            'name_en' => 'required',
            'name_ar' => 'required',
            'category_id' => 'required'
        ];
    }

    protected function getMSG()
    {
        return [
            'name_en.required' => __('Must enter the name'),
            'name_ar.required' => __('Must enter the name'),
            'category_id.required' => __('Must select a category')
        ];
    }

    public function SubCategoryView()
    {
        $subcategories = SubCategory::with('category')->orderBy('name_en', 'ASC')->get();
        $categories = Category::orderBy('name_en')->get();

        return view('admin.category.subcategory_view', compact('subcategories', 'categories'));
    }

    public function SubCategoryStore(Request $request)
    {
        $rules = $this->getRules();
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $subcategory = SubCategory::create([
            'name_en' => strtolower($request->name_en),
            'name_ar' => $request->name_ar,
            'category_id' => $request->category_id
        ]);
        if ($subcategory) {
            $notification = array(
                'message' => __('Subcategory added successfully'),
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message' => __('Can not add Subcategory'),
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subcategory_edit', compact('subcategory', 'categories'));
    }

    public function SubCategoryUpdate(Request $request)
    {
        $rules = $this->getRules();
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $id = $request->id;

        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'name_en' => strtolower($request->name_en),
            'name_ar' => $request->name_ar
        ]);

        $notification = [
            'message' => __('subcategory update successfully'),
            'alert-type' => 'success'
        ];

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = [
            'message' => __('subcategory deleted successfully'),
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function GetSubCategory($id)
    {
        $subcategories = SubCategory::where('category_id',$id)->orderBy('name_en','ASC')->get();
        return json_encode($subcategories);
    }
}
