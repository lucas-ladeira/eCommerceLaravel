<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function addNew(Request $request)
    {
        $product = new Product();
        $product->productName        = $request->productName;
        $product->productDescription = $request->productDescription;
        $product->productPrice       = $request->productPrice;
        $product->category_id        = $request->category_id;

        $imageName = null;

        if ($request->hasFile('productImage')) {
            $file = $request->file('productImage');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images'), $imageName);
        }

        if ($imageName) {
            $product->productImage = $imageName;
        }

        $product->save();

        return redirect()->back();
    }

    public function deleteById($id)
    {
        $product = Product::findOrFail($id);

        // Image treatment
        if (file_exists(public_path("assets/images/" . $product->productImage))) {
            try {
                unlink(public_path("assets/images/" . $product->productImage));
            } catch (\Throwable $th) {
                Log::error("L'image n'existe pas: " . $th->getMessage());
            }
        }
        $product->delete();

        return redirect()->back();
    }

    public function getById($id)
    {
        $product = Product::findOrFail($id);
        return view('editProduct', compact('product'));
    }

    public function updateById(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        $product->productPrice = $request->productPrice;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('products', ['id' => $product->id]);
    }
}
