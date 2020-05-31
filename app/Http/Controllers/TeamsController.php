<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Team;
use App\Player;
use App\Position;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function team(Request $request)
    {
        $page = pagination($request);
        $next = $page + 1;
        $pref = $page - 1;

        $team = Team::limit(5)->offset(($page - 1) * 5)->get();
        
        $total = ceil(DB::table('teams')->count() / 5);
        $number = range(1, $total);

        return view('admin/team/team',['team' => $team, 'active' => $page, 'pref'=> $pref, 'next'=> $next, 'looping' => $number, 'count'=>$total]);
    }

    public function teamcreateview()
    {
        return view('admin/team/createteam');
    }

    public function teamupdateview(Team $team)
    {
        return view('admin/team/updateteam', compact('team'));
    }

    public function teamdelete(Team $team)
    {
        Team::destroy($team->id);
        return redirect('admin/team')->with('message', 'Tim berhasil dihapus');
    }

    public function teambyid(\App\Team $team)
    {
        return view('admin/team/teambyid', compact('team'));
    }
    
    public function teamupdate(Request $request, Team $team)
    {
        validateTeamUpdate($request);
       
        if ($request->file('logo')){
            $request->validate([
                'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $fileNameLogo = 'Tim-' . $request->team_name . '-' . time() . '.' . $image->getClientOriginalExtension();
            
            Team::where('id', $team->id)->update([
                'team_name'=> $request->team_name,
                'team_logo'=> $fileNameLogo,
                'team_since'=> $request->date,
                'team_address'=> $request->address,
                'team_city'=> $request->city
            ]);

            $image->storeAs('public/tim', $fileNameLogo);
        }
        else {
            Team::where('id', $team->id)->update([
                'team_name'=> $request->team_name,
                'team_since'=> $request->date,
                'team_address'=> $request->address,
                'team_city'=> $request->city
            ]);
        }
        return redirect('admin/team')->with('message', 'Tim berhasil diupdate');
    }

    public function teamcreate(Request $request)
    {  
        validateTeamCreate($request);

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

    public function softdelete(Request $request){

        $page = pagination($request);
        $next = $page + 1;
        $pref = $page - 1;

        $team = Team::onlyTrashed()->limit(5)->offset(($page - 1) * 5)->get();
        
        $total = ceil(Team::onlyTrashed()->count() / 5);
        $number = range(1, $total);

    	return view('admin/team/softdelete', ['team' => $team, 'active' => $page, 'pref'=> $pref, 'next'=> $next, 'looping' => $number, 'count'=>$total]);

    }

    public function teamrestore($id){
        $team = Team::where('id',$id)->onlyTrashed()->first();
    
        Team::onlyTrashed()->where('id', $id)->restore();
        return redirect('admin/team')->with('message', 'Tim : '. $team->team_name . ' Sudah Berhasi Dikembalikan');
    }
}
