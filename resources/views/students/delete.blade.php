  <!-- Modal -->
  <div class="modal fade" id="deleteStudent{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xóa sinh viên</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                Bạn có chắc chắn xóa? 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <form method="post" action="{{route('students.delete', ['student' => $student])}}">
                @csrf 
                @method('delete')
                <button type="submit" class="btn btn-primary">Xóa</button>
            </form>
        </div>
      </div>
    </div>
  </div>