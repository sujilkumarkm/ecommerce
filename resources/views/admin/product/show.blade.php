@extends('admin.admin_layouts')


@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
         <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">
          <a href="{{ URL::to('edit/product/'.$view_data->id) }}" class="btn btn-warning btn-sm pull-right">Edit</a>
          </h6>
          <h6 class="card-body-title">Product Details 
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Fill   your new product form</p>
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">

                  <label class="form-control-label">Product Name<span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->product_name }}</strong> 
                
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->product_code }}</strong> 
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Quantity<span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->product_quantity }}</strong> 
                </div>
              </div><!-- col-4 -->
              
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Discount Price<span class="tx-danger">*</span></label><br>
                  
                  <strong>AED {{ $view_data->discount_price }}</strong> 
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->category_name }}</strong>
              </div>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Subcategory: <span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->subcategory_name }}</strong>
                </div>
              </div><!-- col-4 -->
                 <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand<span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->brand_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size<span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->product_size }}</strong>
                </div>
              </div>
              <div class="col-lg-4">
                    <div class="form-group">


                  <label class="form-control-label">Product Color<span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->product_color }}</strong>
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                    <div class="form-group">


                  <label class="form-control-label">Selling Price<span class="tx-danger">*</span></label><br>
                  
                  <strong>AED {{ $view_data->selling_price }}</strong>
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Product Details<span class="tx-danger">*</span></label><br>
                  
                  <p>{{!! $view_data->product_detail !!}}</p  >
                  </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                    <div class="form-group">


                  <label class="form-control-label">Video Link<span class="tx-danger">*</span></label><br>
                  
                  <strong>{{ $view_data->video_link }}</strong>

                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Images 1 (Main Thumpnail)<span class="tx-danger">*</span></label>
                        <label class="custom-file">
                        <img src="../../{{$view_data->image_one}}" style="height:80px; width:80px;">
                      </label>
                  </div>
              </div><!-- col-4 -->
                 <div class="col-lg-4">
                  <div id="form-group mg-b-10-force">
                    <label class="form-control-label">Images 2 (Main Thumpnail)<span class="tx-danger">*</span></label>
                       <label class="custom-file">
                        <img src="../../{{$view_data->image_two}}" style="height:80px; width:80px;">
                      </label>
                  </div>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                  <div id="form-group">
                    <label class="form-control-label">Images 3 (Main Thumpnail)<span class="tx-danger">*</span></label>
                     <label class="custom-file">
                        <img src="../../{{$view_data->image_three}}" style="height:80px; width:80px;">
                      </label>
                  
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><br><br>
            <div class="row">
              <div class="col-lg-4">
                <label class="">
                  @if($view_data->main_slider == 1)
                    <span class="badge badge-success">Active</span>

                  @else
                    <span class="badge badge-danger">Inactive</span>

                  @endif
                  <label class=""> : Main Slider</label>
                  </label>
              </div><!-- col-4 -->

                <div class="col-lg-4">
                <label class="">
                  @if($view_data->hot_deal == 1)
                    <span class="badge badge-success">Active</span>

                  @else
                    <span class="badge badge-danger">Inactive</span>

                  @endif
                  <label class=""> : Hot Deal</label>
                  </label>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                <label class="  ">
                  @if($view_data->best_rated == 1)
                    <span class="badge badge-success">Active</span>

                  @else
                    <span class="badge badge-danger">Inactive</span>

                  @endif
                  <label class=""> : Best Rated</label>
                  </label>
              </div><!-- col-4 -->  

               <div class="col-lg-4">
                <label class="">
                  @if($view_data->mid_slider == 1)
                    <span class="badge badge-success">Active</span>

                  @else
                    <span class="badge badge-danger">Inactive</span>

                  @endif
                  <label class=""> : Mid Slider</label>
                  </label>
              </div><!-- col-4 --> 
               <div class="col-lg-4">
                <label class="">
                 @if($view_data->hot_new == 1)
                    <span class="badge badge-success">Active</span>

                  @else
                    <span class="badge badge-danger">Inactive</span>

                  @endif
                  <label class=""> : Hot New</label>
                  </label>
              </div><!-- col-4 --> 
              <div class="col-lg-4">
                <label class="">
                 @if($view_data->buyone == 1)
                    <span class="badge badge-success">Active</span>

                  @else
                    <span class="badge badge-danger">Inactive</span>

                  @endif
                  <label class=""> : Buy one Get one</label>
                  </label>
              </div><!-- col-4 --> 
              <br><br>
            </div><!-- row -->
          </div><!-- form-layout -->
        </div><!-- card -->
         </div>
    </div>  
@endsection
