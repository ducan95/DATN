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
	<div class="media ">	  
	  <div class="media-body">
	    <h5 class="mt-0">新しく登録するメールアドレス</h5>
	    <span>{{ $emailConfirmed }}</span>
	  </div>
	</div>
	<div class="media">
		<form action="{{ route('webClientMemberAcceptChangeEmail',['id'=> Auth::guard('member')->user()->id_member])}}" method="post" id="main" class="form">			
			<input type="hidden" class="form-control" value="{{ $emailConfirmed }}" name="email">
			<div class="row">
				<div class="col-md-3 col-md-offset-3">
					<a href="{{ route('WebClientEndUserMyPage') }}" class="btn btn-primary btn-lg" >キャンセル</a>
				</div>
				<div class="col-md-offset-3">
					<button type="submit" class="btn btn-primary btn-lg">更新内容確認</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
    <!---end-wrap---->
@stop
@section('nav-bar')
	@include("client.layout.nav-bar")
@endsection
