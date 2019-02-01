<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use claviska\simpleimage;
use DB;

class ThumbnailController extends Controller
{

    public function index(Request $request)
    {
        Log::channel('info')->info($request->all());
        Log::channel('info')->info('Thumbnail start()');

        $params = $request->all();

        $savefile = "/tmp/";

        $image = new \claviska\SimpleImage();

        if (empty($params['src'])) {
            $src = 'http://design-ec.com/d/e_others_50/l_e_others_500.png';
        } else {
            $src = $params['src'];
        }
        $name = md5($src);

        $savefile = "/tmp/{$name}";

        $plus = "";
        foreach ($params as $key => $param) {
            if ($key != "src") {
                $plus .= "&".$key."=".$param;
            }
        }

        $url = $src;
        $url = $url . $plus;

        if (!$imageData = @file_get_contents($url)) {
            $url = 'http://design-ec.com/d/e_others_50/l_e_others_500.png';
            $imageData = file_get_contents($url);
            file_put_contents($savefile, $imageData);
        } else {
            file_put_contents($savefile, $imageData);
        }

        // Magic! âœ¨
        $image
        ->fromFile($savefile)                     // load image.jpg
        ->autoOrient()                              // adjust orientation based on exif data
    //    ->resize(200, 200)                          // resize to 320x200 pixels
    //    ->bestFit(500, 500)
        ->fitToWidth(180)
        // ->thumbnail(500, 500, 'center')
    //    ->crop(0, 0, 280, 116)
        ->toFile($savefile."-new", 'image/png')      // convert to PNG and save a copy to new-image.png
        ->toScreen();

        Log::channel('info')->info('Thumbnail end()');
        return [$request->all()];
    }
}
