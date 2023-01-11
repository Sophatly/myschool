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
                <h3 class="box-title">Employee Salary List</h3>
                <a href="{{route('employee.registration.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Employee Salary</a>
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
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($allData as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->id_no}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->gender}}</td>
                            <td>{{$value->mobile}}</td>
                            <td>{{ date('d-m-Y',strtotime($value->join_date)) }}</td>
                            <td>{{$value->salary}}</td>
                            <td>
                                <a title="Increment" href="{{route('employee.salary.increment',$value->id)}}" class="btn btn-info"><i class="fa fa-plus-circle"></i></a>
                                <a title="Details" href="{{route('employee.salary.details',$value->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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