<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="_container">
      <div class="navbar-header">
        <a href="{{ route('WebClientEndUserRelease') }}" class="navbar-brand">
        <img src="{{ asset('client/media/icon/menu-list.jpg') }}" />
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
            <li class="pc-element btn-login" style="height: 72px;">
              <a href="{{ route('getLoginEndUser') }}" style="margin: 31px;">Đăng Nhập</a>
            </li>
            <!-- END IMAGE LOGIN -LOGOUT -->
            <!-- IMAGE REGISTER -->
            <!-- with frefix is s -->
            <!-- type With frefix sy or sn || fy or fn-->
            @if(Auth::guard('member')->check())
              <li class="pc-element btn-register" style="height: 72px;">
              <a href="{{ route('WebClientEndUserMyPage') }}" style="margin: 25px;">Trang của tôi</a>
              </li>
            @else
            <li class="pc-element btn-register" style="height: 72px;">
              <a href="{{ route('webClientMemberIndex') }}" style="margin: 25px;">Đăng ký thành viên</a>
            </li>
            @endif
          </ul>
          <div class="advertising pc-element text-center">
            <img src="{{ asset('client/media/icon/ducan.jpg') }}" style="width: 100%;"/>
          </div>
          <div>
            <h1 style="text-align:center;">Sunday Magazine</h1>
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
            $arCats = DB::table('categories')->where('id_category_parent',0)->get();
            ?>
            @if(!empty($arCats))
              @foreach($arCats as $arCat)
                <?php
                $id_category = $arCat->id_category;
                $name = $arCat->name;
                $slug = $arCat->slug;
                $url = route('WebClientEndUserCat',['id'=>$id_category]);
                $checkUrl = '*category/'.$id_category;
                //check cat_chil 
                $arChilCats = DB::table('categories')->where('id_category_parent',$id_category)->get();
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
                        $url = route('WebClientEndUserCat',['id'=>$id_chil_category]);
                        $checkUrl = '*category/'.$id_category;
                      @endphp
                      <li><a href="{{$url }}"><span>{{ $name }}</span></a></li>
                    @endforeach
                  </ul>
                </li>
                @else 
                <li>
                  <a href="{{ $url }}" class="active"><span><b>{{ $name }}</b></span></a>
                </li>
                @endif
              @endforeach
            @endif
          </ul>
        </div>
      </div>
    </div>
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
                      $arCats = DB::table('categories')->where('id_category_parent',0)->get();
                      ?>
                      @if(!empty($arCats))
                        @foreach($arCats as $arCat)
                          <?php
                          $id_category = $arCat->id_category;
                          $name = $arCat->name;
                          $slug = $arCat->slug;
                          $url = route('WebClientEndUserCat',['id'=>$id_category]);
                          $checkUrl = '*category/'.$id_category;
                          //check cat_chil 
                          $arChilCats = DB::table('categories')->where('id_category_parent',$id_category)->get();
                          $count = count($arChilCats);
                          ?>
                          @if($count > 0)
                            <li class="dropdown {{ ((Request::is($checkUrl)) ? 'active' : '' ) }}"><!-- <a href="{{ $url }}" class="dropdown-toggle"> --><a href="{{ $url }}" data-toggle="dropdown">{{ $name }} <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li class="kopie"><a href="{{ $url }}"><a href="{{ $url }}">{{ $name }}</a></li>
                                @foreach($arChilCats as $arChilCat)
                                  @php
                                    $id_chil_category = $arChilCat->id_category;
                                    $name = $arChilCat->name;
                                    $slug = $arChilCat->slug;
                                    $url = route('WebClientEndUserCat',['id'=>$id_chil_category]);
                                    $checkUrl = '*category/'.$id_chil_category;
                                  @endphp
                                  <li><a href="{{ $url }}">{{ $name }}</a></li>
                                @endforeach
                              </ul>
                            </li>
                          @else
                            <li class="{{ ((Request::is($checkUrl)) ? 'active' : '' ) }}"><a href="{{ $url }}">{{ $name }}</a></li>
                          @endif
                        @endforeach
                      @endif
                      @if(isset(Auth::guard('member')->user()->email))
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('getLogoutEndUser')}}">{{ trans('web.webClient.logout')}}</a>
                      </li>
                      @else
                      <p></p>
                      @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>