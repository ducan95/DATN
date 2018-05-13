<div class="loadmore-{{ $current_page }}">
  @if(isset($oItemsLoad))
    @foreach ($oItemsLoad as $post) 
   		@php
	      $picture = $post->thumbnail_path;
	      $picUrl = asset('storage/'.$picture);
	      $title = $post->title;
	      $date = strtotime($post->time_begin);
	      $slug = $post->slug;
	      $id_post = $post->id_post;
	      $urlDetail = route('WebClientEndUserDetail',['slug'=>$slug,'id'=> $id_post]);
	    @endphp
      <div class="media customize">
              <div class="media-left">
                <img class="media-object img-cat-mize" src="{{ $picUrl }}" alt="Generic placeholder image">
              </div>
              <div class="media-body">
                <h5 class="mt-0">{{ $title }}</h5>
                <span>{{ $post->time_begin }}</span>
                <div >
                  <a href="{{ $urlDetail }}" class="label-free" >Xem...</a>
                </div>
              </div>
            </div>
    @endforeach
	</div>
	@if($current_page < $totalPage)
	    <div class="loaibo col-md-12 col-sm-12 col-lg-12 col-xs-12">
	      <a class="btn-loadmore" href="javascript:void(0)" onclick="loadmorePost({{ $current_page }})"><i class="fa fa-plus"></i>もっと見る</a>
	    </div>
	@endif
@endif
