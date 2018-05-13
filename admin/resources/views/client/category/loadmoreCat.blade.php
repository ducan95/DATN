<div class="loadmore-{{ $current_page }}">
  @foreach ($arPostsLoad as $post)
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
    <div class="loaibo">
    <a class="btn-loadmore" href="javascript:void(0)" onclick="loadmore({{ $current_page}}, {{ $id }})"><i class="fa fa-plus"></i>もっと見る</a>
    </div>
@endif