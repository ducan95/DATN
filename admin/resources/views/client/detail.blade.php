@extends('client.layout.master')

@section('title')
{{ trans('web.webClient.title.release') }}
@endsection 

@section('content')
<div class="content-container top-buffer bottom-buffer padding-mobile">
    
    <div class="title"><h1>{{ $oItem->title }}</h1></div>
    <p class="content-date">{{ format_date($oItem->time_begin)}}</p>
</div>

<div class="content-container top-buffer bottom-buffer padding-mobile">
    <div id="div-friday-content" class="bottom-buffer">        
      <p class="nbsp"><br></p>
      <div data-id="9365772" class="image-container" data-name="media/2017/12/28/media2017-12-28-102_l.jpg" data-alt="女子大生水着美女図鑑　第85回　日本赤十字看護大学　中村 彩香さん" data-src="" data-fee="true" data-viewer="false" contenteditable="false">
        <div class="text-center thumbnail" style="border: none; padding: 0">
          @if(Auth::check())

          @else
          <img alt="女子大生水着美女図鑑　第85回　日本赤十字看護大学　中村 彩香さん" data-type="unpaid" src="https://friday.kodansha.ne.jp/sn/u/102908/image?data=1514438323zU93BgZYVvrKTdLGOyo3oA" style="width: 100%">
          @endif
        </div>
      </div>
      <p class="nbsp"><br></p>
      <p class="nbsp">　{{ $oItem->content }}</p>
      <p class="nbsp"></p>
    </div>
    
    <div class="container-course">
        <div class="row">
          <div class="col-md-6 top-buffer">
            <span class="label-course label-course-navy large">新規で会員登録をご希望の方</span>
            <div class="register-member text-center top-buffer">
                <a href="https://friday.kodansha.ne.jp/s/register?data=column%2F102908" class="btn-block btn-0-336 btn-register-member link-for-click" style="height: 108.528px;"></a>
            </div>
          </div>
          <div class="col-md-6 top-buffer">
              <span class="label-course label-course-navy large">新規で会員登録をご希望の方</span>
              <div class="register-member text-center top-buffer">
                  <a href="https://friday.kodansha.ne.jp/s/register?data=column%2F102908" class="btn-block btn-0-336 btn-register-member link-for-click" style="height: 108.528px;"></a>
              </div>
          </div>
          <div class="col-md-6 top-buffer">
            <span class="label-course label-course-teal large">既に会員登録がお済みの方</span>
            <div class="top-buffer">
                <a href="https://friday.kodansha.ne.jp/s/login?data=column%2F102908" class="btn-block btn-0-336 btn-login-member" style="height: 108.528px;"></a>
            </div>
          </div>
          <div class="col-md-6 top-buffer">
            <span class="label-course label-course-teal large">既に会員登録がお済みの方</span>
            <div class="top-buffer">
                <a href="https://friday.kodansha.ne.jp/s/login?data=column%2F102908" class="btn-block btn-0-336 btn-login-member" style="height: 108.528px;"></a>
            </div>
          </div>
      </div>

      <div class="row top-buffer">
        <div class="col-md-6 col-md-offset-3">
            <a class="btn btn-default btn-back btn-block" href="https://friday.kodansha.ne.jp/sn/u/column">Back</a>
        </div>
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
                  $picUrl = asset('storage/imageDefault/'.$picture);
                  $id_post = $post->id_post;
                  $slug = $post->slug;
                  $urlDetail = route('WebClientEndUserDetail',['slug'=>$slug,'id'=> $id_post]);
                ?>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 rc-box">
                    <a href="{{ $urlDetail }}">
                        <div style="height: 140px; background-image: url('{{ $picUrl }}');">
                            <img src="{{ $picUrl }}" class="hidden">
                        </div>
                        <span class="text-limit"><b>大特集　アニマロジーで占う「有名芸能人の運気と相性」</b></span>
                    </a>
                </div>
              @endforeach
            @endif
            <!-- <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 rc-box">
                <a href="https://friday.kodansha.ne.jp/sn/u/entertainment/102924" class="link-gray">
                    <div style="height: 140px; background-image: url(&quot;//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/28/archive2017-12-28-55_t.jpg&quot;);">
                        <img src="//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/28/archive2017-12-28-55_t.jpg" class="hidden">
                    </div>
                    <span class="text-limit"><b>大特集　アニマロジーで占う「有名芸能人の運気と相性」</b></span>
                </a>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 rc-box">
                <a href="https://friday.kodansha.ne.jp/sn/u/entertainment/102906" class="link-gray">
                    <div style="height: 140px; background-image: url(&quot;//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/28/archive2017-12-28-34_t.jpg&quot;);">
                        <img src="//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/28/archive2017-12-28-34_t.jpg" class="hidden">
                    </div>
                    <span class="text-limit"><b>不定期連載【私の失敗】第5回　氏神一番(『カブキロックス』ボーカル)</b></span>
                </a>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 rc-box">
                <a href="https://friday.kodansha.ne.jp/sn/u/column/102907" class="link-gray">
                    <div style="height: 140px; background-image: url(&quot;//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/28/archive2017-12-28-35_t.jpg&quot;);">
                        <img src="//s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/28/archive2017-12-28-35_t.jpg" class="hidden">
                    </div>
                    <span class="text-limit"><b>連載　あのコに会いたい　CM美女日和  vol．5　川口カノン（このCM:Any Pay『paymo』）</b></span>
                </a>
            </div> -->
   
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


@endsection
@section('nav-bar')
  @include('client.layout.nav-bar')
@endsection
   
