@extends('client.layout.master')
@section('title')
	{{ trans('web.webClient.title.post') }}
@endsection
@section('content')

<div>
	<div class="box-callout-header"><span>{{ $release_number->name }}</span></div>
	<?php 
		$totalRecord = count($arPosts);
		$row_count = 4;
		$totalPage = ceil($totalRecord/$row_count);
		$current_page = 1;
		$offset = ($current_page - 1) * $row_count;
		$arPostsLoad = DB::table('posts')->where('id_release_number','=',$id)->skip($offset)->take(4)->get();
	?>
	<div class="loadmore-{{ $current_page }}">
		@foreach ($arPostsLoad as $post)
			@php
				$id_post = $post->id_post;
				$picture = $post->thumbnail_path;
				$picUrl = asset('storage/imageDefault/'.$picture);
				$title = $post->title;
				$date = strtotime($post->time_begin);
				$slug = $post->slug;
				$urlDetail = route('WebClientEndUserDetail',['slug'=>$slug,'id'=> $id_post]);

			@endphp
		<div class="media customize">
			<div class="media-left">
			  <img class="media-object img-cat-mize" src="{{ $picUrl }}" alt="Generic placeholder image">
			</div>
		  <div class="media-body">
		    <h5 class="mt-0">{{ $title }}</h5>
		    <span>{{ format_date($post->time_begin) }}</span>
		    <div >
		    	<a href="{{ $urlDetail }}" class="label-free" >無料で読める</a>
		    </div>
		  </div>
		</div>
		@endforeach
	</div>
	@if(isset($arPostsLoad) && $current_page < $totalPage)
	<div class="loaibo">
	<a class="btn-loadmore" href="javascript:void(0)" onclick="loadmore({{ $current_page}}, {{ $id }})"><i class="fa fa-plus"></i>もっと見る</a>
	</div>
	@endif
	@section('usersite-bottom-js')
	<script type="text/javascript">
    function loadmore(current_page, id) {
      var a = '.loadmore-'+current_page;
    $.ajax({
      url: "{{route('WebClientReleaseLoadmorePostOfRelease')}}", 
      type: 'POST',
      dataType: 'html',
      data: {
        current_page:current_page,
        id: id,
         _token: '{{ csrf_token() }}',
      },
      success: function(data){
        $('.loaibo').remove();
        $(a).after(data);
          
      },
      error: function(){
        alert('Sai');
      }
    });
	};
	</script>
	@endsection
</div>
    <!---end-wrap---->
@stop

