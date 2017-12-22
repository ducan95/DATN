@extends('admin.templates.master')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/base/bower_components/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/base/bower_components/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
<div>
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        発売号新規登録
        <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="row">
              <div class="col-md-9">
                <form role="form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="txtName">発売号の名称を設定してください。</label>
                      <input type="text" class="form-control" id="txtName" placeholder="2016年10月14日号">
                    </div>
                    <div class="form-group">
                        <label for="input-file">発売号の画像を登録してください。</label>
                        <input data-height="130" type="file" id="input-file" class="dropify" />
                    </div>

                    <div class="form-group">
                        <label for="input-file-mobile">モバイル用のヘッダー画像を登録してください。</label>
                        <input data-height="130" type="file" id="input-file-mobile" class="dropify" />
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer text-center" style="padding-bottom: 70px">
                    <button onclick="submitFunction()" type="submit" name="submit" class="btn btn-primary">設定完了</button>
                    <button type="reset" class="btn btn-default">キャンセル</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
    </section>
    <!-- /.content -->
</div>
@endsection  

@section('bottom-js')
<script src="{{ asset('assets/base/bower_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
 <script>
  $(document).ready(function(){
    // Basic
    $('.dropify').dropify({
      messages: {
        default: 'ここに画像をドラッグ',
        //replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
        remove:  '削除',
        error:   'Có lỗi xảy ra, vui lòng thử lại'
      }
    });
  });

//Confirm
function submitFunction () {
  swal({
    title: '登録確認',
    text: "発売号の情報を登録します。よろしいですか?",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '設定完了'
  }).then((result) => {
    if (result.value) {
      swal(
        'Done!',
        'Your file has been insert.',
        'success'
      )
    }
  })
}  
</script>
@endsection 