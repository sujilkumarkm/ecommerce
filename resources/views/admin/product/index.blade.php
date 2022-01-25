@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List
          	<a href="{{ route('add.product')}}" class="btn btn-sm btn-warning" style="float: right;"  data-target="#modaldemo3">Add New</a></h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">Product Code</th>
                  <th class="wd-10p">Product Name</th>
                  <th class="wd-10p">Image</th>
                  <th class="wd-10p">Category</th>
                  <th class="wd-10p">Brand</th>
                  <th class="wd-10p">Quantity</th>      
                  <th class="wd-10p">Status</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pro_data as $row)
                <tr>
                  <td>{{$row->product_code}}</td>
                  <td>{{$row->product_name}}</td>                  
                  <td><img src="../../{{$row->image_one}}" height="50px;" width="50px;"></td>
                  <td>{{$row->category_name}}</td>    
                  <td>{{$row->brand_name}}</td>    
                  <td>{{$row->product_quantity}}</td>    
                  <td>
                  	@if($row->status == 1)

                  		<span class="badge badge-success">Active</span>

                  	@else
                  		<span class="badge badge-danger">Inctive</span>

                  	@endif


                  </td>     
	                  <td>
	                  	<a href="{{ URL::to('edit/product/'.$row->id) }}" class="btn btn-sm btn-info"  title="edit"><i class="fa fa-edit"></i></a>
	                    <a href="{{ URL::to('delete/product/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
	                    <a href="{{ URL::to('view/product/'.$row->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-eye"></i></a>

	                    @if($row->status == 1)
	                    	 <a href="{{ URL::to('inactive/product/'.$row->id) }}" class="btn btn-sm btn-info" title="Inctive"><i class="fa fa-thumbs-down"></i></a>
	                    @else
	                    	 <a href="{{ URL::to('active/product/'.$row->id) }}" class="btn btn-sm btn-danger" title="Active"><i class="fa fa-thumbs-up"></i></a>
	                    @endif

	                   
	                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

   
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

 <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
          <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
            @csrf

              <div class="modal-body pd-20">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name" name="brand_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Logo</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand Logo" name="brand_image">
                  </div>
               
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Add</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>

             </form>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

@endsection