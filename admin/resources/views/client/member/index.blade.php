@extends('client.templates.master')
@section('content')
<div>
    @if(Session::get('status') != null)
    <p class="alert alert-danger">{{ Session::get('status')}}</p>
    @endif
	<i class="fa fa-th-large" aria-hidden="true"></i><span>Đăng ký thành viên</span>
	<form action="{{ route('webClientMemberSave') }}" method="post" id="main" class="form">
		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Địa chỉ Email</label>
	    <input type="email" class="form-control" placeholder="Email" name="email" >
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Mật khẩu</label>
	    <input type="password" class="form-control" placeholder="Password" name="password" required>
	  </div>
	  <div class="form-group">
	  	<label>Ngày sinh</label>
		<input type="date" name="birthday">
	  </div>
	  <div class="checkbox">
	    <label class="checkbox-inline">Giới tính: 
	      <input type="radio" value="0" name="gender" checked> Nữ
	      <input type="radio" value="1" name="gender"> Nam
      </label>
	  </div>
		<div class="form-group" >
			<input type="checkbox" name="is_receive_email" value="1">Tôi muốn nhận Email từ Friday về việc xử lý các thông tin cá nhân
		</div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	<script src="{{ asset('assets/frontend/page/member/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/page/member/jquery.validate.min.js') }}"></script>
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
					birthday: {
						required: true,
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
					birthday: {
						required: '{{trans('validate.webClient.birthday_required')}}',
					},
				}
			});		
		});	
	</script>
</div>
@stop
