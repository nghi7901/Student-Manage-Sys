<!-- Modal -->
<div class="modal fade" id="editStudent{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cập nhật sinh viên</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('students.update', ['student' => $student])}}" style="margin: 0 auto; max-width:600px">
            <div class="modal-body">
                    @csrf 
                    @method('put')
                    <div class="mb-3">
                        <label>Mã số sinh viên</label>
                        <input class="form-control" type="text" name="studentId" placeholder="Mã số sinh viên" value="{{$student->studentId}}" />
                    </div>
                    <div class="mb-3">
                        <label>Họ tên</label>
                        <input class="form-control" type="text" name="name" placeholder="Họ và tên" value="{{$student->name}}" />
                    </div>
                    <div class="mb-3">
                        <label>Ngày sinh</label>
                        <input class="form-control" type="date" name="birthday" placeholder="" value="{{$student->birthday}}" />
                    </div>
                    <div class="mb-3">
                        <label>Giới tính</label>
                        <select class="form-control" name="gender">
                            <option value="">---</option>
                            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Nam</option>
                            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Nữ</option>
                          </select>
                    </div>
                    <div class="mb-3">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                            <option value="">---</option>
                            @foreach ($arrStudentStatus as $option => $value)
                              <option value="{{$value}}" {{ $student->status == $value ? 'selected' : '' }}>{{$option}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-3">
                        <label>GPA</label>
                        <input class="form-control" type="text" name="gpa" placeholder="GPA" value="{{$student->gpa}}"/>
                    </div>
                    <div class="mb-3">
                        <label>Lớp</label>
                        <input class="form-control" type="text" name="lop" placeholder="Lớp" value="{{$student->lop}}"/>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>