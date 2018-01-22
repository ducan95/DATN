<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="_container">
      <div class="navbar-header">
        <a href="{{ route('WebClientEndUserRelease') }}" class="navbar-brand">
        <img src="{{ asset('client/media/icon/logo.jpg') }}" />
        </a>
        <button type="button" class="navbar-toggle collapsed" >
          <img src="{{ asset('client/media/icon/menu-list.jpg') }}""/>
        </button>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- IMAGE LOGIN- LOGOUT -->
            <!-- type With frefix s -->
            <!-- with frefix is s -->
            <li class="pc-element btn-login">
              <a href="{{ route('getLoginEndUser') }}"><img src="{{ asset('client/media/icon/pc_1026ol_03.jpg') }}""/></a>
            </li>
            <!-- END IMAGE LOGIN -LOGOUT -->
            <!-- IMAGE REGISTER -->
            <!-- with frefix is s -->
            <!-- type With frefix sy or sn || fy or fn-->
            <li class="pc-element btn-register">
              <a href="{{ route('webClientMemberIndex') }}"><img src="{{ asset('client/media/icon/pc_1026ol_10.jpg') }}""/></a>
            </li>
            <li class="mobile-element">
              <a href="{{ route('webClientMemberIndex') }}"><i class="fa fa-envelope-o"></i> 会員登録</a>
            </li>
            <li class="mobile-element">
              <a href="{{ route('getLoginEndUser') }}"><i class="fa fa-key"></i> ログイン</a>
            </li>
          </ul>
          <div class="advertising pc-element text-center">
            <img style="cursor: pointer;" src="https://im.c.yimg.jp/res/ydnstorage-media/1001737257/3455085/51c71dca5e8145c63373ec186c0e5b93.jpg"/>
          </div>
          <div class="advertising mobile-element text-center" style="background: #b3b3b3;">
            <div style="background-image: url('media/cover2017-12-27-3_s.jpg')" data-name="lastest-book" onclick="window.location.href = 'book/contents/343.html'">
              <img src="https://s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/27/cover2017-12-27-2_m.jpg" class="hidden"/>
            </div>
          </div>
          <div class="search text-right">
            <form style="width: 50%" class="pull-right" method="GET" action="https://friday.kodansha.ne.jp/sn/u/search">
              <div class="input-group">
                <input type="text" name="keyword" value="" class="form-control" placeholder="記事を検索">
                <span class="input-group-btn">
                <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
    </div>
    <!-- HTML for menu in Mobile Top -->
    <div class="_container container-navbar-collapse mobile-element mobile-hidden" style="height: 0;">
      <div class="navbar-collapse pull-left" id="navbar-collapse">
        <div>
          <div class="pull-right mobile-element btn-close"><i class="fa fa-close"></i></div>
          <ul class="nav navbar-nav">
            <?php 
            $arCats = DB::table('categories')->where('is_deleted','=',0)->where('id_category_parent',0)->get();
            ?>
            @if(!empty($arCats))
              @foreach($arCats as $arCat)
                <?php
                $id_category = $arCat->id_category;
                $name = $arCat->name;
                $slug = $arCat->slug;
                $url = route('WebClientEndUserCat',['slug'=>$slug,'id'=>$id_category]);
                $checkUrl = '*'.$slug.'*';
                //check cat_chil 
                $arChilCats = DB::table('categories')->where('id_category_parent',$id_category)->where('is_deleted',0)->get();
                $count = count($arChilCats);
                ?>
                @if($count > 0)
                <li>
                  <a href="{{ $url }}"><span><b>{{ $name }}</b></span></a>
                  <i class="mobile-element pull-right fa fa-chevron-right" data-toggle="collapse" data-target="#child-categories-16"></i>
                  <ul class="collapse mobile-element" id="child-categories-16">
                    @foreach($arChilCats as $arChilCat)
                      @php
                        $id_chil_category = $arChilCat->id_category;
                        $name = $arChilCat->name;
                        $slug = $arChilCat->slug;
                        $url = route('WebClientEndUserCat',['slug'=>$slug,'id'=>$id_chil_category]);
                        $checkUrl = '*'.$slug.'*';
                      @endphp
                      <li><a href="{{$url }}"><span>{{ $name }}</span></a></li>
                    @endforeach
                  </ul>
                </li>
                @else 
                <li>
                  <a href="{{ $url }}"><span><b>{{ $name }}</b></span></a>
                </li>
                @endif
              @endforeach
            @endif
          </ul>
        </div>
      </div>
    </div>
    <!-- HTML for menu in Mobile -->
    <div class="mobile-element">
      <div class="navbar-collapse pull-left" id="mobile-navbar-after-logo">
        <ul class="nav navbar-nav">
          <li class=""><a href="https://friday.kodansha.ne.jp/sn/u"><span>新着</span></a></li>
          <li class=""><a href="entertainment.html"><span>芸能</span></a></li>
          <li class=""><a href="gravure-top.html"><span>グラビア</span></a></li>
          <li class=""><a href="ranking.html"><span>ランキング</span></a></li>
        </ul>
      </div>
    </div>
    <!-- HTML for menu in PC -->
    <div class="_container pc-element">
      <div class="navbar-collapse pull-left" id="navbar-collapse">
        <div>
          <div class="pull-right mobile-element btn-close"><i class="fa fa-close"></i></div>

          

          <div id="navbar">    
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="#">Brand</a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <?php 
                      $arCats = DB::table('categories')->where('is_deleted','=',0)->where('id_category_parent',0)->get();
                      ?>
                      @if(!empty($arCats))
                        @foreach($arCats as $arCat)
                          <?php
                          $id_category = $arCat->id_category;
                          $name = $arCat->name;
                          $slug = $arCat->slug;
                          $url = route('WebClientEndUserCat',['slug'=>$slug,'id'=>$id_category]);
                          $checkUrl = '*'.$slug.'*';
                          //check cat_chil 
                          $arChilCats = DB::table('categories')->where('id_category_parent',$id_category)->where('is_deleted',0)->get();
                          $count = count($arChilCats);
                          ?>
                          @if($count > 0)
                            <li class="dropdown"><a href="{{ $url }}" class="dropdown-toggle" data-toggle="dropdown">{{ $name }} <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li class="kopie"><a href="{{ $url }}">{{ $name }}</a></li>
                                @foreach($arChilCats as $arChilCat)
                                  @php
                                    $id_chil_category = $arChilCat->id_category;
                                    $name = $arChilCat->name;
                                    $slug = $arChilCat->slug;
                                    $url = route('WebClientEndUserCat',['slug'=>$slug,'id'=>$id_chil_category]);
                                    $checkUrl = '*'.$slug.'*';
                                  @endphp
                                  <li><a href="{{ $url }}">{{ $name }}</a></li>
                                @endforeach
                              </ul>
                            </li>
                          @else
                            <li class=""><a href="{{ $url }}">{{ $name }}</a></li>
                          @endif
                        @endforeach
                      @endif
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('getLogoutEndUser')}}">{{ trans('web.webClient.logout')}}</a>
                      </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>