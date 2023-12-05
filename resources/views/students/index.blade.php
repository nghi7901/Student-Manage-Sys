@extends('fragments')
@section('content')

    <div class="row flex-nowrap">
        <div class="col py-3">
            
            <div class="mx-1 my-3 d-flex justify-content-center">
                <div class="col-md-6">
                    <form method="GET">
                        <div class="input-group mb-3">
                          <input 
                            type="search" 
                            name="search" 
                            value="{{ request()->get('search') }}" 
                            class="form-control border-end-0 border" 
                            placeholder="Search..." 
                            aria-label="Search" 
                            aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="submit" id="button-addon2">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
            @if (Auth::user()->is_admin)
            <div class="mx-1 my-3 d-flex justify-content-between">
                <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#addStudent"><i class="fa fa-plus p-1"></i>&nbsp;Thêm</button>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#importStudent">Nhập dữ liệu từ Excel</button>
                    <button type="button" class="btn btn-warning"><a class="text-dark" href="{{route('students.export')}}">Xuất file excel</a></button>
                </div>
            </div>
            @endif

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Mã số sinh viên</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>GPA</th>
                    <th>Trạng thái</th>
                    @if (Auth::user()->is_admin)
                    <th>Thao tác</th>
                    @endif
                    
                </tr>
                </thead>

                <tbody>
                    @foreach($studentList as $student)
                    <tr>
                        <td>{{ $student->studentId }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->birthday }}</td>
                        <td>{{ $student->gpa }}</td>
                        <td>
                            @if ($student->status->value == 'Đang học')
                                <span class="text-success">Đang học</span>
                            @elseif ($student->status->value == 'Bảo lưu')
                                <span class="text-warning">Bảo lưu</span>
                            @elseif ($student->status->value == 'Đình chỉ')
                                <span class="text-danger">Đình chỉ</span>
                            @else 
                                <span class="text-dark">Nghỉ học</span>
                            @endif
                        </td>
                        @if (Auth::user()->is_admin)
                        <td class="d-md-flex">
                            
                            <a href="" data-bs-toggle="modal" data-bs-target="#editStudent{{$student->id}}"><i class="bi bi-pencil text-muted"></i></a>
                            &nbsp;
                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteStudent{{$student->id}}"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                        @include('students.edit')
                        @include('students.delete')
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $studentList->onEachSide(1)->withQueryString()->links() }}
        </div>
    </div>
    @include('students.create')
    @include('students.import')

    <script>
        // success message popup notification
        @if(session()->has('success'))
        toastr.success("{{ session()->get('success') }}");
        @endif

    </script>
@endsection