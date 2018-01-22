<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>FRIDAYデジタル</title>
		<link rel="stylesheet" href="{{ asset('client/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('client/vendor/fa/css/font-awesome.css') }}">
		<link rel="stylesheet" href="{{ asset('client/css/mycss.css') }}">
		<link rel="shortcut icon" href="{{ asset('client/images/faviconf.ico') }}" type="image/x-icon">
</head>

<body>
		<div id="page">
				<div id="wrapper" class="container">
						{{--  ###### Layout #######  --}}
						 @include("client.templates.header") 
						{{--  ###### Layout #######  --}}
						<nav class="navbar navbar-expand-lg navbar-light bg-light">
						  <a class="navbar-brand" href="#">Navbar</a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>
						  <div class="collapse navbar-collapse" id="navbarNavDropdown">
						    <ul class="navbar-nav">
						    	<?php 
						    	$arCats = DB::table('categories')->where('is_deleted','=',0)->where('id_category_parent',0)->get();
						    	?>
						    	@if(!empty($arCats))
							    	@foreach($arCats as $arCat)
							    		<?php
							    		$id_category = $arCat->id_category;
							    		$name = $arCat->name;
						          $slug = $arCat->slug;
						          $url = route('WebClientEndUserCat',['slug'=>$slug,'id'=>$id_category]);
						          $checkUrl = '*'.$slug.'*';
						          //check cat_chil 
							    		$arChilCats = DB::table('categories')->where('id_category_parent',$id_category)->where('is_deleted',0)->get();
							    		$count = count($arChilCats);
							    		?>
							    		@if($count>0)
							    			<li class="nav-item dropdown">
									        <a class="nav-link dropdown-toggle" href="{{ $url }}" class="{{ ((Request::is($checkUrl)) ? 'active' : '' ) }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									          {{ $arCat->name}}
									        </a>
									        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									        	@foreach($arChilCats as $arChilCat)
									        		@php
									        			$id_chil_category = $arChilCat->id_category;
												    		$name = $arChilCat->name;
											          $slug = $arChilCat->slug;
											          $url = route('WebClientEndUserCat',['slug'=>$slug,'id'=>$id_chil_category]);
											          $checkUrl = '*'.$slug.'*';
									        		@endphp
									          <a class="dropdown-item" class="{{ ((Request::is($checkUrl)) ? 'active' : '' ) }}" href="{{ $url }}">{{ $arChilCat->name }}</a>
									          @endforeach
									        </div>
									      </li>
							    		@else
							    			<li class="nav-item dropdown">
									        <a class="nav-link" href="{{ $url }}">{{ $arCat->name}}<span class="sr-only">(current)</span></a>
									      </li>
							    		@endif
							    	@endforeach
							    @endif
						      <li class="nav-item">
						        <a class="nav-link" href="{{ route('getLogoutEndUser')}}">{{ trans('web.webClient.logout')}}</a>
						      </li>
						    </ul>
						  </div>
						</nav>
						<div class="content">
								<div class="row">
										<div role="tabpanel">
											<!-- nav-bar -->
											

												<!-- Nav tabs -->
											<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
												<ul class="nav nav-tabs mtab" role="tablist">
														<li role="presentation" class="active">
																<a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{ trans('web.webClient.new_arrivals')}}</a>
														</li>
														<li role="presentation">
																<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">{{ trans('web.webClient.performing_arts')}}</a>
														</li>
														<li role="presentation">
																<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">{{ trans('web.webClient.case')}}</a>
														</li>
														<li role="presentation">
																<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">{{ trans('web.webClient.sport')}}</a>
														</li>
														<li role="presentation">
																<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">{{ trans('web.webClient.column')}}</a>
														</li>
														<li role="presentation">
																<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">{{ trans('web.webClient.gravure')}}</a>
														</li>
														<li role="presentation">
																<a href="{{ route('getLogoutEndUser')}}" aria-controls="tab" role="tab" data-toggle="tab">{{ trans('web.webClient.logout')}}</a>
														</li>
												</ul>
											</nav> -->
												<!-- Tab panes -->
												<div class="tab-content">
														<div role="tabpanel" class="tab-pane active" id="home">
																<div class="row">
																		<div class="news col-xs-9">
																				
																		</div>
																		<div class="sidebar col-xs-3">
		
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
						<div class="content-wrapper">
								<div class="row">
										<div class="col-md-8">
												{{--  ###### Layout #######  --}}
												@yield('content')
												{{--  ###### Layout #######  --}}
										</div>

										<!-- navbav -->
										<div class="col-md-4">
												{{--  ###### Layout #######  --}}
												@yield('nav-bar')
												<!-- @include("client.templates.nav-bar")  -->
												{{--  ###### Layout #######  --}}
										</div>
										<!-- /navbav -->
								</div>
						</div>
						{{--  ###### Layout #######  --}}
						@include("client.templates.footer") 
						{{--  ###### Layout #######  --}}
				</div>
		</div>
		<script src="{{ asset('assets/base/bower_components/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('assets/base/bower_components/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('client/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('client/js/myjs.js') }}"></script>
		@yield('bottom-js')
		@yield('usersite-bottom-js')
		<script>
			var APP_CONFIGURATION = {
				BASE_URL: "{{ url('/') }}"
			}
		</script>
		<!-- <script src="{{ asset('client/vendor/jquery.min.js') }}"></script> -->	
</body>

</html>