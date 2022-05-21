<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('product_status', 1)->get();
        return view('backend.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'product_name' => 'required',
            'product_category' => 'required',
            'product_size' => 'required',
            'product_cost' => 'required',
            'product_sell' => 'required',
            'product_quentity' => 'required'
        ],
        [
            'product_name.required' => 'Enter Your Name',
            'product_category.required' => 'Enter Your Category',
            'product_size.required' => 'Enter Your  Size',
            'product_cost.required' => 'Enter Your  Product Cost',
            'product_sell.required' => 'Enter Your Product Sell',
            'product_quentity.required' => 'Enter Your Minimum Quntity'
        ]);

        // Product::create($request->all());

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_category = $request->product_category;
        $product->product_size = $request->product_size;
        $product->product_cost = $request->product_cost;
        $product->product_sell = $request->product_sell;
        $product->product_quentity = $request->product_quentity;
        $product->description = $request->description;
        $product->save();

        Session::flash('message', 'Product Create SuccessFully');
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
        $data = Product::findOrFail($id);
        return view('backend.pages.product.edit', compact('data'));
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
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_category = $request->product_category;
        $product->product_size = $request->product_size;
        $product->product_cost = $request->product_cost;
        $product->product_sell = $request->product_sell;
        $product->product_quentity = $request->product_quentity;
        $product->description = $request->description;
        $product->update();

        Session::flash('message', 'Product Update SuccessFully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        Session::flash('message', 'Product Delete SuccessFully');
        return redirect()->route('product.index');
    }
}
