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
            ->paginate(6);
        }else{
            // $studentList = Student::get();
            $studentList = Student::orderBy('created_at', 'desc')->paginate(6);
        }
        // $studentList = Student::all();
        return view('students.index', [
            'studentList' => $studentList,
            'arrStudentStatus' => $arrStudentStatus,
            'title' => 'Sinh viên',
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

        return redirect(route('students'))->with('success', 'Thêm thành công !');

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

        return redirect(route('students'))->with('success', 'Cập nhật thành công !');
    }

    public function delete(Student $student){
        $student->delete();
        return redirect(route('students'))->with('success', 'Xóa thành công !');
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
        return back()->with('success', 'Nhập dữ liệu thành công !');
    }

    public function showChart()
    {
        $data['pieChart'] = Student::select(DB::raw("COUNT(*) as count"), DB::raw("(
            CASE WHEN gpa>=2 and gpa < 2.8 THEN 'Trung bình' 
                WHEN gpa>=2.8 and gpa < 3.2 THEN 'Khá'
                WHEN gpa>=3.2 and gpa < 3.6 THEN 'Giỏi'
                WHEN gpa>=3.6 and gpa < 4.0 THEN 'Xuất sắc'
                ELSE 'Failed' END) as rank"))
            ->groupBy('rank')
            ->orderBy('count')
            ->get();

        $data['barChart'] = Student::select(DB::raw("COUNT(*) as count"), DB::raw("(
            CASE WHEN status='Đang học' THEN 'Đang học' 
                WHEN status='Bảo lưu' THEN 'Bảo lưu'
                WHEN status='Đình chỉ' THEN 'Đình chỉ'
                WHEN status='Nghỉ học' THEN 'Nghỉ học'
                ELSE 'Failed' END) as status"))
            ->groupBy('status')
            ->orderBy('count')
            ->get();

        return view('students.statistics', $data, [
            'title' => 'Thống kê',
        ]);
    }
    
}
