@extends('client.layout.master')
@section('title')
	{{ trans('web.webClient.title.member') }}
@endsection
@section('content')
<div style="padding-top: 10px;">
    @if(Session::get('status_fail') != null)
    <p class="alert alert-danger">{{ Session::get('status_fail')}}</p>
    @endif
    @if(Session::get('status_success') != null)
    <p class="alert alert-success">{{ Session::get('status_success')}}</p>
    @endif
	<i class="fa fa-th-large" aria-hidden="true"></i><span>Đăng ký thành viên</span>
	<form action="{{ route('webClientMemberSave') }}" method="post" id="main" class="form">
		{{ csrf_field() }}
	  <div class="form-group" style="padding-top: 10px;">
	    <label class="label label_mize" for="exampleInputEmail1" >Địa chỉ e-mail</label>
	    <input type="email" class="form-control" placeholder="Email" name="email">
	  </div>
	  <div class="form-group">
	    <label class="label label_mize" for="exampleInputPassword1">Mật khẩu</label>
	    <input type="password" class="form-control" placeholder="Password" name="password" >
	  </div>
	  <div class="form-group">
	  	<label class="label label_mize">Ngày sinh</label>
			<input type="date" name="birthday">
	  </div>
	  <div class="checkbox">
	    <label  class="checkbox-inline label">Giới Tính:
	      <input type="radio" value="0" name="gender" checked> Nữ
	      <input type="radio" value="1" name="gender"> Nam
      </label>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	
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
	@endsection
</div>
@stop
