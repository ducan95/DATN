@extends('client.layout.master')
@section('content')

<div>
	<h4 class="customize_h4">マイページ</h4>
	<div class="media customize">
	  <div class="media-body">
	    <h5 class="mt-0">登録メールアドレス (địa chỉ email đã đăng ký)</h5>
	    <span>{{ Auth::guard('member')->user()->email }}</span>
	  </div>
	</div>
	<div class="media">	  
	  <div >
	    <a href="{{ route('webClientMemberChangeEmail') }}" class="btn btn-primary btn-lg" >登録メールアドレス変更</a>
	  </div>
	</div>
	<div class="media">	  
	  <div >
	    <a href="{{ route('webClientMemberChangePassword',['id'=> Auth::guard('member')->user()->id_member]) }}" class="btn btn-primary btn-lg" >パスワード変更</a>
	  </div>
	</div>
</div>
    <!---end-wrap---->
@stop
@section('nav-bar')
	@include("client.layout.nav-bar")
@endsection
