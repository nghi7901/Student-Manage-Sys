<!-- Modal -->
<div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('students.store')}}">
            <div class="modal-body">
                    @csrf 
                    @method('post')
                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="text" name="studentId" placeholder="Enter id" />
                        <label>Student Id</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="text" name="name" placeholder="Enter name" />
                        <label>Name</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="date" name="birthday" placeholder="" />
                        <label>Birthday</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <select class="form-control" name="gender">
                            <option value="">---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        <label>Gender</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <select class="form-control" name="status">
                            <option value="">---</option>
                            @foreach ($arrStudentStatus as $option => $value)
                              <option value="{{$value}}">{{$option}}</option>
                            @endforeach
                          </select>
                        <label>Status</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        
                        <input class="form-control" type="text" name="gpa" placeholder="Enter GPA" />
                        <label>GPA</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        
                        <input class="form-control" type="text" name="lop" placeholder="Enter class" />
                        <label>Lop</label>
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