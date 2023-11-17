@if ($errors->any())
    <div class="text-danger" style="color: red; margin-left: 70px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="text-danger" style="color: red; margin-left: 70px">
        {{Session::get('error')}}
    </div>
@endif


@if(session()->has('success'))
    <div class="text-success">
        {{Session::get('success')}}
    </div>
@endif
