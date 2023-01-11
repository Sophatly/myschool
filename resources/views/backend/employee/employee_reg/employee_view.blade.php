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
                <h3 class="box-title">Employee List</h3>
                <a href="{{route('employee.registration.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Employee</a>
              </div>

              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">No</th>
                              <th>ID No</th>
                              <th>Employee Name</th>
                              <th width="5%">Gender</th>
                              <th>Mobile</th>
                              <th>Join Date</th>
                              <th>Salary</th>
                              @if(Auth::user()->role == 'Admin')
                                <th>Code</th>
                            @endif
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($allData as $key=>$employee)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$employee->id_no}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->gender}}</td>
                            <td>{{$employee->mobile}}</td>
                            <td>{{$employee->join_date}}</td>
                            <td>{{$employee->salary}}</td>
                            @if(Auth::user()->role == 'Admin')
                                <td>{{$employee->code}}</td>
                            @endif
                            <td>
                                <a href="{{route('employee.registration.edit',$employee->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('employee.registration.details',$employee->id)}}" class="btn btn-primary">Detail</a>
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