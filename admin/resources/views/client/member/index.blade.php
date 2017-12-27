@extends('client.templates.master')
@section('content')
<div>
	@if (count($errors) >0)
        <div class="box-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               {{--   <h4><i class="icon fa fa-ban"></i> Alert!</h4>  --}}
          @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
          </div>
     @endif
    
     @if (session('status'))
          <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{--  <h4><i class="icon fa fa-ban"></i> Alert!</h4>  --}}
             <p>{{ session('status') }}</p>
        </div> 
     @endif
	<i class="fa fa-th-large" aria-hidden="true"></i><span>Đăng ký thành viên</span>
	<form action="{{ route('webClientMemberSave') }}" method="post">
		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Địa chỉ Email</label>
	    <input type="email" class="form-control" placeholder="Email" name="email" required="" >
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Mật khẩu</label>
	    <input type="password" class="form-control" placeholder="Password" name="password" required="" >
	  </div>
	  <div class="form-group">
	  	<label>Ngày sinh</label>
	  	<!-- <select name="yearBirth">
	  		<?php for($i=1980; $i<= 2017; $i++){ ?> 
			  <option value="{{ $i }}">{{ $i }}</option>
			  <?php } ?>
			</select> /
			<select name="monthBirth">
	  		<?php for($i=1; $i<= 12; $i++){ ?> 
			  <option value="{{ $i }}">{{ $i }}</option>
			  <?php } ?> 
			</select> /
			<select name="dateBirth">
	  		<?php for($i=1; $i<= 31; $i++){ ?> 
			  <option value="{{ $i }}">{{ $i }}</option>
			  <?php } ?>
			</select> -->
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
</div>
@stop