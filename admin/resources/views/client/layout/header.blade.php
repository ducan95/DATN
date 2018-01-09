<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="_container">
      <div class="navbar-header">
        <a href="https://friday.kodansha.ne.jp/sn/u" class="navbar-brand">
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
              <a href="https://friday.kodansha.ne.jp/s/login?data=book-list"><img src="{{ asset('client/media/icon/pc_1026ol_03.jpg') }}""/></a>
            </li>
            <!-- END IMAGE LOGIN -LOGOUT -->
            <!-- IMAGE REGISTER -->
            <!-- with frefix is s -->
            <!-- type With frefix sy or sn || fy or fn-->
            <li class="pc-element btn-register">
              <a href="https://friday.kodansha.ne.jp/s/register?data=book-list"><img src="{{ asset('client/media/icon/pc_1026ol_10.jpg') }}""/></a>
            </li>
            <li class="mobile-element">
              <a href="https://friday.kodansha.ne.jp/s/register?data=book-list"><i class="fa fa-envelope-o"></i> 会員登録</a>
            </li>
            <li class="mobile-element">
              <a href="https://friday.kodansha.ne.jp/s/login?data=book-list"><i class="fa fa-key"></i> ログイン</a>
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
            <li>
              <a href="sport.html"><span><b>スポーツ</b></span></a>
            </li>
            <li>
              <a href="event.html"><span><b>事件</b></span></a>
            </li>
            <li>
              <a href="column.html"><span><b>コラム</b></span></a>
              <i class="mobile-element pull-right fa fa-chevron-right" data-toggle="collapse" data-target="#child-categories-16"></i>
              <ul class="collapse mobile-element" id="child-categories-16">
                <li><a href="harikomi.html"><span>ハリコミデスクO</span></a></li>
                <li><a href="urafriday.html"><span>FRIDAY トピックス</span></a></li>
                <li><a href="sports_drama.html"><span>スポーツは人間ドラマだ</span></a></li>
                <li><a href="baseball_now.html"><span>BASEBALL NOW 仁志敏久「プロだからズバリ書く」</span></a></li>
                <li><a href="playback.html"><span>プレイバックFRIDAY</span></a></li>
                <li><a href="gekiuma.html"><span>激うま!お取り寄せグルメ</span></a></li>
                <li><a href="world_soccer.html"><span>風間八宏「世界レベルのサッカーをやろう！」</span></a></li>
              </ul>
            </li>
            <li>
              <a href="entertainment.html"><span><b>芸能</b></span></a>
            </li>
            <li>
              <a href="gravure.html"><span><b>グラビア</b></span></a>
            </li>
            <li>
              <a href="free.html"><span><b>無料で読める</b></span></a>
            </li>
            <li>
              <a href="1000-course.html"><span><b>1000円コース専用</b></span></a>
            </li>
            <li>
              <a href="book-list.html"><span><b>発売号別一覧</b></span></a>
            </li>
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
          <ul class="nav navbar-nav">
            <li class=""><a href="https://friday.kodansha.ne.jp/sn/u"><span><b>新着</b></span></a></li>
            <li class=""><a href="entertainment.html"><span>芸能</span></a></li>
            <li class=""><a href="event.html"><span>事件</span></a></li>
            <li class=""><a href="sport.html"><span>スポーツ</span></a></li>
            <li class=""><a href="column.html"><span>コラム</span></a></li>
            <li class=""><a href="gravure-top.html"><span>グラビア</span></a></li>
            <li class=""><a href="proposal.html"><span>オススメ</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>