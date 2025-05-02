<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    // List
    public function getAll()
    {
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('products', compact('products', 'categories'));
    }

    // Add
    public function addNew(Request $request)
{
    $request->validate([
        'productName' => 'required|string|max:255',
        'productDescription' => 'required|string',
        'productPrice' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'productImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Image processing
    $file = $request->file('productImage');
    $imageName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('assets/images'), $imageName);

    // Product creation
    Product::create([
        'productName' => $request->productName,
        'productDescription' => $request->productDescription,
        'productPrice' => $request->productPrice,
        'category_id' => $request->category_id,
        'expire_date' => $request->expire_date,
        'productImage' => $imageName
    ]);

    return redirect()->route('products')->with('success', 'Product added!');
}

    // Delete
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

    // Edit
    public function getById($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('editProduct', compact('product', 'categories'));
    }

    // Update
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

    // Delete multiple products
    public function deleteSelected(Request $request)
    {
        $productIds = $request->input('product_ids', []);
        foreach ($productIds as $productId) {
            $product = Product::findOrFail($productId);
            if ($product->productImage && file_exists(public_path("assets/images/" . $product->productImage))) {
                unlink(public_path("assets/images/" . $product->productImage));
            }
            $product->delete();
        }
        return redirect()->back();
    }

    // Add form
    public function showAddForm()
    {
        $categories = Category::all();
        return view('addProduct', compact('categories'));
    }
}
