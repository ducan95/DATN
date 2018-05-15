@extends('client.layout.master')
@section('title')
	{{ trans('web.webClient.title.mypage') }}
@endsection
@section('content')

<div>
	<h4 class="customize_h4">Thay đổi mật khẩu đăng ký
	</h4>
	<div class="media customize">
	  <div class="media-body">
	    <h5 class="mt-0">Địa chỉ email đã đăng ký</h5>
	    <span>{{ Auth::guard('member')->user()->email }}</span>
	  </div>
	</div>
	<div class="media ">	  
	  <div class="media-body">
	    <h5 class="mt-0"></h5>
	    <form action="{{ route('webClientMemberChangePassword',['id'=> Auth::guard('member')->user()->id_member] ) }}" method="post" id="main" class="form">
	    	<div class="form-group">
			    <label class="label label_mize" for="exampleInputPassword1">Mật khẩu hiện tại
					</label>
			    <input type="password" class="form-control" placeholder="Old password" name="oldPassword" >
			    @if (isset($oldPass))
						<label id="email-error" class="error" for="email">{{ $oldPass }}</label>
					@endif
			  </div>
	    	<div class="form-group">
			    <label class="label label_mize" for="exampleInputPassword1">Mật khẩu mới
					</label>
			    <input type="password" class="form-control" placeholder="New password" name="password" id="password">
			    @if (isset($pass))
						<label id="email-error" class="error" for="email">{{ $pass }}</label>
					@endif
			  </div>
			  <div class="form-group">
			    <label class="label label_mize" for="exampleInputPassword1">Xác nhận mật khẩu
					</label>
			    <input type="password" class="form-control" placeholder="Confirm password" name="confirmPassword" >
			    @if (isset($newPass))
						<label id="email-error" class="error" for="email">{{ $newPass }}</label>
					@endif
			  </div>
	    	<div class="media row">
	    		<div class="col-md-3 col-md-offset-3">
	    			<a href="{{ route('WebClientEndUserMyPage') }}" class="btn btn-primary btn-lg" >Hủy bỏ</a>
	    		</div>
  				<div class="col-md-offset-3">
  					<button type="submit" class="btn btn-primary btn-lg">Xác nhận nội dung cập nhật</button>
  				</div>
	    	</div>
	    </form>
	    @section('usersite-bottom-js')
			<script type="text/javascript">
				$(document).ready(function(){
					$('.form').validate({
						ignore: [],
						debug: false,
						rules: {
							oldPassword: {
								required: true,
								minlength: 6,
							},
							password: {
								required: true,
								minlength: 6,
							},
							confirmPassword: {
								required: true,
								minlength: 6,
								equalTo : "#password",
							},
						},
						messages: {
							oldPassword: {
								required: '{{trans('validate.webClient.password_required')}}',
								minlength: '{{trans('validate.webClient.password_min_6_characters')}}',
							},
							password: {
								required: '{{trans('validate.webClient.password_required')}}',
								minlength: '{{trans('validate.webClient.password_min_6_characters')}}',
							},
							confirmPassword: {
								required: '{{trans('validate.webClient.password_required')}}',
								minlength: '{{trans('validate.webClient.password_min_6_characters')}}',
								equalTo : '{{trans('validate.webClient.password_confirm')}}',
							},
						}
					});		
				});	
			</script>
			@endsection
	  </div>
	</div>
	
</div>
    <!---end-wrap---->
@stop
