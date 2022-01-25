@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post Category Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post List
            <a href="{{ route('add.create.post' )}}" class="btn btn-sm btn-warning" style="float: right;">Add New Posts</a></h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">English Title</th>
                  <th class="wd-15p">Hindi Title</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($post as $key=>$row)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$row-> post_title_en}}</td>
                  <td>{{$row-> category_name_en}}</td>
                  <td><img src="../../{{$row-> post_image}}" style="height: 80px; width: 80px"></td>
                  <td><a href="{{ URL::to('edit/post/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ URL::to('delete/post/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

   
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection