@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Blog Category Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category Edit</h6>
          <div class="table-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              @foreach($editblogcat as $row)
          <form method="post" action="{{ url('admin/update/blogcat/'.$row->id) }}">
            @csrf
              <div class="modal-body pd-20">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" name="category_name_en" value="{{ $row->category_name_en }}">
                  </div>
              </div><!-- modal-body -->
              <div class="modal-body pd-20">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name Hindi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" name="category_name_in" value="{{ $row->category_name_in }}">
                  </div>
              </div><!-- modal-body -->
               @endforeach 
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
             </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->

   
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


@endsection