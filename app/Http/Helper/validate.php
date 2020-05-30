<?php

use App\Player;

function validateTeamCreate($request){
    $request->validate([
        'team_name'=> 'required|unique:teams|max:128',
        'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'date' => 'required|date',
        'address'=> 'required',
        'city'=> 'required',
     ]);
}

function validateTeamUpdate($request){
    $request->validate([
        'team_name'=> 'required|max:128',
        'date' => 'required|date',
        'address'=> 'required',
        'city'=> 'required',
     ]);
}


function validatePlayerCreate($request){
    $request->validate([
        'player'=> 'required|unique:players,player_name|max:128',
        'tall' => 'required|min:1',
        'weight'=> 'required|min:1',
        'nomor'=> 'required|numeric|between:1,99|unique:players,player_nomor,null,id,id_team,'.$request->team,
        
        'position'=> 'required',
        'team'=> 'required|unique:players,id_team,null,id,player_nomor,'.$request->nomor,
        ]);
}

function validatePlayerUpdate($request, $player){
    if($request){
        $request->validate([
            'player'=> 'required|max:128',
            'tall' => 'required|digits_between:1,300',
            'weight'=> 'required|min:1',
            'nomor'=> 'required|digits_between:1,99',
            'position'=> 'required',
            'team'=> 'required',
            ]);
        }
        if($request->team == $player->id_team && $request->nomor == $player->player_nomor){
    
         }else{
            $count = Player::where('id_team', $request->team)->where('player_nomor', $request->nomor)->count();
            return $count;
         }
    }

function validateSchedule($request){
    $request->validate([
        'date' => 'required|date',
        'time' => 'required',
        'host' => 'required|different:guest',
        'guest'=> 'required|different:host',
        ]);
    }


        

?>