@extends('admin.templates.master')
@section('content')
<div class='container'>
    <div>
        <h1 style="color: red">Bạn không đủ quyền để thực hiện chức năng này!!!</h1>
    </div>
    <div>    
            <img src="{{ asset('assets/img/opps.jpg') }}" style="width: 100%;height: 330px;margin-top: 35px"/>
    </div>
</div>
@endsection  