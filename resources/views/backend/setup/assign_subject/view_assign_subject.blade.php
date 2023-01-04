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
                <h3 class="box-title">Assign Subject List</h3>
                <a href="{{route('assign.subject.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Assign Subject</a>
              </div>

              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th>No</th>
                              <th>Class Name</th>
                              <th>Created At</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($allData as $key=>$assign)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$assign['student_class']['name']}}</td>
                            <td>{{$assign->created_at}}</td>
                            <td>
                                <a href="{{route('assign.subject.edit',$assign->class_id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('assign.subject.details',$assign->class_id)}}" class="btn btn-primary">Details</a>
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