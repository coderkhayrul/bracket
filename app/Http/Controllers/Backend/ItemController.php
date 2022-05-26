<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('backend.pages.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.item.create');
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
            'item_name' => 'required',
            'item_image' => 'required',
        ]);
        $item_code = uniqid();

        if ($request->hasFile('item_image')) {
            $item_image = $request->file('item_image');
            $imageName = time() . '_' . rand(100000, 10000000) . '.' . $item_image->getClientOriginalExtension();
            Image::make($item_image)->resize(300, 300)->save('backend/uploads/item/' . $imageName);

            $id = Item::insertGetId([
                'item_name' => $request->item_name,
                'item_code' => $item_code,
                'item_description' => $request->item_description,
                'item_image' => $imageName,
            ]);
        }

        if ($request->hasFile('gallery_image')) {
            $gallery_image = $request->file('gallery_image');

            foreach ($gallery_image as  $gImage) {
                $imageName = rand(100000, 10000000) . '.' . $item_image->getClientOriginalExtension();
                Image::make($gImage)->resize(300, 300)->save('backend/uploads/item/gallery/' . $imageName);
                $gallery = new Gallery();
                $gallery->item_code = $item_code;
                $gallery->gallery_image = $imageName;
                $gallery->save();
            }
        }
        Session::flash('success', 'Item Create Successfully');
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
    public function edit($item_code)
    {
        $data = Item::where('item_code', $item_code)->firstOrFail();
        $gallerys= Gallery::where('item_code', $item_code)->get();
        return view('backend.pages.item.edit', compact('data', 'gallerys'));
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
        $data = Item::find($id);
        if (File::exists('backend/uploads/item/'.$data->item_image)) {
            File::delete('backend/uploads/item/'.$data->item_image);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gallery_destroy($id)
    {
        $data = Gallery::find($id);
        $image_path = 'backend/uploads/item/gallery/';
        if (File::exists($image_path.$data->gallery_image)) {
            File::delete($image_path.$data->gallery_image);
        }
        Gallery::find($id)->delete();
        return redirect()->back();
    }
}
