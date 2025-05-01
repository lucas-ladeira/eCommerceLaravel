<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function addNew(Request $request)
    {
        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->save();
        return redirect()->back();
    }

    public function deleteById($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

    public function getById($id)
    {
        $category = Category::findOrFail($id);
        return view('editCategory', compact('category'));
    }

    public function updateById(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->categoryName = $request->categoryName;
        $category->save();
        return redirect()->route('categories');
    }

    public function showAddProductForm()
    {
        $categories = Category::all();
        return view('addProduct', compact('categories'));
    }
}
