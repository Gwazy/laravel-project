<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ImageController extends Controller
{
    public function store($image, $id)
    {
        $image_path = $image->store('/public/images');
        $image_path = explode('public/images', $image_path);
        $image_path = $image_path[1];

        $image = new Image;
        $image->image = $image_path;
        $image->post_id = $id;
        $image->save();

        return $image;
    }
}
