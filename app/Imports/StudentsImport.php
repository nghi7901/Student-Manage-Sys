<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Student([
            //
            'studentId' => $row[0],
            'name' => $row[1],
            'birthday' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row[2]))->format('Y-m-d'),
            'gender' => ($row[3]),
            'gpa' => floatval($row[4]),
            'lop' => ($row[5]),
            'status' => ($row[6]),
        ]);
    }
}
