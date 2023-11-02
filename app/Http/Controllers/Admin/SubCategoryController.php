<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCatRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    function index(): View
    {
        $s['sub_categories'] = SubCategory::with('category')->latest()->get();
        return view('admin.product.sub_category.index',$s);
    }
    function create(): View
    {
        $s['categories'] = Category::where('status',1)->latest()->get();
        return view('admin.product.sub_category.create',$s);
    }
    function store(SubCatRequest $req): RedirectResponse
    {
        $sub_cat = new SubCategory();
        $sub_cat->name = $req->name;
        $sub_cat->cat_id = $req->cat_id;
        $sub_cat->slug = Str::slug($req->name);
        $sub_cat->created_by = auth()->user()->id;

        $sub_cat->save();
        return redirect()->route('product.sub_category.index')->withStatus(__('Sub Category Created Successfully'));
    }
    function edit($id): View
    {
        $s['sub_category'] = SubCategory::with('category')->where('id',$id)->first();
        $s['categories'] = Category::where('status',1)->latest()->get();
        return view('admin.product.sub_category.edit',$s);
    }
    function update(SubCatRequest $req, $id): RedirectResponse
    {
        $sub_cat = SubCategory::findOrFail($id);
        $sub_cat->name = $req->name;
        $sub_cat->cat_id = $req->cat_id;
        $sub_cat->slug = Str::slug($req->name);
        $sub_cat->updated_by = auth()->user()->id;
        $sub_cat->update();
        return redirect()->route('product.sub_category.index')->withStatus(__('Sub Category Updated Successfully'));
    }
    function status($id): RedirectResponse
    {
        $sub_cat = SubCategory::findOrFail($id);
        $this->changeStatus($sub_cat);
        return redirect()->back()->withStatus(__('Sub Category Status Change Successfully'));;
    }
    function delete($id): RedirectResponse
    {
        $sub_cat = SubCategory::findOrFail($id);
        $sub_cat->delete();
        return redirect()->route('product.sub_category.index')->withStatus(__('Sub Category Deleted Successfully'));
    }
    function view($id): JsonResponse
    {
        $s['sub_category'] = SubCategory::with(['category','createdBy','updatedBy'])->where('id',$id)->first();
        return response()->json($s);
    }
}
