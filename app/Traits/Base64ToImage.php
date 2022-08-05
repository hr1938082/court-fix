<?php

namespace App\Traits;

use App\Models\Images;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait Base64ToImage
{
    public static function singleBase64ToImage($image, $data, $name = null,)
    {
        $data = is_array($data) ? $data : $data->toArray();
        $img_arr = explode(',', $image);
        $imageName =  Str::uuid()->toString();
        $type = explode(';',explode('/',$img_arr[0])[1])[0];
        $base64 = base64_decode($img_arr[1]);
        $complete_name = $imageName . '.' . $type;
        Storage::disk('local')->put('images/'.$complete_name,$base64);
        if ($name) {
            $image_data =  Images::where([['imageable_id',$data['imageable_id']],['imageable_type',$data['imageable_type']]])->first();
            $image_data->delete();
            Storage::disk('local')->delete('images/'.$name);
        }
        $data['path'] = $complete_name;
        Images::create($data);
        return true;
    }
}
