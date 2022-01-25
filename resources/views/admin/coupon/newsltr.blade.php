@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>News Letter</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Subscriber List
          	<a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">All Delete</a></h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">ID</th>
                  <th class="wd-20p">Email</th>
                  <th class="wd-20p">Subscription Time</th>
                  <th class="wd-20p">Action</th>
                  <th class="wd-5p">Checklist</th>
                </tr>
              </thead>
              <tbody>
                @foreach($newsltr as $key=>$row)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$row-> email}}</td>
                  <td>{{ \Carbon\Carbon::parse($row-> created_at)->diffForHumans()}}</td>
                  <td><a href="{{ URL::to('delete/sub/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></td>
                  <td><input type="checkbox" name=""></td>
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
          <form method="post" action="{{ route('store.newsltr') }}">
            @csrf

              <div class="modal-body pd-20">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subscriber Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email">
                  </div>
               
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Subscribe</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>

             </form>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

@endsection