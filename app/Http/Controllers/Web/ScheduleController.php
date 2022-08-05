<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::where('user_id',Auth::user()->id)->get()->toArray();
        $data = [];
        foreach ($schedule as $key => $value) {
            $data[$key]= $value;
            $data[$key]['calendarId'] = (string) $value['calendarId'];
            $data[$key]['id'] = $value['UUID'];
        }
        return response()->json(['status'=>true, 'data'=>$data]);
    }
    public function store(Request $request)
    {
        try {
            $upload = $request->all();
            $upload['UUID'] = $upload['id'];
            $upload['start'] = $upload['start']['_date'];
            $upload['end'] = $upload['end']['_date'];
            $upload['isAllDay'] = $upload['isAllDay'] ? 1 : 0;
            $upload['isPrivate'] = $upload['isPrivate'] ? 1 : 0;
            $upload['user_id'] = Auth::user()->id;
            Schedule::create($upload);
            return response()->json(['status'=>true]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $schedule = Schedule::where('UUID',$request->UUID)->first();
            $changes = $request->changes;
            if (array_key_exists('start',$changes)) {
                $changes['start'] = $changes['start']['_date'];
            }
            if (array_key_exists('end',$changes)) {
                $changes['end'] = $changes['end']['_date'];
            }
            $schedule->update($changes);
            return response()->json(['status'=>true]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'type' => 'server',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function destroy($UUID)
    {
        try {
            $schedule = Schedule::Where('UUID',$UUID)->first();
            $schedule->delete();
            return response()->json(['status'=>true]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
