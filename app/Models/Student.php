<?php

namespace App\Models;

use App\Enums\StudentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'studentId',
        'birthday',
        // 'sum_of_credits',
        'gpa',
        'gender',
        // 'phone',
        // 'address',
        'lop',
        'status'
    ];

    protected $casts = [
        'status' => StudentStatus::class
    ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'studentId' => $this->studentId
        ];
    }
}
