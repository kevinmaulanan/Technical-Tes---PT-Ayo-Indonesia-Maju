<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Team;
use App\Player;
use App\Position;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function player(Request $request)
    {
        $page = pagination($request);
        $next = $page + 1;
        $pref = $page - 1;

        $player = Player::has('team')->has('position')->limit(5)->offset(($page - 1) * 5)->get();
        
        $total = ceil(Player::has('team')->has('position')->count() / 5);
        $number = range(1, $total);

        return view('admin/player/player', ['player' => $player, 'active' => $page, 'pref' => $pref, 'next' => $next, 'looping' => $number, 'count' => $total]);
    }

    public function playercreateview()
    {
        $position = Position::get();
        $team = Team::get();

        return view('admin/player/createplayer', ['position' => $position, 'team' => $team]);
    }

    public function playerupdateview(Player $player)
    {
        $position = Position::where('id', '!=', $player->id_position)->get();
        $team = Team::where('id', '!=', $player->id_team)->get();
  
        return view('admin/player/updateplayer', compact('player','position','team'));
    }

    public function playerbyid(Player $player)
    {
        return view('admin/player/playerbyid', compact('player'));
    }

    
    public function playercreate(Request $request)
    {  
        validatePlayerCreate($request);

        Player::insert([
            'player_name'=> $request->player,
            'player_tall'=> $request->tall,
            'player_weight'=> $request->weight,
            'player_nomor'=> $request->nomor,
            'id_position'=> $request->position,
            'id_team'=> $request->team,
        ]);

        return redirect('admin/player')->with('message', 'Data Pemain Sudah Ditambahkan');
    }


    public function playerupdate(Request $request, Player $player)
    {   
        $count = validatePlayerUpdate($request,$player);
        if($count!=0){
            return redirect('admin/player/update/'.$player->id)->with('error', 'Nomor : " '. $request->nomor. ' Pada Tim tersebut sudah ada');
         }else{
             Player::where('id',$player->id)->update([
                 'player_name'=> $request->player,
                 'player_tall'=> $request->tall,
                 'player_weight'=> $request->weight,
                 'player_nomor'=> $request->nomor,
                 'id_position'=> $request->position,
                 'id_team'=> $request->team,
             ]);
             return redirect('admin/player')->with('message', 'Data Player:' .$player->player_name . 'Sudah Di Update');
         }  
    }

    public function softdelete(Request $request){

        $page = pagination($request);
        $next = $page + 1;
        $pref = $page - 1;

        $player = Player::onlyTrashed()->limit(5)->offset(($page - 1) * 5)->get();
        
        $total = ceil(Player::onlyTrashed()->count() / 5);
        $number = range(1, $total);

    	return view('admin/player/softdelete', ['player' => $player, 'active' => $page, 'pref'=> $pref, 'next'=> $next, 'looping' => $number, 'count'=>$total]);
    }

    public function playerdelete(Player $player)
    {
        Player::destroy($player->id);
        return redirect('admin/player')->with('message', 'Pemain : ' .$player->player_name .'Berhasil Dihapus');
    }

    public function playerrestore($id){
        $player = Player::where('id',$id)->onlyTrashed()->first();
    
        Player::onlyTrashed()->where('id', $id)->restore();
        return redirect('admin/player')->with('message', 'Player Sudah Berhasi Dikembalikan');
    }
}
