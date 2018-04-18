<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
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
        $events = Events::all();
        return view('admin.events',['events' => $events]);
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
            'txtEventname' => 'required',
            //'txtPlacename' => 'required',
            'txtEventDescription' => 'required|max:255',
        ]);

        $data = Auth::user();
        $Events = new Events();
        $Events->user_id = $data->id;
        $Events->event_name = $request->input('txtEventname');
        $Events->event_category = $request->input('selectCategory');
        $Events->event_description = $request->input('txtEventDescription');
        $Events->city = $request->input('txtCity');
        $Events->country = $request->input('txtCountry');
        $Events->postal_code = $request->input('txtPostalCode');
        $Events->save();

        return redirect('events')->with('status', 'Event Created!');
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
    public function edit(Events $id)
    {
        return json_encode($id);
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
        $this->validate($request, [
            'txtEventname' => 'required',
            'selectCategory' => 'required',
            'txtEventDescription' => 'required|max:255',
        ]);
        
        $data = Auth::user();
        $Events = Events::find($id);
        $Events->user_id = $data->id;
        $Events->event_name = $request->input('txtEventname');
        $Events->event_category = $request->input('selectCategory');
        $Events->event_description = $request->input('txtEventDescription');
        $Events->city = $request->input('txtCity');
        $Events->country = $request->input('txtCountry');
        $Events->postal_code = $request->input('txtPostalCode');
        $Events->save();

        return redirect('events')->with('status', 'Event Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	$delete = Events::find($id);
        $delete->delete();
        return redirect('events')->with('status', 'Deleted Successfully!');
    }
}
