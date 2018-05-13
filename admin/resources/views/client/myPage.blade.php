@extends('client.layout.master')
@section('title')
	{{ trans('web.webClient.title.mypage') }}
@endsection
@section('content')

<div>
	<h4 class="customize_h4">Trang của tôi</h4>
	<div class="media customize">
	  <div class="media-body">
	    <h5 class="mt-0">Địa chỉ email đã đăng ký</h5>
	    <span>{{ Auth::guard('member')->user()->email }}</span>
	  </div>
	</div>
	<div class="media">	  
	  <div >
	    <a href="{{ route('webClientMemberChangeEmail') }}" class="btn btn-primary btn-lg">Thay đổi địa chỉ email đã đăng ký</a>
	  </div>
	</div>
	<div class="media">	  
	  <div >
	    <a href="{{ route('webClientMemberChangePassword',['id'=> Auth::guard('member')->user()->id_member]) }}" class="btn btn-primary btn-lg" >Thay đổi mật khẩu</a>
	  </div>
	</div>
</div>
    <!---end-wrap---->
@stop