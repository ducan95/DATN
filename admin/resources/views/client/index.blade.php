@extends('client.layout.master')
@section('title')
{{ trans('web.webClient.title.home') }}
@endsection   
@section('release')

<div class="box top-buffer box-user-sidebar content-list">
          <div class="box-header with-border">Tất cả bài viết</div>
            <div class="box-body">
              <div class="support-information" data-device="sn"></div>
              <div class="row" id="ajax-container">
                <?php 
                $totalRecord = count($oItems);
                $row_count = 6;
                $totalPage = ceil($totalRecord/$row_count);
                $current_page = 1;
                $offset = ($current_page - 1) * $row_count;
                /*$oItemsLoad = DB::table('release_numbers')->skip($offset)->take(6)->get();*/
                ?>
                <div class="loadmore-{{ $current_page }}">
                  @if(isset($oItemsLoad))
                    @foreach ($oItemsLoad as $post)
                    @php
                        $id_post = $post->id_post;
                        $picture = $post->thumbnail_path;
                        $picUrl = asset('storage/'.$picture);
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
                        <span>{{ $post->time_begin }}</span>
                        <div >
                            <a href="{{ $urlDetail }}" class="label-free" >Xem...</a>
                        </div>
                    </div>
                    </div>
                    @endforeach
                  @endif
                </div>
                
                @if($current_page < $totalPage)
                <div class="loaibo col-md-12 col-sm-12 col-lg-12 col-xs-12">
                  <a class="btn-loadmore" href="javascript:void(0)" onclick="loadmorePost({{ $current_page }})"><i class="fa fa-plus"></i>Xem thêm</a>
                  @section('usersite-bottom-js')
                  <script type="text/javascript">
                    function loadmorePost(current_page) {
                      var a = '.loadmore-'+current_page;
                    $.ajax({
                      url: "{{route('WebClientEndUserLoadmorePost')}}", 
                      type: 'POST',
                      dataType: 'html',
                      data: {
                        current_page:current_page,
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
                @endif
              </div>
            </div>
        </div>


@endsection  
