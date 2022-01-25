@extends('admin.admin_layouts')

@section('admin_content')
@php
	$category = DB::table('categories')->get();
	$brand = DB::table('brands')->get();
	$subcategory = DB::table('subcategories')->get();
@endphp

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
        <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product
          <a href="{{ route('all.product')}}" class="btn btn-success btn-sm pull-right">All Products</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Update your new product form</p>
          <form method="post" action="{{ url('update/product/withoutphoto/'.$edit_data->id) }}" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{ $edit_data-> product_name }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{ $edit_data->product_code }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Quantity<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{ $edit_data->product_quantity }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Discount Price<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price" value="{{ $edit_data->discount_price }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" <?php if ($row->id == $edit_data->category_id) echo "selected";?>>{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Subcategory: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Subcategory" name="subcategory_id">
                      <option label="Choose Category"></option>
                    @foreach($subcategory as $sub)
                    <option value="{{ $sub->id }}"  <?php if ($sub->id == $edit_data->subcategory_id) echo "selected";?>>{{ $sub->subcategory_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
                 <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand<span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                    <option label="Choose Brand"></option>
                    @foreach($brand as $br)
                    <option value="{{$br->id}}" <?php if ($br->id == $edit_data->brand_id) echo "selected";?>>{{ $br->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size<span class="tx-danger">*</span></label>
                  <input id="input" name="product_size" type="text" data-role="tagsinput" class="form-control" value="{{ $edit_data->product_size }}" />
                </div>
              </div>
              <div class="col-lg-4">
                    <div class="form-group">


                  <label class="form-control-label">Product Color<span class="tx-danger">*</span></label>
                  <input id="input" name="product_color" type="text" data-role="tagsinput" class="form-control" value="{{ $edit_data->product_color }}" />
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                    <div class="form-group">


                  <label class="form-control-label">Selling Price<span class="tx-danger">*</span></label>
                  <input name="selling_price" type="text" class="form-control" value="{{ $edit_data->selling_price }}" />
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                      <textarea id="summernote" class="form-control" name="product_detail" required="">{{ $edit_data->product_detail }}</textarea>
                  </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                    <div class="form-group">


                  <label class="form-control-label">Video Link<span class="tx-danger">*</span></label>
                  <input id="summernote" class="form-control" name="video_link" value="{{ $edit_data->video_link }}">

                  </div>
                </div>

                
            </div><!-- row -->
          </div><br><br>
            <div class="row">
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="main_slider" value="1" <?php if($edit_data->main_slider == 1 )
                  {
                  	echo "checked"; 
                  } ?> >
                    <span>Main Slider</span>
                  </label>
              </div><!-- col-4 -->

                <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_deal" value="1" <?php if($edit_data->hot_deal == 1 )
                  {
                  	echo "checked"; 
                  } ?> >
                    <span>Hot Deal</span>
                  </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="best_rated" value="1" <?php if($edit_data->best_rated == 1 )
                  {
                  	echo "checked"; 
                  } ?> >
                    <span>Best Rated</span>
                  </label>
              </div><!-- col-4 -->  

               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="trend" value="1" <?php if($edit_data->trend == 1 )
                  {
                  	echo "checked"; 
                  } ?> >
                    <span>Trends Product</span>
                  </label>
              </div><!-- col-4 -->  

               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="mid_slider" value="1" <?php if($edit_data->mid_slider == 1 )
                  {
                  	echo "checked"; 
                  } ?> >
                    <span>Middle Slider</span>
                  </label>
              </div><!-- col-4 --> 
               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_new" value="1" <?php if($edit_data->hot_new == 1 )
                  {
                  	echo "checked"; 
                  } ?> >
                    <span>Hot New</span>
                  </label>
              </div><!-- col-4 --> 
               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="buyone" value="1" <?php if($edit_data->buyone == 1 )
                  {
                    echo "checked"; 
                  } ?> >
                    <span>Buy one Get one</span>
                  </label>
              </div><!-- col-4 --> 
              <br><br>
            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Update</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- row -->













<div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6>Update Images</h6>
          <form method="post" action="{{ url('update/product/withphoto/'.$edit_data->id) }}" enctype="multipart/form-data">
            @csrf

        <div class="row">
     		<div class="col-lg-6 col-sm-6">
                    <label class="form-control-label">Images 1 (Main Thumpnail)<span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                        <input type="file" id="file" name="image_one" class="custom-file-input" onchange="readURL(this);" ><br><br>
                        <input type="hidden" value="{{$edit_data->image_one}}" name="old_one">
                        <img src="#" id="one">

                        <span class="custom-file-control"></span>
                      </label>
                  </div>
         <div class="col-lg-6 col-sm-6">
         	<img src="../../{{$edit_data->image_one}}" style="height:80px; width:80px;">
         </div>
     </div>




           <div class="row">
                 <div class="col-lg-6 col-sm-6">
                    <label class="form-control-label">Images 2 (Main Thumpnail)<span class="tx-danger">*</span></label><br>
                       <label class="custom-file">
                        <input type="file" id="file" name="image_two" class="custom-file-input"  onchange="readURL2(this);"><br><br>
                        <input type="hidden" value="{{$edit_data->image_two}}" name="old_two">
                        <img src="#" id="two">

                        <span class="custom-file-control"></span>
                      </label>  
         		</div>
         		<div class="col-lg-6 col-sm-6">
         				<img src="../../{{$edit_data->image_two}}" style="height:80px; width:80px;">
           		</div>
            </div><!-- col-4 -->
              <div class="row">
     			<div class="col-lg-6 col-sm-6">
                    <label class="form-control-label">Images 3 (Main Thumpnail)<span class="tx-danger">*</span></label><br>
                      <label class="custom-file">
                        <input type="file" id="file" name="image_three" class="custom-file-input"
                         onchange="readURL3(this);"><br><br>
                         <input type="hidden" value="{{$edit_data->image_three}}" name="old_three">
                        <img src="#" id="three">

                        <span class="custom-file-control"></span>
                      </label>
                     </div>

                     <div class="col-lg-6 col-sm-6">
         				<img src="../../{{$edit_data->image_three}}" style="height:80px; width:80px;">
           			</div>
           		</div>
           		<div class="row">
                    <div class="form-layout-footer">
			              <button type="submit" class="btn btn-warning	">Update</button>
            		</div><!-- form-layout-footer -->
	            </div>      	
             <!-- col-4 -->      </form>
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@endsection
    <script>
      $(document).ready(function(){  
  alert($('#input').tagsinput('items'));
});
    </script>
     

<script type="text/javascript">
      $(document).ready(function(){
     $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

 </script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script> 
<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>    

