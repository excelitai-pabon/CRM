<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Facades\Image;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImageSize($prefix,$image,$path,$width,$height){

        $image_name=$prefix.'-'.time().".".$image->getClientOriginalExtension();
        $image_path='uploads/'.$path.'/'.$image_name;
        Image::make($image)->resize($width,$height)->save('uploads/'.$path.'/'.$image_name);
        return $image_path;
    }
}
