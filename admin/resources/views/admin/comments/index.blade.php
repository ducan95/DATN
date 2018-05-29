@extends('admin.templates.master')

@section('title')
{{ "Quản lí comment"}}
@endsection 

@section('content')
<div ng-controller="CommentCtrl">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản Lí Comment
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row" style="margin-bottom: 15px;margin-top:15px;">
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="comment-table">
                <tr>
                  <th>#</th>
                  <th>Tên Hội Viên</th>
                  <th>Nội Dung</th>
                  <th>Tên Bài Viết</th>
                  <th>Xóa</th>
                </tr>
                <tr ng-repeat="comment in comments | orderBy : 'id_comment'">
                  <td ng-bind="$index+1"></td>
                  <td ng-bind="comment.email"></td>
                  <td ng-bind="comment.comment_content"></td>
                  <td ng-bind="comment.title"></td>
                  <td>
                   <a href="javascript:void(0)" class="btn btn-sm btn-danger" ng-click="deleteComment(comment.id_comment, $index)"><i class="fa fa-trash-o"></i> @lang('web.delete')</a>
                  <td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

    <section class="invoice pg-section">
      <div class="row text-center" ng-if="lastPage > 1">
        <ul class="pagination no-margin text-center">
          <li ng-click="pageChanged()" ng-if="currentPage == 1" class="disabled">
            <a href="javascript:void(0)">«</a>
          </li>
          <li ng-click="pageChanged()" ng-if="currentPage != 1">
            <a href="javascript:void(0)" ng-click=getComment(prePage)>«</a>
          </li>
          <li ng-click="pageChanged()" ng-repeat="i in totalPages" ng-class="{ active: currentPage == i }">
            <a href="javascript:void(0)" ng-bind="i" ng-click=getComment(i)></a>
          </li>
          <li ng-click="pageChanged()" ng-show="currentPage != lastPage" >
            <a href="javascript:void(0)" ng-click=getComment(nextPage)>»</a>
          </li>
          <li ng-click="pageChanged()" ng-if="currentPage == lastPage" class="disabled">
            <a href="javascript:void(0)">»</a>
          </li>
        </ul>
      </div>
    </section>
    <!-- /.content -->
</div>
@endsection  

@section('bottom-js')
<!-- Edit table -->
{{--  <script src="{{ asset('assets/theme/js/jquery.tabledit.min.js') }}"></script>
<script src="{{ asset('assets/theme/js/edit-table.js') }}"></script>  --}}
<script src="{{ asset('assets/frontend/page/comment/CommentCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CommentResource.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/paging.js') }}"></script>
@endsection 