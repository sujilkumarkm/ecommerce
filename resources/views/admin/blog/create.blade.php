@extends('admin.admin_layouts')


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
          <form method="post" action="{{ route('store.post') }}" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (English)<span class="tx-danger">*</span>
                  <input class="form-control" type="text" name="post_title_en" placeholder="Enter English Post Title">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (Hindi)<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_in" placeholder="Enter Hindi Post Title">
                </div>
            	</div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Blog Category ID<span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($blogcategory as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name_en}}</option>
                    @endforeach
                  </select>
                </div>
            	</div><!-- col-4 -->
               	<div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Product Details English<span class="tx-danger">*</span></label>
                      <textarea id="summernote" class="form-control" name="details_en" required=""></textarea>
                  </div>
              	</div><!-- col-4 -->
              	<div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Product Details Hindi<span class="tx-danger">*</span></label>
                      <textarea id="summernote1" class="form-control" name="details_in" required=""></textarea>
                  </div>
              	</div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Images<span class="tx-danger">*</span></label>
                        <label class="custom-file">
                        <input type="file" id="file" name="post_image" class="custom-file-input" onchange="readURL(this);" required=""><br><br>
                        <img src="#" id="one">

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
