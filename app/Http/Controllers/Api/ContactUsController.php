<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        try {
            $contact_us = ContactUs::orderByDesc('id')->get()->toArray();
            $data=[];
            foreach ($contact_us as $key =>  $value) {
                $data[$key] = $value;
                $data[$key]['created_at'] = Carbon::parse($value['created_at'])->format('d-m-Y');
            }
            return response()->json(['status'=>true, 'data'=>$data]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }
}
