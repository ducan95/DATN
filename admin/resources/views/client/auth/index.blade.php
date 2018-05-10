@extends('client.layout.master')
@section('title')
	{{ trans('web.webClient.title.login') }}
@endsection
@section('content')
<div>
    @if(Session::get('status') != null)
    <p class="alert alert-danger">{{ Session::get('status')}}</p>
    @endif
	<i class="fa fa-th-large" aria-hidden="true"></i><span>Đăng ký thành viên</span>
	<form action="{{ route('getLoginEndUser') }}" method="post" id="main" class="form">
		{{ csrf_field() }}
	  <div class="form-group">
	    <label class="label" for="exampleInputEmail1">Địa chỉ e-mail</label>
	    <input type="email" class="form-control" placeholder="Email" name="email" required>
	  </div>
	  <div class="form-group">
	    <label class="label" for="exampleInputPassword1">Mật khẩu</label>
	    <input type="password" class="form-control" placeholder="Password" name="password" required>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@section('usersite-bottom-js')
<script type="text/javascript">
		$(document).ready(function(){
			$('.form').validate({
				ignore: [],
				debug: false,
				rules: {
					password: {
						required: true,
						minlength: 6,
					},
					email: {
						required: true,
						email: true,
					},
				},
				messages: {
					password: {
						required: '{{trans('validate.webClient.password_required')}}',
						minlength: '{{trans('validate.webClient.password_min_6_characters')}}',
					},
					email: {
						required: '{{trans('validate.webClient.email_required')}}',
						email: '{{trans('validate.webClient.email_must_be_valid_email_address')}}',
					},
				}
			});		
		});	
	</script>
	@endsection
@stop