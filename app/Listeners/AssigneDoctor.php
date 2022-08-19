<?php

namespace App\Listeners;

use App\Events\PatientCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\PatientsUsers;

class AssigneDoctor
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PatientCreated  $event
     * @return void
     */
    public function handle(PatientCreated $event)
    {
        foreach($event->doctors as $doctor){

            PatientsUsers::create([
                'patient_id' => $event->patientId,
                'user_id'=> $doctor
            ]);
        }
        
    }
}
