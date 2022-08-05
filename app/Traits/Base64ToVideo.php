<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait Base64ToVideo
{
    public static function singleBase64ToVideo($image)
    {
        $vid_arr = explode(',', $image);
        $videoName =  Str::uuid()->toString();
        $type = explode(';',explode('/',$vid_arr[0])[1])[0];
        $base64 = base64_decode($vid_arr[1]);
        $complete_name = $videoName . '.' . $type;
        Storage::disk('local')->put('videos/'.$complete_name,$base64);
        return 'videos/'.$complete_name;
    }
}
