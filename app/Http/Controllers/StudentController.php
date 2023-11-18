<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatus;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    //
    public function index(Request $request){
        $arrStudentStatus = StudentStatus::getArray();
        if($request->filled('search')){
            $studentList = Student::where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('studentId', 'LIKE', "%{$request->search}%")
            ->paginate(5);
        }else{
            // $studentList = Student::get();
            $studentList = Student::orderBy("studentId","asc")->paginate(5);
        }
        // $studentList = Student::all();
        return view('students.index', [
            'studentList' => $studentList,
            'arrStudentStatus' => $arrStudentStatus,
        ]);
        
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'studentId' => 'required',
            'birthday' => 'required|date_format:Y-m-d',
            'gpa' => 'required',
            'gender' => 'required',
            'lop' => 'required',
            'status' => 'required'
        ]);

        $newStudent = Student::create($data);

        return redirect(route('students'));

    }

    public function edit(Student $student){
        return view('students.edit', ['student' => $student]);
    }

    public function update(Student $student, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'studentId' => 'required',
            'birthday' => 'required|date_format:Y-m-d',
            'gpa' => 'required',
            'gender' => 'required',
            'lop' => 'required',
            'status' => 'required'
        ]);

        $student->update($data);

        return redirect(route('students'))->with('success', 'Updated succesffully');
    }

    public function delete(Student $student){
        $student->delete();
        return redirect(route('students'))->with('success', 'Deleted succesffully');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function import() 
    {
        Excel::import(new StudentsImport, request()->file('file'));
        return back();
    }

    public function showChart()
    {
        $data['pieChart'] = Student::select(DB::raw("COUNT(*) as count"), DB::raw("(
            CASE WHEN gpa>=2 and gpa < 2.8 THEN 'Average' 
                WHEN gpa>=2.8 and gpa < 3.2 THEN 'Good'
                WHEN gpa>=3.2 and gpa < 3.6 THEN 'Very good'
                WHEN gpa>=3.6 and gpa < 4.0 THEN 'Excellent'
                ELSE 'Failed' END) as rank"))
            ->groupBy('rank')
            ->orderBy('count')
            ->get();

        $data['barChart'] = Student::select(DB::raw("COUNT(*) as count"), DB::raw("(
            CASE WHEN status='Active' THEN 'Active' 
                WHEN status='Leave' THEN 'Leave'
                WHEN status='Suspended' THEN 'Suspended'
                WHEN status='Drop out' THEN 'Drop out'
                ELSE 'Failed' END) as status"))
            ->groupBy('status')
            ->orderBy('count')
            ->get();

        return view('students.statistics', $data);
    }
    
}
