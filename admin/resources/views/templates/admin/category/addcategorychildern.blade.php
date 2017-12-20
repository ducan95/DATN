@extends('templates.master')
@section('content')

<div>
	<section class="content-header">
		<h2>List Category</h2>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
						<form class="form-horizontal">
						 <div class="box-body">
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Category Name</label>
	                  <div class="col-sm-9">
	                    <input class="form-control" id="" placeholder="" type="text">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Name Alphabet For Address</label>
	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                </div>
	                <div class="form-group">
	                	<label class="col-sm-3 control-label">Display Global Navi</label>
	                	<div class="col-sm-9">
	                		<input type="checkbox" checked data-toggle="toggle">
	                	</div>
	                </div>
	                <div class="form-group">
	                	<label class="col-sm-3 control-label">Display Menu Bar</label>
	                	<div class="col-sm-9">
	                		<input type="checkbox" checked data-toggle="toggle">
	                	</div>
	                </div>
	                <div class="form-group">
	                	<label class="col-sm-3 control-label">Parent Name</label>
	                	<div class="col-sm-9">
	                		<select  class="form-control">
	                			<option>ADM</option>
	                			<option>Pop</option>
	                		</select>
	                	</div>
	                </div>

	                <div class="row" style="padding-bottom: 20px">
		              	<div class="col-md-4"></div>
				            <div class="col-md-4 text-center">
		                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
							  Add
							</button>

							<div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title">Register parent category children?</h4>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
							        <button type="submit" class="btn btn-primary">Yes</button>
							      </div>
							    </div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
		                    <a href="/admincp/category/"><button type="button" class="btn btn-primary" style="margin-left:5px;">Cancel</button></a>
				              </div>
		              	<div class="col-md-4"></div>
	              	</div>
	              <!-- /.box-footer -->
	              </div>
	              <!-- /.box-body -->
            </form>
				</div>
			</div>
		</div>
	</section>
</div>	

@endsection  
@section('bottom-js')
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>

@endsection 

	              
		
			

                


