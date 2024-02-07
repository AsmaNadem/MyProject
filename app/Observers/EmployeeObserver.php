<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\EmployeeProgrammingLanguage;
use App\Notifications\InvoicePaid;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $employee): void
    {
//        EmployeeProgrammingLanguage::create([
//            'employee_id',
//            'programming_language_id',
//        ]);
//        $employee->projects()->sync(request()->projects);

//        auth()->user()->notify(new InvoicePaid());
    }

    public function creating(Employee $employee): void
    {
        //
    }



    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void
    {
        //
    }
}
