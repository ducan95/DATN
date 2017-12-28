@extends('client.templates.master')
@section('content')
<div>
    @if(Session::get('status') != null)
    <p class="alert alert-danger">{{ Session::get('status')}}</p>
    @endif
	<i class="fa fa-th-large" aria-hidden="true"></i><span>会員登録</span>
	<form action="{{ route('getLoginEndUser') }}" method="post" id="main" class="form">
		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="exampleInputEmail1">電子メールアドレス</label>
	    <input type="email" class="form-control" placeholder="Email" name="email" >
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">パスワード</label>
	    <input type="password" class="form-control" placeholder="Password" name="password" required>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>

@stop