<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index() {
        return view('front.products');
    }

    public function list() {
        return view('admin.products.index');
    }

    public function fetch() {
        $product = Product::query();
        return DataTables::of($product)
            ->editColumn('image_id', function ($product) {
                return '<img style="width: 200px; height: 100px;" src="'.asset($product->getImage->image).'">';
            })
            ->addColumn('update', function ($product) {
                return '<a href="'. route('products.update.index',$product->id) .'" class="btn btn-info" >Güncelle</a>';
            })
            ->addColumn('delete', function ($product) {
                return "<button class='btn btn-danger' onclick='productsDelete(" . $product->id . ")' >Sil</button>";

            })
            ->rawColumns(['image_id','update', 'delete'])
            ->make();
    }

    public function createIndex() {
        return view('admin.products.create');
    }

    public function createPost(Request $request) {
        $request->validate([
            'title'=>'min:3',
            'image' =>'required|image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'required',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $image = new Image();
        if ($request->hasFile('image')) {
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $image->image = 'uploads/'.$imageName;
            $image->save();
            $product->image_id = $image->id;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    public function updateIndex($id) {
        $product = Product::find($id);
        return view('admin.products.update',compact('product'));
    }

    public function updatePost(Request $request, $id) {
        $request->validate([
            'title'=>'min:3',
            'image' =>'image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'required',
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $image = new Image();
        if ($request->hasFile('image')) {
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $image->image = 'uploads/'.$imageName;
            $image->save();
            $product->image_id = $image->id;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    public function delete(Request $request) {
        $product = Product::find($request->id);
        $product->delete();
        return response()->json(['Success' => 'success']);
    }
}
