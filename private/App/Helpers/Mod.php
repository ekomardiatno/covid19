<?php

/**
 * Mod 1.0 - Created by Eko Mardiatno.
 * Copyright 2018 KOMA MVC. All Right Reserved.
 * Instagram @komafx
 * Licensed under MIT (https://github.com/ekomardiatno/koma-mvc/blob/master/LICENSE)
 */

class Mod
{

    public static function dateID($a)
    {

        $y = substr($a, 0, 4);
        $m = substr($a, 5, 2);
        $d = substr($a, 8, 2);
        $t = substr($a, 11, 5);

        if ($m == '01') {
            $m = 'Januari';
        } else if ($m == '02') {
            $m = 'Februari';
        } else if ($m == '03') {
            $m = 'Maret';
        } else if ($m == '04') {
            $m = 'April';
        } else if ($m == '05') {
            $m = 'Mei';
        } else if ($m == '06') {
            $m = 'Juni';
        } else if ($m == '07') {
            $m = 'Juli';
        } else if ($m == '08') {
            $m = 'Agustus';
        } else if ($m == '09') {
            $m = 'September';
        } else if ($m == '10') {
            $m = 'Oktober';
        } else if ($m == '11') {
            $m = 'November';
        } else if ($m == '12') {
            $m = 'Desember';
        }

        return $d . ' ' . $m . ' ' . $y . ' ' . $t;

    }

    public static function hash($password)
    {

        $option = [
            'cost' => 10
        ];

        return password_hash($password, PASSWORD_DEFAULT, $option);

    }

    public static function resizeImg($file, $size, $name, $type)
    {

        switch($size) {
            case 'md':
                $set_width = getenv('IMAGE_MD_SIZE');
                $size = 'medium';
                break;
            case 'sm':
                $set_width = getenv('IMAGE_SM_SIZE');
                $size = 'small';
                break;
        }

        list( $width, $height ) = getimagesize($file);

        $scale = $width / $set_width;

        $get_width = $width / $scale;
        $get_height = $height / $scale;

        $image_resize = imagecreatetruecolor($get_width, $get_height);
        $image_source = null;

        switch($type) {
            case 'jpg':
                $image_source = imagecreatefromjpeg($file);
                break;
            case 'png':
                $image_source = imagecreatefrompng($file);
                break;
            case 'jpeg':
                $image_source = imagecreatefromjpeg($file);
                break;
        }

        imagecopyresized($image_resize, $image_source, 0, 0, 0, 0, $get_width, $get_height, $width, $height);

        $target = 'assets/images/' . $size . '-' . $name . '.' . $type;

        switch($type) {
            case 'jpg':
                imagejpeg($image_resize, $target);
                break;
            case 'png':
                imagepng($image_resize, $target);
                break;
            case 'jpeg':
                imagejpeg($image_resize, $target);
                break;
        }

        imagedestroy($image_resize);
        imagedestroy($image_source);

    }

    public static function getImageThumb($file, $size)
    {

        switch($size) {
            case 'sm':
                $size = 'small';
                break;
            case 'md':
                $size = 'medium';
                break;
        }

        $app_url = getenv('APP_URL');
        $dir_image = 'assets/images/';

        $file = str_replace(getenv('APP_URL'), '', $file);
        $file = str_replace($dir_image, '', $file);
        $file = $size . '-' . $file;

        return $app_url . $dir_image . $file;

    }

}
