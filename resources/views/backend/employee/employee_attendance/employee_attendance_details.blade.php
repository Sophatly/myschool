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
                <h3 class="box-title">Employee Attendance Details</h3>
                <a href="{{route('employee.attendance.view')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Back to View</a>
              </div>

              <div class="box-body">
                  <div class="table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>ID No</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Attend Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>
  
                          @foreach($details as $key=>$attendance)
                          <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$attendance['user']['id_no']}}</td>
                              <td>{{$attendance['user']['name']}}</td>
                              <td>{{date('d-m-Y',strtotime($attendance->date))}}</td>
                              <td>{{$attendance->attend_status}}</td>
                             
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