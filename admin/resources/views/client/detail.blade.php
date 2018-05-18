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
            <div class="content-container top-buffer bottom-buffer">
                <div class="title" style="font-size: 30px;text-align: left;color: #5ca038;">{{ $row->title }}</div>
                <p class="content-date" style="float:left">{{ $row->time_begin }}</p>
                @php
                    $picture = $row->thumbnail_path;
                    $picUrl = asset('storage/'.$picture);
                @endphp
                {{--  <div class="media-left">
                    <img class="media-object img-cat-mize" src="{{ $picUrl }}" alt="Generic placeholder image">
                </div>  --}}
            </div>
            </div>
            <p class="nbsp"><br></p>
            <div class="nbsp">　{!! $row->content !!}</div>
            <p class="nbsp" style="margin-top: 30px;text-align: right;margin-right: 62px;font-style: oblique;font-size: 20px;">  {{ $row->username }}</p>
            {{--  <hr  width="100%" size="5px" align="center" color="red" />   --}}
        </div>
    </div>
    
    <div class="container-course">
      <div class="row top-buffer">
      </div> 
        <div class="row">
         <div class="txt-cmt">
            <div>
                {{--  <img src="{{ asset('client/media/icon/person.png') }}">  --}}
                <textarea id="content" placeholder="Vui lòng nhập tiếng Việt có dấu" class="txt-content" style="width: 353px;margin-left: 60px; margin-top: 62px;"></textarea>
            </div>
            @if(isset(Auth::guard('member')->user()->email))
            <div>
                <button class="btn btn-default " style="margin-top: 10px;margin-left: 60px;"><a class="button" href="javascript:;" onclick="submitcontent({{ $row->id_post }},{{Auth::guard('member')->user()->id_member}})" >Gửi bình luận</a></button>
            </div>
            @else
                <p style="color:red;padding-left: 58px;">Bạn phải đăng nhập để  bình luận</p>
            @endif 
        </div>
            @if(empty($res3))
                <h1>Chưa có bình luận nào</h1>
            @else    
            {{--  <form>
            </form>  --}}
                @foreach ($res3 as $res)
                    @php
                    $email = $res->email;
                    $content = $res->comment_content;
                    @endphp
                <div>
                    <p style="margin-left: 60px;margin-top: 30px;">{{ $email }}</p>
                    <p style="margin-left: 120px">{{ $content }}</p>
                    <p style="margin-left: 60px">----------------------------------------------------------------------------</p>
                </div>
                @endforeach       
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
    function submitcontent(post_id,member_id) {
       var content=window.document.getElementById("content").value;
       $.ajax({
        url: "{{route('apiCommentAdd')}}", 
        type: 'POST',
        dataType: 'html',
        data: {
            id_post: post_id,
            comment_content:content,
            id_member: member_id,
            _token: '{{ csrf_token() }}',
        },
        success: function(data){
            window.location.reload();
        }
       });
    }
    
</script>



@endsection
