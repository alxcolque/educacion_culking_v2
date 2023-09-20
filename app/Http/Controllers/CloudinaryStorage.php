<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CloudinaryStorage extends Controller
{
    private const folder_path = 'training';

    public static function path($path){
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function upload($file, $filename, $folder_path){
        $newFilename = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His').'_'.$newFilename;
        $result = cloudinary()->upload($file, [
            "resource_type" => "auto",
            "public_id" => self::path($public_id),
            "folder"    => $folder_path
        ])->getSecurePath();

        return $result;
    }

    public static function replace($path, $image, $public_id, $folder_path){
        self::delete($path, $folder_path);
        return self::upload($image, $public_id, $folder_path);
    }

    public static function delete($path, $folder_path){
        //dd($path);
        $public_id = $folder_path.'/'.self::path($path);
        return cloudinary()->destroy($public_id);
    }
}
