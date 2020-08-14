<?php

namespace App\Http\Controllers;

use App\Appointment;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateforgetdatas = Carbon::now();

        if((Auth::user()->isManager() || Auth::user()->isAdmin()))
        {
            $dateforgetdatas = Carbon::now()->subDays(7);
        }

        $appointments = Appointment::where('dateTime', '>', $dateforgetdatas)->get()->sortBy('dateTime');
        $data = [
            'appointments' => $appointments      
        ];
        return view('appointments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newappointment = new Appointment;
        $newappointment->dateTime = $request->dateTime;
        $newappointment->user_id = $request->user_id;
        $newappointment->comment = $request->comment;
        $newappointment->save(); //save model into DB table
  
        return redirect('appointments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('appointments');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        if (isset($appointment))
        {
            $data = [
                'appointment' => $appointment
            ];
            return view('appointments.edit', $data);
        }
        else{
            return redirect('appointments');
        }
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
        $appointmentToUpdate = Appointment::find($id);
        $appointmentToUpdate->dateTime = $request->dateTime;
        $appointmentToUpdate->user_id = $request->user_id;
        $appointmentToUpdate->comment = $request->comment;
        $appointmentToUpdate->save(); //save model into DB table
  
        return redirect('appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointmentToDelete = Appointment::find($id);

        if(!isset($appointmentToDelete->user_id) && !isset($appointmentToDelete->comment))
        {
            $appointmentToDelete->delete();
        }

        return back()->withInput();
    }
}
