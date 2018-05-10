@extends('client.layout.master')
@section('title')
	{{ trans('web.webClient.title.mypage') }}
@endsection
@section('content')

<div>
	<h4 class="customize_h4">Trang của tôi</h4>
	@if(session('msg_change_email'))
	<div class="media customize">
	  <div class="media-body">
	    <h5 class="mt-0">{{ session('msg_change_email') }}</h5>
	    <span>{{ Auth::guard('member')->user()->email }}</span>
	  </div>
	</div>
	@endif
	@if(session('msg_change_pass'))
		<div class="media">
		  <div class="media-body">
		    <h5 class="mt-0">{{ session('msg_change_pass') }}</h5>
		  </div>
	</div>
	@endif
	<div class="media ">	  
	  <div class="row">
  		<div class="col-md-3 col-md-offset-5">
  			<a href="{{ route('WebClientEndUserMyPage') }}" class="btn btn-primary btn-lg" >My page</a>
  		</div>
  	</div>
	</div>
</div>
    <!---end-wrap---->
@stop
@section('nav-bar')
	@include("client.layout.nav-bar")
@endsection
