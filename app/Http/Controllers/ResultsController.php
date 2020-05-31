<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Team;
use App\Player;
use App\Position;
use App\Result;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function result(Request $request)
    {
        $page = pagination($request);

        $next = $page + 1;
        $pref = $page - 1;

        $result = Result::has('schedule')->has('player')->limit(5)->offset(($page - 1) * 5)->get();
    
        $total = ceil(DB::table('results')->count() / 5);
        $number = range(1, $total);

        return view('admin/result/result', ['result' => $result, 'active' => $page, 'pref' => $pref, 'next'=> $next, 'looping' => $number, 'count' => $total]);
    }

    public function resultcreateview($id)
    {
        $schedule = Schedule::has('guest')->has('host')->where('id', $id)->first();
        
        $player = Player::where('id_team', $schedule->id_host)->orWhere('id_team', $schedule->id_guest)->get();
        $idhost = $schedule->id_host;
        $idguest = $schedule->id_guest;
        return view('admin/result/createresult', compact('schedule','player','idhost','idguest'));
    }

    public function resultcreate(Request $request)
    {
        validateResult($request);
        $idteam = Player::where('id', $request->player)->select('id_team')->first();
        $idresult = Result::where('id_schedule', $request->idschedule)->select('id')->first();

        DB::table('results_players')->insert([
            'gol_time' => $request->time,
            'id_player' => $request->player,
            'id_team' => $idteam->id_team,
            'id_result' => $idresult->id,
        ]);
        
        $resultHost = DB::table('results_players')->where('id_result',$idresult->id)->where('id_team',$request->idhost)->count() ; 
        
        $resultGuest = DB::table('results_players')->where('id_result',$idresult->id)->where('id_team',$request->idguest)->count() ; 

        Result::where('id', $idresult->id)->update([
                'score' => $resultHost . ' - ' . $resultGuest,
        ]);
        
        return redirect('admin/schedule')->with('message', 'Data Skore Sudah Ditambahkan');

    }

}
