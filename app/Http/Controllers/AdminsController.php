<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function team(Request $request)
    {
        if ($request->input('page')) {
            $page = $request->input('page');
        } else {
            $page = 1;
        }

        $next = $page + 1;
        $pref = $page - 1;

        $team = DB::table('teams')->limit(5)->offset(($page - 1) * 5)->get();
        
        $total = ceil(DB::table('teams')->count() / 5);
        $number = range(1, $total);

        return view('admin/team/team',['team'=>$team, 'active' => $page, 'pref'=> $pref, 'next'=> $next, 'total' => $number, 'count'=>$total]);
    }


    public function teamcreateview()
    {
        return view('admin/team/createteam');
    }

    public function teamcreate(Request $request)
    {  
        $request->validate([
        'team_name'=> 'required|unique:teams|max:128',
        'date' => 'required|date',
        'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'address'=> 'required',
        'city'=> 'required',
        ]);

        $image = $request->file('logo');
        $fileNameLogo = 'Tim-' . $request->team_name . '-' . time() . '.' . $image->getClientOriginalExtension();


        DB::table('teams')->insert([
            'team_name'=> $request->team_name,
            'team_since'=> $request->date,
            'team_logo'=> $fileNameLogo,
            'team_address'=> $request->address,
            'team_city'=> $request->city
        ]);

        $image->storeAs('public/tim', $fileNameLogo);

        return redirect('admin/team')->with('message', 'Data Tim Sudah Ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //player Admin
    public function player(Request $request)
    {
        if ($request->input('page')) {
            $page = $request->input('page');
        } else {
            $page = 1;
        }

        $next = $page + 1;
        $pref = $page - 1;

        $player = DB::table('players')->limit(5)->offset(($page - 1) * 5)->get();
        
        $total = ceil(DB::table('players')->count() / 5);
        $number = range(1, $total);

        return view('admin/player/player',['player'=>$player, 'active' => $page, 'pref'=> $pref, 'next'=> $next, 'total' => $number, 'count'=>$total]);
    }

    public function playercreateview()
    {
        $position = DB::table('positions')->get();
        $team = DB::table('teams')->get();
        return view('admin/player/createplayer', ['position' => $position, 'team' => $team]);
    }

    public function playercreate(Request $request)
    {  
        $request->validate([
        'player'=> 'required|unique:players,player_name|max:128',
        'tall' => 'required|min:1',
        'weight'=> 'required|min:1',
        'nomor'=> 'required|digits_between:1,99|unique:players,player_nomor,null,id,id_team,'.$request->team,
        
        'position'=> 'required',
        'team'=> 'required|unique:players,id_team,null,id,player_nomor,'.$request->nomor,
        ]);

        DB::table('players')->insert([
            'player_name'=> $request->player,
            'player_tall'=> $request->tall,
            'player_weight'=> $request->weight,
            'player_nomor'=> $request->nomor,
            'id_position'=> $request->position,
            'id_team'=> $request->team,
          
        ]);

        return redirect('admin/player')->with('message', 'Data Player Sudah Ditambahkan');
    }


    //schema
    public function schedule(Request $request)
    {
        if ($request->input('page')) {
            $page = $request->input('page');
        } else {
            $page = 1;
        }

        $next = $page + 1;
        $pref = $page - 1;

        $schedule = DB::table('schedules')->limit(5)->offset(($page - 1) * 5)->get();
        
        $total = ceil(DB::table('schedules')->count() / 5);
        $number = range(1, $total);

        return view('admin/schedule/schedule',['schedule'=>$schedule, 'active' => $page, 'pref'=> $pref, 'next'=> $next, 'total' => $number, 'count'=>$total]);
    }

    public function schedulecreateview()
    {
 
        $team = DB::table('teams')->get();
        return view('admin/schedule/createschedule', ['team' => $team]);
    }

    public function schedulecreate(Request $request)
    {  
        $request->validate([
        'schedule'=> 'required|unique:schedules,schedule_name|max:128',
        'tall' => 'required|min:1',
        'weight'=> 'required|min:1',
        'nomor'=> 'required|digits_between:1,99|unique:schedules,schedule_nomor,null,id,id_team,'.$request->team,
        
        'position'=> 'required',
        'team'=> 'required|unique:schedules,id_team,null,id,schedule_nomor,'.$request->nomor,
        ]);

        DB::table('schedules')->insert([
            'schedule_name'=> $request->schedule,
            'schedule_tall'=> $request->tall,
            'schedule_weight'=> $request->weight,
            'schedule_nomor'=> $request->nomor,
            'id_position'=> $request->position,
            'id_team'=> $request->team,
          
        ]);

        return redirect('admin/schedule')->with('message', 'Data schedule Sudah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
