@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brands Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand List</h6>
          <div class="table-wrapper">
             <form method="post" action="{{url('update/brand/'.$brand->id)}}" enctype="multipart/form-data">
            @csrf

              <div class="modal-body pd-20">
                  <div class="form-group">

                    <label for="exampleInputEmail1">Brand Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $brand->brand_name }}"aria-describedby="emailHelp" placeholder="Enter Brand Name" name="brand_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Logo</label>
                    <input type="file" selected="{{$brand->brand_logo }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand Logo" name="brand_image">
                  </div>

                 <div class="form-group">

                   <label for="exampleInputEmail1">Existing Logo</label>
                  <img src="../../{{$brand->brand_logo }}" height="70px;" width="80px;">
                  <input type="hidden" value="{{$brand->brand_logo }}" name="old_logo"> 

                </div>
               
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>

             </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->

   
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

 <!-- LARGE MODAL -->


@endsection