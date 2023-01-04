@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          <div class="col-12">

           <div class="box">
              
              <div class="card-header">
                <h3 class="box-title">Designation List</h3>
                <a href="{{route('designation.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Designation</a>
              </div>

              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Designation Name</th>
                              <th>Created At</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($allData as $key=>$designation)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$designation->name}}</td>
                            <td>{{$designation->created_at}}</td>
                            <td>
                                <a href="{{route('designation.edit',$designation->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('designation.delete',$designation->id)}}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        
                        @endforeach
                          
                          
                      </tbody>
                    
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->


@endsection