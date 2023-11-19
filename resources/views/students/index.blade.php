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
            <div class="mx-1 my-3 d-flex justify-content-between">
                <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#addStudent"><i class="fa fa-plus p-1"></i></button>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#importStudent">Import</button>
                    <button type="button" class="btn btn-warning"><a class="text-dark" href="{{route('students.export')}}">Export</a></button>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>GPA</th>
                    <th>Status</th>
                    <th>Action</th>
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
                            @if ($student->status->value == 'Active')
                                <span class="text-success">Active</span>
                            @elseif ($student->status->value == 'Drop out')
                                <span class="text-danger">Suspended</span>
                            @elseif ($student->status->value == 'Leave')
                                <span class="text-warning">Leave</span>
                            @else 
                                <span class="text-dark">Drop out</span>
                            @endif
                        </td>
                        <td class="d-md-flex">
                            <a href="" data-bs-toggle="modal" data-bs-target="#editStudent{{$student->id}}"><i class="bi bi-gear text-muted"></i></a>
                            &nbsp;
                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteStudent{{$student->id}}"><i class="bi bi-trash text-danger"></i></a>

                            {{-- <form method="post" action="{{route('students.delete', ['student' => $student])}}">
                                @csrf 
                                @method('delete')
                                <button type="submit" 
                                        style="border: none; background-color: transparent" 
                                        onclick="return confirm('Are you sure you want to delete?')">
                                    <i class="bi bi-trash text-danger"></i>
                                </button>
                            </form> --}}
                        </td>
                        @include('students.edit')
                        @include('students.delete')
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $studentList->onEachSide(1)->withQueryString()->links() }}
        </div>
    </div>
    @include('students.create')
    @include('students.import')
@endsection