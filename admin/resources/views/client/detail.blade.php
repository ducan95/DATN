@extends('client.layout.master')

@section('title')
{{ trans('web.webClient.title.post') }}
@endsection 

@section('content')
<div class="content-container top-buffer bottom-buffer padding-mobile">
    <div id="div-friday-content" class="bottom-buffer">        
      <p class="nbsp"><br></p>
      <div data-id="9365772" class="image-container" data-name="media/2017/12/28/media2017-12-28-102_l.jpg" data-alt="女子大生水着美女図鑑　第85回　日本赤十字看護大学　中村 彩香さん" data-src="" data-fee="true" data-viewer="false" contenteditable="false">
        <div class="text-center thumbnail" style="border: none; padding: 0">
          @if(Auth::check())
            <div class="content-container top-buffer bottom-buffer">
                <div class="title"><h1>{{ $oItem->title }}</h1></div>
                <p class="content-date">{{ $oItem->time_begin }}</p>
                @php
                    $picture = $oItem->thumbnail_path;
                    $picUrl = asset('storage/'.$picture);
                @endphp
                <div class="media-left">
                    <img class="media-object img-cat-mize" src="{{ $picUrl }}" alt="Generic placeholder image">
                </div>
            </div>
            </div>
            <p class="nbsp"><br></p>
            <p class="nbsp">　{{ $oItem->content }}</p>
            <p class="nbsp"></p>
        @else
          <h1>Bạn phải đăng nhập để xem bài viết</h1>
        @endif
        </div>
    </div>
    
    <div class="container-course">
      <div class="row top-buffer">
        <div class="col-md-6 col-md-offset-3">
            <a class="btn btn-default btn-back btn-block" href="http://news.ducan.com/">Back</a>
        </div>
      </div>   
        <div class="row">
         <div>
                <h1>***Bình Luận</h1>
            </div>
            @if(1 == 0)
                <h1>Chưa có bình luận nào</h1>
            @if(is_array($res3) || is_object($res3))
            <form>
            </form>
                @foreach ($res3 as $res)
                    @php
                    $a=1;
                    $email = $res->email;
                    $content = $res->content;
                @endphp
                <div>
                    <h1>{{ $email }}</h1>
                    <h1>{{ $content }}</h1>
                </div>
                @endforeach
            @endif    
        @endif    
    </div>
 
    </div>  
  </div>

  <div class="box top-buffer box-user-sidebar">
    <div class="box-header with-border">Tin cùng danh mục</div>
    <div class="box-body">   
        <div class="relative-contents">
          <div class="row">
            @if(isset($arFourPostsOfCat))
              @foreach($arFourPostsOfCat as $post)
                <?php
                  $picture = $post->thumbnail_path;
                  $picUrl = asset('storage/'.$picture);
                  $id_post = $post->id_post;
                  $slug = $post->slug;
                  $urlDetail = route('WebClientEndUserDetail',['slug'=>$slug,'id'=> $id_post]);
                ?>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 rc-box">
                    <a href="{{ $urlDetail }}">
                        <div style="height: 140px; background-image: url('{{ $picUrl }}');">
                            <img src="{{ $picUrl }}" class="hidden">
                        </div>
                        <span class="text-limit"><b>{{$slug}}</b></span>
                    </a>
                </div>
              @endforeach
            @endif
          </div>
        </div>
    </div>
    <!--<div class="box-footer"></div>-->
  </div>
<div id="option-dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body text-center">
                
            </div>
            <div class="modal-footer text-center">
                <a href="javascript: void(0)" data-dismiss="modal" aria-hidden="true" class="btn-lg btn btn-default" data-find="yes">OK</a>
                <a href="javascript: void(0)" data-dismiss="modal" aria-hidden="true" class="btn-lg btn btn-default" data-find="no">OK</a>
            </div>
        </div>
    </div>
</div><noscript>
    &lt;style type="text/css"&gt;
        .content-container {display:none;}
    &lt;/style&gt;
    &lt;div class="noscriptmsg"&gt;
        &lt;h1&gt;このページを利用するために、javascriptをオンにしてください&lt;/h1&gt;
    &lt;/div&gt;
</noscript>
<script type="text/javascript">
    function a(str) {
        return str
    }
    
</script>



@endsection
