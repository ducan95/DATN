@extends('client.layout.master')

@section('title')
{{ trans('web.webClient.title.release') }}
@endsection 

@section('content')
        <div class="box top-buffer box-user-sidebar content-list">
          <div class="box-header with-border">発売号別の記事一覧</div>
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
                    @foreach($oItemsLoad as $oItem)
                      <?php
                        $picture = $oItem->image_release_path;
                        $picUrl = asset('storage/imageDefault/'.$picture);
                        $id_release_number = $oItem->id_release_number;
                        $url = route('WebClientReleasePostOfRelease',['id'=>$id_release_number]);
                        $date = strtotime($oItem->created_at);
                        $dateFormat = date('j-M-y',$date);
                      ?>
                      <div class="col-md-4 col-sm-4 col-lg-4 col-xs-6">
                        <div class="custom-list-item">
                          <a href="{{ $url }}" class="link-gray">
                            <div class="custom-list-item-thumbnail large" style="background-image: url('{{ $picUrl }}'); height: 261.842px;">
                              <img src="https://s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/27/cover2017-12-27-3_s.jpg" class="hidden">
                            </div>
                            <span class="text-limit">{{ $dateFormat }}</span>
                          </a>
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
              
                <div class="loaibo col-md-12 col-sm-12 col-lg-12 col-xs-12">
                  <a class="btn-loadmore" href="javascript:void(0)" onclick="loadmoreRelease({{ $current_page }})"><i class="fa fa-plus"></i>もっと見る</a>
                  @section('usersite-bottom-js')
                  <script type="text/javascript">
                    function loadmoreRelease(current_page) {
                      var a = '.loadmore-'+current_page;
                    $.ajax({
                      url: "{{route('WebClientEndUserLoadmoreRelease')}}", 
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
              </div>
            </div>
        </div>

@endsection

@section('nav-bar')
  @include('client.layout.nav-bar')
@endsection


   
