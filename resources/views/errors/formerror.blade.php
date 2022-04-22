@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (\Session::has('error'))
    <div class="alert alert-danger">
        {!! \Session::get('error') !!}
    </div>
@endif
<div class="alert alert-success" style="display: none;" id="successMsg"></div>
<div class="alert alert-danger" style="display: none;" id="errorMsg"></div>
