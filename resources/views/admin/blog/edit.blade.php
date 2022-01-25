@extends('admin.admin_layouts')

@php

$blog_category = DB::table('post_category')->get();

@endphp

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Post Section</span>
      </nav>
         <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add New Post</h6>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Fill your new post form</p>
          <form method="post" action="{{ url('update/post/'.$data->id) }}" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (English)<span class="tx-danger">*</span>
                  <input class="form-control" type="text" name="post_title_en" value="{{ $data->post_title_en }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (Hindi)<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_in" value="{{ $data->post_title_in }}">
                </div>
            	</div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Blog Category ID<span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($blog_category as $row)
                    <option value="{{ $row->id }}"

                    	<?php 

                    	if($row->id == $data->category_id)
                    	{
                    		echo "selected";
                    	}

                    	?>

                    	>{{ $row->category_name_en}}</option>
                    @endforeach
                  </select>
                </div>
            	</div><!-- col-4 -->
               	<div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Product Details English<span class="tx-danger">*</span></label>
                      <textarea id="summernote" class="form-control" name="details_en" required="">{{ $data->details_en }}</textarea>
                  </div>
              	</div><!-- col-4 -->
              	<div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Product Details Hindi<span class="tx-danger">*</span></label>
                      <textarea id="summernote1" class="form-control" name="details_in" required="">{{ $data->details_in }}</textarea>
                  </div>
              	</div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Images<span class="tx-danger">*</span></label>
                        <label class="custom-file">
                        <input type="file" id="file" name="post_image" class="custom-file-input" onchange="readURL(this);"><br><br>
                        <img src="../../{{ $data->post_image }}" id="one" style="width: 80px; height:80px">
                        <input type="hidden" name="old_image" value="{{ $data->post_image }}">
                        <span class="custom-file-control"></span>
                      </label>
                  </div>

            </div>
        </div>
            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
            </div><!-- form-layout-footer -->
          	</div><!-- form-layout -->
          </form>
      </div>
  </div>
</div>

     
<script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>     
@endsection
