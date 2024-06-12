<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BlogImageController extends Controller
{
    public function upload($primaryImage)
    {
        $file_name_image_primary = generateFileName( $primaryImage->getClientOriginalName());
        $primaryImage->move(public_path(env('BLOG_IMAGES_UPLOAD_PATH')) , $file_name_image_primary);

        return $file_name_image_primary;
    }

    public function edit($primaryImage)
    {
        $file_name_image_primary = generateFileName($request->primary_image->getClientOriginalName());
        $request->primary_image->move(public_path(env('BLOG_IMAGES_UPLOAD_PATH')), $file_name_image_primary);

        $blog->update([
            'primary_image' => $file_name_image_primary
        ]);
    }


}
