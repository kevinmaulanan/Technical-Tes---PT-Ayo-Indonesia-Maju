<?php

function validateTeamCreate($request){
    $request->validate([
        'team_name'=> 'required|unique:teams|max:128',
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


function validatePlayerUpdate($request, $player){

    $request->validate([
        'player'=> 'required|max:128',
        'tall' => 'required|min:1',
        'weight'=> 'required|min:1',
        'nomor'=> 'required|digits_between:1,99|unique:players,player_nomor,'. $player->player_nomor. ',player_nomor',
        
        'position'=> 'required',
        'team'=> 'required|unique:players,id_team,'.$player->id_team,
        ]);
    }

?>