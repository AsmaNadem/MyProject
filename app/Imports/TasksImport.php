<?php

namespace App\Imports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\ToModel;

class TasksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Task([
            'task_name'     => $row[0],
            'task_status'    => $row[1],
            'start_date'    => $row[2],
            'duration'    => $row[3],
            'project_id'    => $row[4],
//            'employee_id'    => $row[5],

        ]);
    }
}
