<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RentingPlace;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
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
        $renting_places = RentingPlace::all();
        return view('admin.rents',['renting_places' => $renting_places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'txtApartmentname' => 'required',
            'txtPlacename' => 'required',
            'txtPlaceDescription' => 'required|max:255',
        ]);

        $data = Auth::user();
        $RentingPlace = new RentingPlace();
        $RentingPlace->user_id = $data->id;
        $RentingPlace->apartment_name = $request->input('txtApartmentname');
        $RentingPlace->place_name = $request->input('txtPlacename');
        $RentingPlace->place_description = $request->input('txtPlaceDescription');
        $RentingPlace->city = $request->input('txtCity');
        $RentingPlace->country = $request->input('txtCountry');
        $RentingPlace->postal_code = $request->input('txtPostalCode');
        $RentingPlace->price = $request->input('txtPrice');
        $RentingPlace->save();

        return redirect('renting')->with('status', 'Renting Place Created!');
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
    public function edit(RentingPlace $id)
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
            'txtApartmentname' => 'required',
            'txtPlacename' => 'required',
            'txtPlaceDescription' => 'required|max:255',
        ]);
        
        $data = Auth::user();
        $RentingPlace = RentingPlace::find($id);
        $RentingPlace->user_id = $data->id;
        $RentingPlace->apartment_name = $request->input('txtApartmentname');
        $RentingPlace->place_name = $request->input('txtPlacename');
        $RentingPlace->place_description = $request->input('txtPlaceDescription');
        $RentingPlace->city = $request->input('txtCity');
        $RentingPlace->country = $request->input('txtCountry');
        $RentingPlace->postal_code = $request->input('txtPostalCode');
        $RentingPlace->price = $request->input('txtPrice');
        $RentingPlace->save();

        return redirect('renting')->with('status', 'Renting Place Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = RentingPlace::find($id);
        $delete->delete();
        return redirect('renting')->with('status', 'Deleted Successfully!');
    }
}
