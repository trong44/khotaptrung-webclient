<?php

namespace App\Library;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Request;

class MediaHelpers
{

	static function media($path){


	    if(empty($path)){
	        return "";
        }

	    //nếu là link http://
		if (strpos($path, 'http://') > -1 ||strpos($path, 'https://') > -1 ||strpos($path, '//') > -1) {
		    if (strpos($path, 'http://') > -1){
                $path = str_replace('http:','',$path);
            }elseif (strpos($path, 'https://') > -1){
                $path = str_replace('https:','',$path);
            }

            if(setting('sys_server_image') != ''){
                if (setting('sys_server_image') == 'https://imagetip.net'){
                    $path = str_replace('cdn.upanh.info','imagetip.net',$path);
                }
            }
            return url($path);
		}else{

            if(setting('sys_server_image') != ''){
                return setting('sys_server_image').'/'. ltrim($path, '/');
            }else{
                return config('api.url_media').'/'. ltrim($path, '/');
            }

		}
	}


    public static function upload_file($files = false,$dir, $filename, $width = false, $height = false){

        if($files===null){
            return "";
        }
        $result= "";
        $allowedExtensions = array('mp3','mp4');
        try{
            if($files){
                $extension = strtolower($files->getClientOriginalExtension());
                if(in_array($extension,$allowedExtensions)){
                    $filename=$filename!=""?$filename:self::rand_string(10) . '_' . time();
                    $filename .= ".{$extension}";
                    $path = "/storage/{$dir}/";
                    $temp = "temp";
                    if (!is_dir($temp)) {
                        mkdir($temp, 0755);
                    }
                    $temp = "temp/{$filename}";
                    $media = $files->move(public_path($path), $filename);
                    if ($media) {
                        $result = $path . $filename;
                    }
                    if (file_exists($temp)) {
                        unlink($temp);
                    }
                }
            }
        }
        catch (\Exception $e) {
            \Log::error($e);
            return "";
        }
        return $result;

    }


    static function delete_image($path){
        try {
            if($path==""){
                return;
            }

            if (strpos($path, '//') > -1) {
            }else{
                if (!empty(config('filesystems.disks.ftp.url'))){
                    Storage::disk('ftp')->delete(config('filesystems.disks.ftp.folder').$path);
                }
                else{
                    Storage::disk('public')->delete(config('filesystems.disks.public.folder').$path);
                }


            }
        } catch (\Exception $e) {
        }


    }

    static function rand_string($length)
    {
        $str = '';
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {

            $str .= $chars[rand(0, $size - 1)];
        }

        return $str;
    }

    public static function upload_image($files = false, $dir = 'images', $filename="", $width = true, $height = true,$keepOrginExtention=false){
        if($files===null){
            return "";
        }
        $result= "";
        $allowedExtensions = array('jpeg', 'jpg', 'png', 'bmp', 'gif', 'ico');
        if($files){
            $extension = strtolower($files->getClientOriginalExtension());
            if(in_array($extension,$allowedExtensions)){
                $filename=$filename!=""?$filename:self::rand_string(10) . '_' . time();
                if($extension == 'gif'){
                    $result = MediaHelpers::UploadGif($files, $dir, $filename, $width, $height,$keepOrginExtention);
                }
                else{
                    $result = MediaHelpers::HandleImage($files, $dir, $filename, $width, $height,$keepOrginExtention);
                }
            }
        }
        return $result;

    }

    private static function HandleImage($file = false, $dir, $filename, $width = false, $height = false,$keepOrginExtention = false){
        $result = "";
        try {
            if($keepOrginExtention==true){
                $extension = $file->getClientOriginalExtension();
            }
            else{
                $extension = 'png';
            }
            $filename .= ".{$extension}";
            $path = "{$dir}/{$filename}";
            $temp = "temp";
            if (!is_dir($temp)) {
                mkdir($temp, 0755);
            }
            $temp = "temp/{$filename}";
            $file->move('temp', $filename);
            if($width || $height){
                $w = $width? $width: null;
                $h = $height? $height: null;
                // khởi tạo image
                $image  = Image::make($temp);
                // khởi tạo background images
                $background = Image::canvas($w, $h);
                $background->fill('rgba(0,0,0,0.0)');

                /*resize theo width*/
                if($w/$h < $image->width()/$image->height()){
                    $image->resize($w, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $background->insert($image, 'center')->save($temp,100);
                }
                 /*resize theo height*/
                else{
                    $image->resize(null, $h, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $background->insert($image, 'center')->save($temp,100);
                }

            }
            else{
                $image = Image::make($temp)->save($temp,100);
            }
            //upload vào media ftp
            if (!empty(config('filesystems.disks.ftp.url'))) {
                $storage = Storage::disk('ftp');
                if (strlen(config('filesystems.disks.ftp.folder'))) {
                    $dir = config('filesystems.disks.ftp.folder')."/{$dir}";
                }
                if ($storage->putFileAs($dir, new File($temp), $filename)) {
                    $result = "/{$path}";
                }
            }
            //upload vào local
            else{
                $storage = Storage::disk('public');
                if ($storage->putFileAs($dir, new File($temp), $filename)) {
                    $result = "/{$path}";
                }
            }

            if (file_exists($temp)) {
                unlink($temp);
            }

        } catch (\Exception $e) {
            \Log::error($e);
            return "";
        }
        return $result;
    }


    private static function UploadGif($file = false, $dir, $filename, $width = false, $height = false,$keepOrginExtention = false){
        $result = "";
        try {
            $extension = $file->getClientOriginalExtension();
            $filename .= ".{$extension}";
            $path = "/storage/{$dir}/";
            $temp = "temp";
            if (!is_dir($temp)) {
                mkdir($temp, 0755);
            }
            $temp = "temp/{$filename}";
            $image = $file->move(public_path($path), $filename);
            if ($image) {
                $result = $path . $filename;
            }
            if (file_exists($temp)) {
                unlink($temp);
            }

        } catch (\Exception $e) {
            \Log::error($e);
            return "";
        }
        return $result;
    }
}
