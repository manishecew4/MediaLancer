<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Operation by Admin

    public function Form()
    {
        $categories = Category::get();
        return view('admin.categories_sub', compact('categories'));
    }

    // Create Category
    public function AddCategory(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('admin.category');
        }

        $category = new Category;
        $category->name = $request->categories;
        $category->status = 'active';

        if ($category->save()) {
            return redirect()->route('admin.category');
            return $category;
        } else {
            return 'error';
        }
    }
    public function ListCategory(Request $request)
    {
        $categories = Category::get();
        $sub_categories = SubCategory::get();
        return view("admin.sub_and_cat_list", compact('categories', 'sub_categories'));
    }
    // Create AddSubCategory
    public function AddSubCategory(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('admin.category');
        }
        $sub_category = new SubCategory;
        $sub_category->name = $request->sub_cat;
        $sub_category->category_id = $request->sub_parent;
        $sub_category->status = 'active';

        if ($sub_category->save()) {
            return redirect()->route('admin.category');
            return $sub_category;
        } else {
            return 'error';
        }
    }

    public function EditCategory(Request $request)
    {
        // return $request;
        $data = Category::where('id', $request->id);
        if ($request->isMethod('get')) {
            $data = $data->first();
            return view('admin.edit_category', compact('data'));
        }

        $data->update([
            'name' => $request->categories
        ]);

        return redirect()->route('admin.list_category');
    }

    public function EditSubCategory(Request $request)
    {
        $data = SubCategory::where('id', $request->id);
        if ($request->isMethod('get')) {
            $data = $data->first();
            $categories = Category::get();
            return view('admin.edit_sub_category', compact('data', 'categories'));
        }

        $data->update([
            'name' => $request->sub_cat,
            'category_id' => $request->sub_parent
        ]);

        return redirect()->route('admin.list_category');
    }

    public function DeleteCategory(Request $request)
    {
        Category::where('id', $request->id)->delete();
        return redirect()->route('admin.list_category');
    }

    public function DeleteSubCategory(Request $request)
    {
        SubCategory::where('id', $request->id)->delete();
        return redirect()->route('admin.list_category');
    }
}
