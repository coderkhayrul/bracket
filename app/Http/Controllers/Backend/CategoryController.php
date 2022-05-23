<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

        if ($category) {
            return response()->json([
                'status' => '200',
                'message' => 'Category Create Successfully',
            ]);
        }else{
            return response()->json([
                'status' => '404',
                'message' => 'Category Create Failed',
            ]);
        }
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
        $category = Category::findOrFail($id);
        $category->name = $request->category_name;
        $category->tag = $request->category_tag;
        $category->status = $request->category_status;
        $category->description = $request->category_description;
        $category->update();
        if($category){
            return response()->json([
                'status' => '200',
                'message' => 'Category Update Successfully'
            ]);
        }else{
            return response()->json([
                'status' => '400',
                'message' => 'Category Update Failed'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if($category){
            return response()->json([
                'status' => '200',
                'message' => 'Category Delete Successfully'
            ]);
        }else{
            return response()->json([
                'status' => '400',
                'message' => 'Category Delete Failed'
            ]);
        }
    }
}
