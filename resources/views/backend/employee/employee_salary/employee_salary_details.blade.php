@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          <div class="col-12">

           <div class="box">
              
              <div class="box-header">
                <h3 class="box-title mb-2">Employee Salary Details</h3>
                <h5><strong>Employee Name: {{$details->name}}</strong></h5>
                <h5><strong>Employee ID: {{$details->id_no}}</strong></h5>
              </div>

              <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">No</th>
                              <th>Previous Salary</th>
                              <th>Increment Salary</th>
                              <th>Present Salary</th>
                              <th>Effected Date</th></th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($salary_log as $key=>$log)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$log->previous_salary}}</td>
                            <td>{{$log->increment_salary}}</td>
                            <td>{{$log->present_salary}}</td>
                            <td>{{ date('d-m-Y',strtotime($log->effected_salary)) }}</td>
                            
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