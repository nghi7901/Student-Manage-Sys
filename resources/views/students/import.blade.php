<div class="modal fade" id="importStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import list students</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('students.import') }}" method="POST" name="importform" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button class="btn btn-primary"><a class="text-white">Import</a></button>
            </div>
        </form>
      </div>
    </div>
  </div>