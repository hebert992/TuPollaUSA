@if(Session::has('flash_danger'))

    <div class="alert alert-danger" role="alert">{{Session::get('flash_danger')}}</div>


@endif

@if(Session::has('flash_success'))

    <div class="alert alert-success" role="alert">{{Session::get('flash_success')}}</div>
    {{Session::flush()}}

@endif