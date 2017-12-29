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
	    <label class="label" for="exampleInputEmail1">電子メールアドレス</label>
	    <input type="email" class="form-control" placeholder="Email" name="email" required>
	  </div>
	  <div class="form-group">
	    <label class="label" for="exampleInputPassword1">パスワード</label>
	    <input type="password" class="form-control" placeholder="Password" name="password" required>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
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
@stop