@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <a href="{{route('employee.salary.view')}}" class="btn btn-rounded btn-success" style="float: right;">Back to View</a>
                <h3>Employee Salary Increment</h3>
            </div>

            <div class="box-body">

                <form action="{{route('update.increment.store',$editData->id)}}" method="post">
                    @csrf

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Salary Amount <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="increment_salary" id="salaryamount" class="form-control"> 
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> 
                                </div>
                                       
                            </div> {{-- End Col-md-6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Effected Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="effecteddate" id="salaryamount" class="form-control"> 
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> 
                                </div>
                            </div> {{-- End Col-md-6 --}}

                        </div> {{-- End Row --}}
    
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Submit">

                </form>
               
            </div>
            
        </div>

      </section>
      <!-- /.content -->
    
    </div>
</div>

@endsection