<!-- Modal -->
<div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm sinh viên</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('students.store')}}">
            <div class="modal-body">
                    @csrf 
                    @method('post')
                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="text" name="studentId" placeholder="Mã số sinh viên" />
                        <label>Mã số sinh viên</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="text" name="name" placeholder="Họ và tên" />
                        <label>Họ tên</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="date" name="birthday" placeholder="" />
                        <label>Ngày sinh</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <select class="form-control" name="gender">
                            <option value="">---</option>
                            <option value="Male">Nam</option>
                            <option value="Female">Nữ</option>
                          </select>
                        <label>Giới tính</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <select class="form-control" name="status">
                            <option value="">---</option>
                            @foreach ($arrStudentStatus as $option => $value)
                              <option value="{{$value}}">{{$option}}</option>
                            @endforeach
                          </select>
                        <label>Trạng thái</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        
                        <input class="form-control" type="text" name="gpa" placeholder="GPA" />
                        <label>GPA</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        
                        <input class="form-control" type="text" name="lop" placeholder="Lớp" />
                        <label>Lớp</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
      </div>
    </div>
  </div>