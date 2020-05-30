<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Team;
use App\Player;
use App\Position;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function schedule(Request $request)
    {
        $page = pagination($request);

        $next = $page + 1;
        $pref = $page - 1;

        $schedule = Schedule::has('guest')->has('host')->limit(5)->offset(($page - 1) * 5)->get();
    
        $total = ceil(DB::table('schedules')->count() / 5);
        $number = range(1, $total);

        return view('admin/schedule/schedule', ['schedule' => $schedule, 'active' => $page, 'pref' => $pref, 'next'=> $next, 'looping' => $number, 'count' => $total]);
    }

    public function schedulebyid(Schedule $schedule)
    {   
        return view('admin/schedule/schedulebyid', compact('schedule'));
    }

    public function schedulecreateview()
    {
        $team = Team::get();
        return view('admin/schedule/createschedule', ['team' => $team]);
    }

    public function scheduleupdateview(Schedule $schedule)
    {
        $host = Team::where('id', '!=', $schedule->id_host)->get();
        $guest = Team::where('id', '!=', $schedule->id_guest)->get();
  
        return view('admin/schedule/updateschedule', compact('schedule','host','guest'));
    }

    public function schedulecreate(Request $request)
    {  
        validateSchedule($request);

        Schedule::insert([
            'match_date'=> $request->date,
            'match_time'=> $request->time,
            'id_host'=> $request->host,
            'id_guest'=> $request->guest,
        ]);

        return redirect('admin/schedule')->with('message', 'Data Schedule Sudah Ditambahkan');
    }

    public function scheduleupdate(Request $request, Schedule $schedule)
    {   
        validateSchedule($request);

        Schedule::where('id',$schedule->id)->update([
            'match_date'=> $request->date,
            'match_time'=> $request->time,
            'id_host'=> $request->host,
            'id_guest'=> $request->guest,
        ]);
         return redirect('admin/schedule')->with('message', 'Data Schedule Sudah Di Update');
    }

    public function softdelete(Request $request)
    {
      
        $page = pagination($request);
        $next = $page + 1;
        $pref = $page - 1;

        $schedule = Schedule::onlyTrashed()->limit(5)->offset(($page - 1) * 5)->get();
        
        $total = ceil(Schedule::count() / 5);
        $number = range(1, $total);

    	return view('admin/schedule/softdelete', ['schedule' => $schedule, 'active' => $page, 'pref'=> $pref, 'next'=> $next, 'looping' => $number, 'count'=>$total]);
    }

    public function scheduledelete(Schedule $schedule)
    {
        Schedule::destroy($schedule->id);
        return redirect('admin/schedule')->with('message', 'Schedule berhasil dihapus');
    }


    public function schedulerestore($id){
        $schedule = Schedule::where('id',$id)->onlyTrashed()->first();
    
        Schedule::onlyTrashed()->where('id', $id)->restore();
        return redirect('admin/schedule')->with('message', 'Schedule Sudah Berhasi Dikembalikan');
    }
}
