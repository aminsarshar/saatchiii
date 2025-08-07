<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Http\Controllers\Admin\BlogImageController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use CreateProductVariationsTable;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->search()->paginate(5);
        return view('admin.blogs.index' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = CategoryBlog::all();
        return view('admin.blogs.create'  ,compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'primary_image' => 'required',
            'is_active' => 'required',

        ]);

        $blogImageController = new BlogImageController();
        $file_name_image_primary =  $blogImageController->upload($request->primary_image);
    //    $file_name_image_primary = generateFileName( $request->primary_image->getClientOriginalName());
        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'primary_image' => $file_name_image_primary,
            'user_id' =>Auth::user()->id,
            'is_active' => $request->is_active,

        ]);

        alert()->success('مقاله مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('admin.blogs.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show' ,compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit' , compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Blog $blog)
    {
        // dd($request->all());
        $file = $request->file('primary_image');
        $image = '';
        if(!empty($file)){
            if (file_exists('back/images/blog/'.$blog->primary_image)){
                unlink('back/images/blog/'.$blog->primary_image);
            }
            $primary_image = time().".".$file->getClientOriginalExtension();
            $file->move('back/images/blog',$primary_image);
        }else{
            $primary_image = $blog->primary_image;
        }

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'primary_image' => $primary_image,
            'is_active' => $request->is_active,

        ]);


        alert()->success('مقاله مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.blogs.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
