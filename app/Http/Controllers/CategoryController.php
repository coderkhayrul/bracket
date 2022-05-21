<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.category.category_manage');
    }

    // GET ALL CATEGORY FOR AJAX
    public function alldata()
    {
        $categories = Category::all();
        return response()->json([
            'status' => '200',
            'data' => $categories,
        ]);
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

        $category = new Category();
        $category->name = $request->category_name;
        $category->tag = $request->category_tag;
        $category->status = $request->category_status;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            'status' => '200',
            'message' => 'Category Create Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        if($category == true){
            return response()->json([
                'status' => '200',
                'data' => $category
            ]);
        }else{
            return response()->json([
                'status' => '404',
                'error' => "Category Not Found"
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        if($category == true){
            return response()->json([
                'status' => '200',
                'data' => $category
            ]);
        }else{
            return response()->json([
                'status' => '404',
                'error' => "Category Not Found"
            ]);
        }
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
        //
    }
}