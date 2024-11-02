<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $query = $request->input('query');

        $appointments = Appointment::whereHas('property', function ($q) use ($query) {
            $q->where('adresse', 'like', '%' . $query . '%')
              ->orWhere('ville', 'like', '%' . $query . '%');
        })->orWhereHas('agent', function ($q) use ($query) {
            $q->where('nom', 'like', '%' . $query . '%');
        })->orWhereHas('client', function ($q) use ($query) {
            $q->where('nom', 'like', '%' . $query . '%');
        })->paginate(10);

        return view('admin.appointments.index',[
            'appointments' => $appointments,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $appointment = new Appointment();
        $agents = User::where('role', 'agent')->get(); // Assuming role field exists
        $clients = User::where('role', 'client')->get(); // Assuming role field exists
        $properties = Property::all();

        return view('admin.appointments.form',[

            'appointment' => $appointment,
            'agents' => $agents,
            'clients' => $clients,
            'properties' => $properties,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        //
        Appointment::create($request->all());

        return redirect()->route('admin.appointments.create')->with('success',"Rendez-vous planifié avec succès!");


    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //

        $agent = User::where('id', $appointment->agent_id)->first();
        $client = User::where('id', $appointment->client_id)->first();
        $property = Property::where('id', $appointment->property_id)->first();

        return view('admin.appointments.show',[

            'appointment' => $appointment,
            'agent' => $agent,
            'client' => $client,
            'property' => $property,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //

        $agents = User::where('role', 'agent')->get(); // Assuming role field exists
        $clients = User::where('role', 'client')->get(); // Assuming role field exists
        $properties = Property::all();

        return view('admin.appointments.form',[

            'appointment' => $appointment,
            'agents' => $agents,
            'clients' => $clients,
            'properties' => $properties,

        ]);

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(StoreAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());

        return redirect()->route('admin.appointments.edit',['appointment'=>$appointment->id])->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment->delete();

        return redirect()->route('admin.appointments.index',['appointment'=>$appointment->id])->with('success', "Un rendez-vous vient d'être annulé!");
    }
}
