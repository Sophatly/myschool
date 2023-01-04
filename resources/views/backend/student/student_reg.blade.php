@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
              <h4 class="box-title">Student <strong>Search</strong></h4>
              </div>
    
              <div class="box-body">
                
                <form action="{{route('student.year.class.wise')}}" method="GET">

                  <div class="row">
                  
                    <div class="col-md-5">

                      <div class="form-group">
                        <h5>Year</h5>
                        <div class="controls">
                          <select name="year_id" id="" class="form-control">
                            <option value="" selected="" disabled>Select Year</option>
                            @foreach($years as $year)
                              <option value="{{$year->id}}" {{ (@$year_id == $year->id)?"selected":""}}>{{$year->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    </div>  {{-- End Col-md5 --}}

                    <div class="col-md-5">

                      <div class="form-group">
                        <h5>Class</h5>
                        <div class="controls">
                          <select name="class_id" id="" class="form-control">
                            <option value="" selected="" disabled>Select Class</option>
                            @foreach($classes as $class)
                              <option value="{{$class->id}}" {{ (@$class_id == $class->id)?"selected":""}}>{{$class->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    </div>  {{-- End Col-md5 --}}

                    <div class="col-md-2">
                      <div class="form-group">
                        <input type="submit" value="Search" name="search" class="btn btn-rounded btn-dark form-control" style="margin-top:28px;">
                      </div>
                    </div>



                  {{-- End Col 12 --}}

                  </div>  {{-- End Row --}}
                 
                </form>
             
              </div>
            </div>
          </div>
            
            
          <div class="col-12">

           <div class="box">
              
              <div class="card-header">
                <h3 class="box-title">Student List</h3>
                <a href="{{route('student.registration.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
              </div>

              <div class="box-body">
                  <div class="table-responsive">

                  @if(isset($search))

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">No</th>
                              <th>ID No</th>
                              <th>Roll</th>
                              <th>Name</th>
                              <th>Year</th>
                              <th>Class</th>
                              <th>Image</th>
                              @if(Auth::user()->role== "Admin")
                                <th>Code</th>
                              @endif
                              <th width="15%">Action</th>
                          </tr>
                      </thead>

                      <tbody>

                        @foreach($allData as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value['student']['id_no']}}</td>
                            <td>{{$value->roll}}</td>
                            <td>{{$value['student']['name']}}</td>
                            
                            <td>{{$value['student_year']['name']}}</td>
                            <td>{{$value['student_class']['name']}}</td>
                            <td>
                              <img src="{{(!empty($value['student']['userimage']))?url('upload/student_images/'.$value['student']['userimage']):url('upload/no_image.jpg')}}" style="width:100px;border:1px solid" alt="">
                            </td>
                            <td>{{$value['student']['code']}}</td>
                            <td>
                                <a href="{{route('student.registration.edit',$value->student_id)}}" class="btn btn-info btn-md"><i data-feather="edit"></a>
                                <a href="{{route('student.registration.promotion',$value->student_id)}}" class="btn btn-success btn-md"><i data-feather="check-square"></i></a>
                                <a target="_blank" href="{{route('student.reg.detail',$value->student_id)}}" class="btn btn-danger btn-md"><i data-feather="eye"></i></a>
                            </td>
                        </tr>
                        
                        @endforeach
                          
                          
                      </tbody>
                    
                    </table>

                @else

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>ID No</th>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Class</th>
                            <th>Image</th>
                            @if(Auth::user()->role== "Admin")
                              <th>Code</th>
                            @endif
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                      @foreach($allData as $key=>$value)
                      <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$value['student']['id_no']}}</td>
                          <td>{{$value->roll}}</td>
                          <td>{{$value['student']['name']}}</td>
                          
                          <td>{{$value['student_year']['name']}}</td>
                          <td>{{$value['student_class']['name']}}</td>
                          <td>
                            <img src="{{(!empty($value['student']['userimage']))?url('upload/student_images/'.$value['student']['userimage']):url('upload/no_image.jpg')}}" style="width:100px;border:1px solid" alt="">
                          </td>
                          <td>{{$value['student']['code']}}</td>
                          <td>
                              <a href="{{route('student.registration.edit',$value->student_id)}}" class="btn btn-info btn-md"> <i data-feather="edit"></i></a>
                              <a href="{{route('student.registration.promotion',$value->student_id)}}" class="btn btn-success btn-md"><i data-feather="check-square"></i></a>
                              <a target="_blank" href="{{route('student.reg.detail',$value->student_id)}}" class="btn btn-danger btn-md"><i data-feather="eye"></i></a>
                          </td>
                      </tr>
                      
                      @endforeach
                        
                        
                    </tbody>
                  
                  </table>

                @endif

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