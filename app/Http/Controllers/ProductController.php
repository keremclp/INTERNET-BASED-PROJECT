<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Products::all();
        return view('product.list');
    }
    public function get($product_id){
        $product = Products::findOrFail($product_id);
        return view('product.details',[
            'product' => $product
        ]);
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        try {
            $photo = '';
            if($request->hasFile('photo')){
                $uploadedFile = $request->photo;
                $filename = $uploadedFile->getClientOriginalName();
                $path = '/products';
                $storageDisk = Storage::disk('public_html');
                $storageDisk->putFileAs($path, $uploadedFile, $filename);

                $fileUrl = $storageDisk->url($path . '/' . $filename);
            }
            $product = Products::create([
                'name' => $request->name,
                'description' => $request->description,
                'photo' => $photo,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => $request->status
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'Product Updated!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
    public function edit($product_id){
        $product = Products::findOrFail($product_id);
        return view('product.details',[
            'product' => $product
        ]);
    }
    public function update($product_id,Request $request){
        try {
            $photo = '';
            if($request->hasFile('photo')){
                $uploadedFile = $request->photo;
                $filename = $uploadedFile->getClientOriginalName();
                $path = '/products';
                $storageDisk = Storage::disk('public_html');
                $storageDisk->putFileAs($path, $uploadedFile, $filename);

                $fileUrl = $storageDisk->url($path . '/' . $filename);
            }
            $product = Products::findOrFail($product_id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'photo' => $photo,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => $request->status
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'Product Updated!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
    public function delete($product_id){
        try {
            Products::findOrFail($product_id)->delete();
            return response()->json([
                'status' => 201,
                'message' => 'Product Updated!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
    //
}
