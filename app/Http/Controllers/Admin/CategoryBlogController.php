<?php

namespace App\Http\Controllers\admin;

use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryBlogRequest;
use App\Http\Requests\Admin\CategoryBlogEditRequest;


class CategoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryBlog::latest()->paginate(20);
        return view('admin.categoryblog.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = CategoryBlog::where('parent_id', 0)->get();
        return view('admin.categoryblog.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryBlogRequest $request)
    {

        try {
            DB::beginTransaction();

            $category = CategoryBlog::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' => $request->parent_id,
                'icon' => $request->icon,
                'description' => $request->description,
            ]);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد دسته بندی', $ex->getMessage());
            return redirect()->back();
        }

        alert()->success('دسته بندی مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.categoryblog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryBlog $categoryblog)
    {
        return view('admin.categoryblog.show', compact('categoryblog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryBlog $categoryblog)
    {
        $parentCategories = CategoryBlog::where('parent_id', 0)->get();

        return view('admin.categoryblog.edit', compact('categoryblog', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryBlogEditRequest $request, CategoryBlog $categoryblog)
    {

        try {
            DB::beginTransaction();

            $categoryblog->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'is_active' => $request->is_active,
                'parent_id' => $request->parent_id,
                'icon' => $request->icon,
                'description' => $request->description,
            ]);



            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش دسته بندی', $ex->getMessage());
            return redirect()->back();
        }

        alert()->success('دسته بندی مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.categoryblog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
