<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use App\Models\User;

class CategoryController extends Controller
{
    function index(): View
    {
        $s['categories'] = Category::with(['createdBy','updatedBy'])->latest()->get();
        return view('admin.product.category.index',$s);
    }
    function create(): View
    {
        return view('admin.product.category.create');
    }
    function store(CategoryRequest $req): RedirectResponse
    {
        $category = new Category();

        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store('product/category','public');
            $category->image = $path;
        }
        $category->slug = Str::slug($req->name);
        $category->name = $req->name;
        $category->created_by = auth()->user()->id;

        $category->save();
        return redirect()->route('product.category.index')->withStatus(__('Category Created Successfully'));
    }
}
