<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class SliderController extends Controller
{
    protected function getRules()
    {
        return [
            'img' => 'required',
        ];
    }

    protected function getMSG()
    {
        return [
            'img.required' => __('Must enter an image')
        ];
    }


    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.slider_view', compact('sliders'));
    }

    public function SliderStore(Request $request)
    {
        $rules = $this->getRules();
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $img = $request->file('img');
        $name_gen = md5($img->getClientOriginalName()) . strtotime(Carbon::now()) . '.' . $img->getClientOriginalExtension();
        Image::Make($img)->resize(870, 370)->save('upload/slider/' . $name_gen);
        $save_img = 'upload/slider/' . $name_gen;

        Slider::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'descp_en' => $request->descp_en,
            'descp_ar' => $request->descp_ar,
            'img' => $save_img
        ]);

        $notification = [
            'message' => __('Slider information added successfully'),
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function SliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.slider_edit', compact('slider'));
    }

    public function SliderUpdate(Request $request)
    {
        $slider = Slider::findOrFail($request->id);

        if ($request->file('img')) {
            $old_img = $request->old_image;
            unlink($old_img);

            $img = $request->file('img');
            $name_gen = md5($img->getClientOriginalName()) . strtotime(Carbon::now()) . '.' . $img->getClientOriginalExtension();
            Image::Make($img)->resize(870, 370)->save('upload/slider/' . $name_gen);
            $save_img = 'upload/slider/' . $name_gen;

            $slider->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'descp_en' => $request->descp_en,
                'descp_ar' => $request->descp_ar,
                'img' => $save_img
            ]);
            $notification = [
                'message' => __('Slider information updated with image'),
                'alert-type' => 'success'
            ];
        } else {
            $slider->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'descp_en' => $request->descp_en,
                'descp_ar' => $request->descp_ar
            ]);
            $notification = [
                'message' => __('Slider information updated without image'),
                'alert-type' => 'success'
            ];
        }
        return redirect()->route('manage-slider')->with($notification);
    }

    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        unlink($slider->img);
        $slider->delete();
        $notification = [
            'message' => __('Slider deleted successfully'),
            'alert-type' => 'success'
        ];
        return redirect()->route('manage-slider')->with($notification);
    }

    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = [
            'message' => __('Slider activated successfully'),
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }

    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = [
            'message' => __('Slider deactivated successfully'),
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }
}