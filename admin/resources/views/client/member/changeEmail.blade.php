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
	<div class="media ">	  
	  <div class="media-body">
	    <h5 class="mt-0">Địa chỉ e-mail mới được đăng ký</h5>
	    <form action="{{ route('webClientMemberComfirmEmail') }}" method="post" id="main" class="form">
	    	<input type="email" class="form-control" placeholder="Email" name="email">
	    	@if (session('error'))
					<label id="email-error" class="error" for="email">{{ session('error') }}</label>
				@endif
	    	<div class="media row">
	    		<div class="col-md-3 col-md-offset-3">
	    			<a href="{{ route('WebClientEndUserMyPage') }}" class="btn btn-primary btn-lg" >Hủy</a>
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
							email: {
								required: true,
								email: true,
							},
						},
						messages: {
							email: {
								required: '{{trans('validate.webClient.email_required')}}',
								email: '{{trans('validate.webClient.email_must_be_valid_email_address')}}',
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
