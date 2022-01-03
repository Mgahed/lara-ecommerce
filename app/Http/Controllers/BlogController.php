<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class BlogController extends Controller
{

    protected function getRules()
    {
        return [
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }

    protected function getMSG()
    {
        return [
            'title_en.required' => __('This field is required'),
            'title_ar.required' => __('This field is required'),
            'description_en.required' => __('This field is required'),
            'description_ar.required' => __('This field is required'),
            'img.required' => __('This field is required'),
        ];
    }

    /*----- admin -----*/

    public function BlogsView()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('admin.blogs.blog_view', compact('blogs'));
    }


    public function BlogsStore(Request $request)
    {

        $rules = $this->getRules();
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $img = $request->file('img');
        $name_gen = md5($img->getClientOriginalName()) . strtotime(Carbon::now()) . '.' . $img->getClientOriginalExtension();
        Image::Make($img)->resize(800, 400)->save(public_path('/upload/blogs/' . $name_gen));
        $save_img = 'upload/blogs/' . $name_gen;

        $pattern = '#\<pre.*?\>(.*?)\<\/pre\>#si';
        $replace = '$1';
        Blog::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => preg_replace($pattern, $replace, $request->description_en),//strip_tags($request->description_en, '<a><p><span><div><h1><h2><h3><h4></br><h5><br>'),
            'description_ar' => preg_replace($pattern, $replace, $request->description_ar),//strip_tags($request->description_ar, '<a><p><span><div><h1><h2><h3><h4></br><h5><br>'),
            'img' => $save_img
        ]);

        $notification = array(
            'message' => __('Article Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method


    public function BlogsEdit($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('admin.blogs.blog_edit', compact('blogs'));
    }


    public function BlogsUpdate(Request $request)
    {

        $oldImg = $request->old_img;
        if (file_exists(public_path($oldImg))) {
            unlink(public_path($oldImg));
        }

        $img = $request->file('img');
        $name_gen = md5($img->getClientOriginalName()) . strtotime(Carbon::now()) . '.' . $img->getClientOriginalExtension();
        Image::Make($img)->resize(800, 400)->save(public_path('/upload/blogs/' . $name_gen));
        $save_img = 'upload/blogs/' . $name_gen;

        Blog::findOrFail($request->id)->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => strip_tags($request->description_en, '<a><p><span><div><h1><h2><h3><h4></br><h5><br>'),
            'description_ar' => strip_tags($request->description_ar, '<a><p><span><div><h1><h2><h3><h4></br><h5><br>'),
            'img' => $save_img
        ]);

        $notification = array(
            'message' => __('Article Updated Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('manage-blog')->with($notification);


    } // end mehtod


    public function BlogsDelete($id)
    {

        Blog::findOrFail($id)->delete();
        $notification = array(
            'message' => __('Article Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


    /*----- front -----*/
    public function index()
    {
        $blogs = Blog::select('title_' . app()->getLocale() . ' as title', 'description_' . app()->getLocale() . ' as description', 'img', 'created_at')->orderBy('id', 'DESC')->paginate(5);
        return view('front.blog.blogs', compact('blogs'));
    }
}
