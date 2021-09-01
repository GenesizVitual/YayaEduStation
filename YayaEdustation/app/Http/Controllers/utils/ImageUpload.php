<?php
/**
 * Created by PhpStorm.
 * User: Vandiansyah
 * Date: 4/21/2021
 * Time: 5:59 AM
 */
namespace App\Http\Controllers\utils;

class ImageUpload
{
    public static $default_directory;
    public static $file_name=null;

    //Todo: Cek gambar  jika akan diupload
    public static function Upload($req, $model=null){
        $n_file = $req->gambar;
        if(!empty($model))
        {
            $new_file = $model->gambar;
            if(!empty($new_file))
            {
                //cek file gambar sebelum update
                if(file_exists(self::$default_directory.'/'.$new_file))
                {
                    @unlink(self::$default_directory.'/'.$new_file) ;
                }
            }
        }

        if(!empty($n_file))
        {
            self::$file_name = $n_file->getClientOriginalName();
            $n_file->move(public_path(self::$default_directory), self::$file_name);
        }
    }

    //Todo: Cek gambar  jika akan diupload
    public static function Upload_profile($req, $model=null){
        $n_file = $req->foto;
        if(!empty($model))
        {
            $new_file = $model->foto;
            if(!empty($new_file))
            {
                //cek file gambar sebelum update
                if(file_exists(self::$default_directory.'/'.$new_file))
                {
                    @unlink(self::$default_directory.'/'.$new_file) ;
                }
            }
        }

       if(!empty($n_file))
        {
            self::$file_name = $n_file->getClientOriginalName();
            $n_file->move(public_path(self::$default_directory), self::$file_name);
        }
    }

    //Todo: Cek Gambar bukti pembayaran  jika akan diupload
    public static function Upload_tf($req, $model=null, $field){
        $n_file = $req->$field;
        if(!empty($model))
        {
            $new_file =$n_file;
            if(!empty($new_file))
            {
                //cek file gambar sebelum update
                if(file_exists(self::$default_directory.'/'.$new_file))
                {
                    @unlink(self::$default_directory.'/'.$new_file) ;
                }
            }
        }

       if(!empty($n_file))
        {
            self::$file_name = $n_file->getClientOriginalName();
            $n_file->move(public_path(self::$default_directory), self::$file_name);
        }
    }
}
