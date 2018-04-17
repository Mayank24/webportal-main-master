<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserData;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('users')->leftJoin('posts', 'users.id', '=', 'posts.user_id')->get();
        $data = Auth::user();
        $UserData = UserData::where('user_id', $data->id)->get();
        return view('admin.users', ['data' => $data, 'UserData' => $UserData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'txtFirstname' => 'required',
            'txtLastname' => 'required',
            'txtAboutme' => 'required|max:255',
        ]);

        $data = Auth::user();
        $userdata = new UserDatas();
        $userdata->user_id = $data->id;
        $userdata->first_name = $request->input('txtFirstname');
        $userdata->last_name = $request->input('txtLastname');
        $userdata->address = $request->input('txtAddress');
        $userdata->city = $request->input('txtCity');
        $userdata->country = $request->input('txtCountry');
        $userdata->postal_code = $request->input('txtPostalCode');
        $userdata->about_me = $request->input('txtAboutme');
        $userdata->save();

        return view('admin.users', ['data' => $data, 'UserData' => $UserData]);
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
