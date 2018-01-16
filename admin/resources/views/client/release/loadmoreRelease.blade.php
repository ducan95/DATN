<div class="loadmore-{{ $current_page }}">
  @if(isset($oItemsLoad))
    @foreach($oItemsLoad as $oItem)
    	@php
	      $picture = $oItem->image_release_path;
	      $picUrl = asset('storage/imageDefault/'.$picture);
	      $id_release_number = $oItem->id_release_number;
	      $url = route('WebClientReleasePostOfRelease',['id'=>$id_release_number]);
	    @endphp
			<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6">
	     	<div class="custom-list-item">
	        <a href="{{ $url }}" class="link-gray">
	          <div class="custom-list-item-thumbnail large" style="background-image: url('{{ $picUrl }}'); height: 261.842px;">
	              <img src="https://s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/27/cover2017-12-27-3_s.jpg" class="hidden">
	          </div>
	          <span class="text-limit">Ngày tháng</span>
	        </a>
	      </div>
	    </div>
    @endforeach
	</div>
	@if($current_page < $totalPage)
	    <div class="loaibo col-md-12 col-sm-12 col-lg-12 col-xs-12">
	      <a class="btn-loadmore" href="javascript:void(0)" onclick="loadmore({{ $current_page }})"><i class="fa fa-plus"></i>もっと見る</a>
	    </div>
	@endif
@endif
