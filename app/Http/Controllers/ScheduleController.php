<?php

namespace App\Http\Controllers;

use App\Models\Khs;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){
        $schedules=Schedule::paginate(10);
        return view('pages.schedule.index',['schedules'=>$schedules]);
    }
    public function qrcode(Schedule $schedule){
        // dd($schedule);
        return view('pages.schedule.input-qrcode')->with('schedule',$schedule);
    }

    public function generateQrCodeUpdate(Request $request,Schedule $schedule){
        // dd($schedule);
        $request->validate([
            'code'=>'required',
        ]);

        $schedule->update([
            'kode_absensi'=>$request->code,
        ]);
        // $schedules= Schedule::where('id',$schedule->id)->first();
        // dd($request);
        if($schedule){
            // $schedule->update([
            //     'code'=>$request->code,
            // ]);
            return view('pages.schedule.show-qrcode',['schedule'=>$schedule])->with('error','Code not found');
        }else{
            return redirect()->route('schedule.index')->with('error','Code not found');
        }
    }
    public function create(Request $request){}
    public function store(Request $request){}
    public function update(Request $request){}
    public function destroy(Request $request){}
}
