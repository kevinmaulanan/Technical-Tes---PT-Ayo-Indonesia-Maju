<?php

namespace App\Http\Controllers;

use App\Team;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

        return view('admin/team/team')->with('message', 'Data Tim Sudah Ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
