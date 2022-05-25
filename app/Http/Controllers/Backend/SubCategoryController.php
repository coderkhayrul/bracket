<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategory = SubCategory::where('sub_cat_status', 1)->get();
        return view('backend.pages.sub-category.index', compact('subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('backend.pages.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Sub Category Image Upload
        if ($request->hasFile('sub_cat_image')) {
            $image = $request->file('sub_cat_image');
            $logoName = time() . '_' . rand(100000, 10000000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('backend/uploads/subcategory/' . $logoName);
        }

        $sub_category = new SubCategory();
        $sub_category->sub_cat_name = $request->sub_cat_name;
        $sub_category->category_id = $request->category_id;
        $sub_category->sub_cat_description = $request->sub_cat_description;
        $sub_category->sub_cat_image = $logoName;
        $sub_category->sub_cat_slug = Str::slug($request->sub_cat_name, '-');
        $sub_category->sub_cat_status = 1;
        $sub_category->save();

        if ($sub_category) {
            Session::flash('success', 'Sub Category Create Successfully!');
        } else {
            Session::flash('error', 'Sub Category Create Failed!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = SubCategory::where('sub_cat_id', $id)->first();
        // return $data;
        if (File::exists('backend/uploads/subcategory/'.$data->sub_cat_image)) {
            File::delete('backend/uploads/subcategory/'.$data->sub_cat_image);
            $data->delete();
        }
        return redirect()->route('sub-category.index');
    }
}
