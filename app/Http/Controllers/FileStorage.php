<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FileStorage extends Controller
{
    private const folder_path = 'myfolder';

    public static function path($path){
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function upload($file, $filename, $folder_path){
        /* $newFilename = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His').'_'.$newFilename;
        $result = cloudinary()->upload($file, [
            "resource_type" => "auto",
            "public_id" => self::path($public_id),
            "folder"    => $folder_path
        ])->getSecurePath(); */
        /* Local storage */
        /* $newFilename = str_replace(' ', '_', substr($filename, -5, 5));
        $imageName = date('Y-m-d_His').'_'.$newFilename; */

        $file_name = $file->getClientOriginalName();
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $imageName = Auth::user()->username.'_'.time().'.'.$extension;

        $file->move(public_path($folder_path), $imageName);
        $result = url('/').'/'.$folder_path.'/'.$imageName;
        return $result;
    }

    public static function replace($path, $image, $public_id, $folder_path){
        self::delete($path, $folder_path);
        return self::upload($image, $public_id, $folder_path);
    }

    public static function delete($path, $folder_path){
        //dd($path);
        /* $public_id = $folder_path.'/'.self::path($path);
        return cloudinary()->destroy($public_id); */
        /* $cloud = 'https://res.cloudinary.com';
        if(substr($path, 0, strlen($cloud)) === $cloud){
            $public_id = $folder_path.'/'.self::path($path);
            return cloudinary()->destroy($public_id);
        } */
        $host = url('/');
        $pathFile = substr($path, strlen($host)+1, strlen($path));
        if(File::exists(public_path($pathFile))){
            File::delete(public_path($pathFile));
            return "ok";
        }
        return "falla";
    }
}
