@extends('client.layout.master')
@section('title')
{{ trans('web.webClient.title.home') }}
@endsection 
@section('release')
<div class="row top-buffer padding-mobile">
    <div class="col-md-4 hidden-sm hidden-xs">
        <a href="https://friday.kodansha.ne.jp/sn/u/book-list" class="link-gray">
            <div class="content-thumbnail group-thumbnail" style="background-image: url(&quot;//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/27/cover2017-12-27-3_l.jpg&quot;); height: 267.105px;">
                <img class="hidden" src="//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/27/cover2017-12-27-3_l.jpg">
            </div>
        </a>
        <div class="text-right"><a href="https://friday.kodansha.ne.jp/sn/u/book-list" class="link-gray"><b>2018年1月19日号</b></a></div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="content-thumbnail lastest-content">
                    <a href="https://friday.kodansha.ne.jp/sn/u/today-photo/102929" class="link-gray">
                        <div class="custom-list-item-thumbnail small" style="background-image: url(&quot;//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/28/archive2017-12-28-61_l.jpg&quot;); height: 224.105px;">
                            <img class="hidden" src="//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/28/archive2017-12-28-61_l.jpg">
                            <span class="flag-color flag-large flag-color-other"></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12 top-buffer">
                <div class="media">
                    <div class="media-left">
                        <div class="new-content-icon"></div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="https://friday.kodansha.ne.jp/sn/u/today-photo/102929" class="link-gray"><b>【今日の１枚】岡田紗佳「ブレイク中の『テンパイボディ』」</b></a></h4>
                        <span class="custom-list-item-title">2018.01.10</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

<div>
	<h4 class="customize_h4">Tên danh mục </h4>
	<div class="media customize">
		<div class="media-left">
		  <img class="media-object img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-10.jpg')}}" alt="Generic placeholder image">
		</div>
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	  <div class="clr"></div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-19.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-20.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-27.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-17.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-32.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-33.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-34.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-39.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-38.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-10.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-37.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-36.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
	<div class="media customize">
	  <img class="mr-3 img-cat-mize" src="{{ asset('storage/imageDefault/media2017-12-29-35.jpg')}}" alt="Generic placeholder image">
	  <div class="media-body">
	    <h5 class="mt-0">上野 新橋 神田 蒲田　旨くて安くて雰囲気良し!覆面調査で見つけたガード下酒場の名店</h5>
	    <span>2017.12.10</span>
	    <div >
	    	<a href="#" class="label-free" >無料で読める</a>
	    </div>
	  </div>
	</div>
</div>
    <!---end-wrap---->
@stop
@section('nav-bar')
	@include("client.layout.nav-bar")
@endsection
