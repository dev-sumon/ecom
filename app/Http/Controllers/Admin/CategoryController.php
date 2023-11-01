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
    function view($id): View
    {
        $s['category'] = Category::with(['createdBy','updatedBy'])->where('id',$id)->first();
        return view('admin.product.category.view',$s);
    }

    function edit($id): View
    {
        $s['category'] = Category::findOrFail($id);
        return view('admin.product.category.edit',$s);
    }
    function update(CategoryRequest $req, $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store('product/category','public');
            $this->fileDelete($category->image);
            $category->image = $path;
        }
        $category->slug = Str::slug($req->name);
        $category->name = $req->name;
        $category->updated_by = auth()->user()->id;

        $category->save();
        return redirect()->route('product.category.index')->withStatus(__('Category Updated Successfully'));
    }
    function status($id){
        $category = Category::findOrFail($id);
        $this->changeStatus($category);
        return redirect()->back()->withStatus(__('Category Status Change Successfully'));;
    }
    function delete($id){
        $category = Category::findOrFail($id);
        $this->fileDelete($category->image);
        $category->delete();
        return redirect()->route('product.category.index')->withStatus(__('Category Deleted Successfully'));;
    }
}
