<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Items Data';
        $data['q'] = $request->q;
        $data['rows'] = Items::where('item_name', 'like', '%' . $request->q . '%')->get();
        return view('items.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New Items';
        return view('items.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'items_name' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $items = new Items();
        $items->item_name = $request->items_name;
        $items->unit = $request->unit;
        $items->stock = $request->stock;
        $items->price = $request->price;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/items', $name);
            $items->image = $name;
        }
        $items->save();
        return redirect('items')->with('success', 'Tambah Data Berhasil');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Items';
        $data["row"] = DB::table('items')->where('id', $id)->first();
        return view('items.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $items)
    {
        $request->validate([
            'items_name' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $items = new Items();
        $items->items_name = $request->items_name;
        $items->unit = $request->unit;
        $items->stock = $request->stock;
        $items->price = $request->price;
        if ($request->hasFile('image')) {
            $items->delete_image();
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/items', $name);
            $items->image = $name;
        }
        $items->content = $request->content;
        $items->save();
        return redirect('items')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($items);
        DB::table('items')->where('id', $id)->delete();
        return redirect('items')->with('success', 'Hapus Data Berhasil');

    }
}
