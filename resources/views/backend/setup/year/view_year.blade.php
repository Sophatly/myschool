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
                <h3 class="box-title">Year List</h3>
                <a href="{{route('student.year.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Year</a>
              </div>

              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Year</th>
                              <th>Created At</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($allData as $key=>$year)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$year->name}}</td>
                            <td>{{$year->created_at}}</td>
                            <td>
                                <a href="{{route('student.year.edit',$year->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('student.year.delete',$year->id)}}" class="btn btn-danger" id="delete">Delete</a>
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