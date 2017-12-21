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
            <header>
                <nav>
                    <a class="navbar-brand left" href="#">
                        <img src="{{ asset('client/images/banner.jpg') }}" alt="" srcset="">
                    </a>
                    <div class="left-nav left">
                        <ul>
                            <li>
                                <a href="#" id="register">
                                    <img src="{{ asset('client/images/register.jpg') }}" alt="" srcset="">
                                </a>
                            </li>
                            <li>
                                <a href="#" id="email">
                                    <img src="{{ asset('client/images/email.jpg') }}" alt="" srcset="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="right-nav right">
                        <a href="#">
                            <img class="right" src="{{ asset('client/images/adver-top.jpg') }}" alt="" srcset="">
                        </a>
                    </div>
                </nav>

            </header>
            <div class="content container">
                <div class="row">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs mtab" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">新着</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">芸能</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">事件</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">スポーツ</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">コラム</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">グラビア</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">オススメ</a>
                            </li>
                        </ul>

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

            </div>
            <footer class="main-footer">
            	<div class="">
	            	<div class="row">
	            		<div class="col-md-12">
	            			<div class="row">
	            				<div class="col-md-4 col-sm-4">
	            					<i class="fa fa-play" aria-hidden="true"></i>
	            					<a href="">このサイトについて</a>
	            				</div>
	            				<div class="col-md-4 col-sm-4">
	            					<i class="fa fa-play" aria-hidden="true"></i>
	            					<a href="">困ったときは</a>
	            				</div>
	            				<div class="col-md-4 col-sm-4">
	            					<i class="fa fa-play" aria-hidden="true"></i>
	            					<a href="">退会はこちら</a>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="row" style="margin-top: 1%">
	            		<div class="col-md-8 offset-2">
	            				<h4 class="h4">© 講談社 All Rights Reserved</h4>
	            		</div>
	            	</div>
	            </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('client/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('client/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/myjs.js') }}"></script>
</body>

</html>