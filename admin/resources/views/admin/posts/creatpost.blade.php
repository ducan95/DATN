@extends('admin.templates.master')
@section('content')
	
	<section class="content-header">
		<h2>Creat New Post</h2>
	</section>
	<section class="content">
		<div class="row">
				<form>
					<div class="col-md-9">
						<div class="form-group">
							<label class="col-sm-2">Date Start Public</label>
							<div class="col-sm-3">
								<input type="date" name="">
							</div>
							<div class="col-sm-2">
								<input type="text" name="">
							</div>
							<label class="col-sm-2" style="margin-left: 50px">Status</label>
							<div class="col-sm-2">
								<select>
									<option>Draff</option>
								</select>
							</div>
						</div>
						<div class="form-group" style="margin-top: 55px">
							<label class="col-sm-2">Date End Public</label>
							<div class="col-sm-3">
								<input type="date" name="">
							</div>
							<div class="col-sm-2">
								<input type="text" name="">
							</div>
							<div class="col-sm-2"></div>
						</div>
						<div class="form-group" style="border: solid 1px;margin-top: 100px">
							<p style="padding-left: 20px">Article Title</p>
						</div>
						<div>
							<textarea class="form-control ckeditor" rows="7" cols="10" id="editor1"></textarea>
						</div>	
					</div>
					<div class="col-md-3">
						<div class="box box-solid">
							<div style="border: solid 1px;">
								<p>Thumbnail</p>
								<label for="input-file">発売号の画像を登録してください。</label>
                <input data-height="130" type="file" id="input-file" class="dropify" />
							</div>
							<div style="border: solid 1px;margin-top: 10px">
								<p>Release Number</p>
								<select  style="width: 150px;margin: 2px 33px 21px">
									<option>No</option>
								</select>
							</div>
							<div style="border: solid 1px;margin-top: 10px">
								<p>Display Top</p>
								<input type="checkbox" name="" style="margin-left:100px">
							</div>
							<div style="border: solid 1px;margin-top: 10px">
								<p>Category</p>
								 <div class="dropdown" style="margin-bottom: 10px;margin-left:30px">
							  	<input type="checkbox" name="">
							    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sport
							    <span class="caret"></span></button>
							    <ul class="dropdown-menu" style="margin-left: 30px">
							      <li><input type="checkbox" name="">Football</li>
							      <li><input type="checkbox" name="">Tennis</li>
							      <li><input type="checkbox" name="">Badminton</li>
							    </ul>
							  </div>
							</div>
							<div style="border: solid 1px;margin-top: 10px">
								<p>Password</p>
								<input type="text" name="" style="margin-bottom: 10px;margin-left:40px">
							</div>
						</div>
					</div>
					<div>
						
					</div>
				</form>
		</div>
	</section>	


@endsection
@section('bottom-js')
<script type="text/javascript" src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/dropify/dist/js/dropify.min.js') }}"></script>

@endsection 
	          	
