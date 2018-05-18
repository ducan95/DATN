<header class="main-header">
<a href="/" ><img src="{{ asset('client/media/icon/thoitrang.png') }}" style="width: 100%;height: 160px;"/></a>
  <nav class="navbar navbar-static-top">
    <div class="_container">
      <div class="navbar-header">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
    </div>
    <div class="_container pc-element">
      <div class="navbar-collapse pull-left" id="navbar-collapse">
        <div>
          <div class="pull-right mobile-element btn-close"><i class="fa fa-close"></i></div>
            <div id="navbar">    
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
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
                      <li class="pc-element btn-register">
                        <a href="{{ route('WebClientEndUserRelease') }}" >SỐ PHÁT HÀNH</a>
                        </li>
                      @if(Auth::guard('member')->check())
                        <li class="pc-element btn-register">
                        <a href="{{ route('WebClientEndUserMyPage') }}" >TRANG CỦA TÔI</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('getLogoutEndUser')}}">{{ "ĐĂNG XUẤT"}}</a>
                      </li>
                      @else
                      <li class="pc-element btn-login" >
                        <a href="{{ route('getLoginEndUser') }}">ĐĂNG NHẬP</a>
                      </li>
                      <li class="pc-element btn-register">
                        <a href="{{ route('webClientMemberIndex') }}">ĐĂNG KÝ</a>
                      </li>
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