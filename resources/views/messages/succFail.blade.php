@if(session('success'))
    <div class="alert alert-success" style="text-align: center">{{session('success')}}</div>
@endif

@if(session('fail'))
    <div class="alert alert-danger" style="text-align: center">{{session('fail')}}</div>
@endif
