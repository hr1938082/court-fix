<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\Base64ToImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CoureseController extends Controller
{
    public function get_courses()
    {
        $courses = Course::with('images')->get();
        return view('Users.Panel.my_courses', compact('courses'));
    }

    public function TotalCourses()
    {
        try {
            $courses = Course::all();
            $total = count($courses);
            return response()->json(['status' => true, 'data' => $total]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function index()
    {
        try {
            $courses = Course::with('images')->orderByDesc('courses.id')->get()->toArray();
            $data = [];
            foreach ($courses as $key =>  $value) {
                $data[$key] = $value;
                $data[$key]['images'] = $value['images']['path'];
                $data[$key]['created_at'] = Carbon::parse($value['created_at'])->format('d-m-Y');
                $data[$key]['updated_at'] = Carbon::parse($value['updated_at'])->format('d-m-Y');
            }
            return response()->json(['status' => true, 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function select()
    {
        try {
            $courses = Course::select('id', 'title')->get();
            return response()->json(['status' => true, 'data' => $courses]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function store(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'title' => 'required',
                'sub_title' => 'required',
                'code' => 'required',
                'link' => 'required',
                'image' => 'required'
            ], [
                'title.required' => 'Title is required',
                'sub_title.required' => 'Subtitle is required',
                'code.required' => 'Course Code is required',
                'description.required' => 'Description is required',
                'image.required' => 'Images is required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'type' => 'user', 'message' => $validator->getMessageBag()]);
            }

            $course = Course::create($req->all());
            $imageableData = [
                'imageable_type' => 'App\Models\Course',
                'imageable_id' => $course->id,
            ];
            Base64ToImage::singleBase64ToImage($req->image, $imageableData);
            return response()->json(['status' => true]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'sub_title' => 'required',
            'code' => 'required',
            'link' => 'required',
        ], [
            'title.required' => 'Title is required',
            'sub_title.required' => 'Subtitle is required',
            'code.required' => 'Course Code is required',
            'link.required' => 'Link is required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'type' => 'user', 'message' => $validator->getMessageBag()]);
        }

        if ($req->id) {
            $course = Course::find($req->id);
            if ($course) {
                $upload = $req->all();
                if ($upload['image']) {
                    $image_data = $course->images()->first();
                    $name = $image_data->path;
                    Base64ToImage::singleBase64ToImage($upload['image'], $image_data, $name);
                }
                array_pop($upload);
                $course->update($upload);
                return response()->json(['status' => true]);
            }
            return response()->json(['status' => false, 'type' => 'developer', 'message' => "Not Found"]);
        }
        return response()->json(['status' => false, 'type' => 'developer', 'message' => "id is required"]);
    }

    public function delete($id)
    {
        try {
            if ($id) {
                $course = Course::find($id);
                if ($course) {
                    $image = $course->Images;
                    Storage::disk('local')->delete('images/' . $image->path);
                    $image->delete();
                    $course->delete();
                    return response()->json(['status' => true]);
                }
                return response()->json(['status' => false, 'type' => 'developer', 'message' => "Not Found"]);
            }
            return response()->json(['status' => false, 'type' => 'developer', 'message' => "id is required"]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function Cousrse_Search(Request $request)
    {

                
                 $courses = Course::where('title','LIKE','%'.$request->name.'%')->get();
                 $all_course = Course::get();
                 return response()->json([
                     'courses'=>$courses,
                     'all_course'=>$all_course


                 ]);
            }  



}
