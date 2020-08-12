<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Student;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return new Student([
            'student_name'     => $row[1]." ".$row[2],
            'gender'    => $row[3],
            'class' => $row[4],
            'stream' => $row[5],
            'status' => "Active",
            'school_id' => $row[6],
        ]);
    }
}
