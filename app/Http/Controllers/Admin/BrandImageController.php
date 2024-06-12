<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BrandImageController extends Controller
{
    public function upload($image)
    {
        $file_name_image = generateFileName( $image->getClientOriginalName());
        $image->move(public_path(env('BRAND_IMAGES_UPLOAD_PATH')) , $file_name_image);

        return $file_name_image;
    }

    // public function edit($primaryImage)
    // {
    //     $file_name_image_primary = generateFileName($request->primary_image->getClientOriginalName());
    //     $request->primary_image->move(public_path(env('BLOG_IMAGES_UPLOAD_PATH')), $file_name_image_primary);

    //     $blog->update([
    //         'primary_image' => $file_name_image_primary
    //     ]);
    // }


}
