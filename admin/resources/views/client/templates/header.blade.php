<header>
    <nav>
        <a class="navbar-brand left" href="{{ route('WebClientEndUserRelease') }}">
            <img src="{{ asset('client/images/banner.jpg') }}" alt="" srcset="">
        </a>
        <div class="left-nav left">
            <ul>
                <li>
                    <a href="{{ route('getLoginEndUser') }}" id="login">
                        <img src="{{ asset('client/images/register.jpg') }}" alt="" srcset="">
                    </a>
                </li>
                <li>
                    <a href="{{ route('webClientMemberIndex') }}" id="register">
                        <img src="{{ asset('client/images/email.jpg') }}" alt="" srcset="">
                    </a>
                </li>
            </ul>
        </div>
        <div class="right-nav right">
          <a href="#">
              <img class="right" src="{{ asset('client/images/adver-top.jpg') }}" alt="" srcset="">
          </a>
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
    </nav>

</header>