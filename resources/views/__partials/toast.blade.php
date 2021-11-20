
@if (session()->has('alert-success'))
<div class="alert alert-success">
    <span>{{session('alert-success')}}</span>

</div>
@endif
@if (session()->has('alert-danger'))

    <div class="alert alert-danger">
        <span>{{session('alert-danger')}}</span>
    </div>
@endif
@if(session()->has('alert-danger'))
<div class="alert alert-danger">
    <span>{{session('alert-danger')}}</span>
</div>
@endif

@if (session()->has('alert-danger'))
    <div class="alert alert-danger">{{ session('alert-danger') }}</div>
@endif

