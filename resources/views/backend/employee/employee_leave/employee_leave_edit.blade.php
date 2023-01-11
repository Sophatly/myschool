@extends('admin.admin_master')
@section('admin')

<script src="{{asset('backend/jquery.js')}}"></script>

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <a href="{{route('employee.leave.view')}}" class="btn btn-rounded btn-success" style="float: right;">Back to View</a>
                <h3>Edit Employee Leave</h3>
            </div>

            <div class="box-body">

                <form action="{{route('update.employee.leave',$editData->id)}}" method="post">
                    @csrf

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Employee Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="employee_id" id="name" class="form-control">
                                            <option value="" selected="" disabled>Select Employee Name</option>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}" {{($editData->employee_id == $employee->id)?"selected":""}}>{{$employee->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                            </div> {{-- End Col-md-6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Start Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="start_date" id="startdate" class="form-control" value="{{$editData->start_date}}">
                                    </div>
                                </div>
                            </div>
                        </div> {{-- End 1st Row --}}

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Leave Purpose<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="leave_purpose_id" id="leave_purpose_id" class="form-control">
                                            <option value="" selected="" disabled>Select Leave Purpose</option>
                                            @foreach($leave_purpose as $purpose)
                                                <option value="{{$purpose->id}}" {{($editData->leave_purpose_id == $purpose->id)?"selected":""}}>{{$purpose->name}}</option>
                                            @endforeach
                                            <option value="0">New Purpose</option>
                                        </select>

                                        <input type="text" name="name" id="add_another" class="form-control" placeholder="Write a new purpose" style="display:none;">

                                    </div>
                                </div>
                                       
                            </div> {{-- End Col-md-6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>End Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="end_date" id="enddate" class="form-control" value="{{$editData->end_date}}"> 
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> 
                                </div>
                            </div> {{-- End Col-md-6 --}}

                        </div> {{-- End Row --}}
    
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">

                </form>
               
            </div>
            
        </div>

      </section>
      <!-- /.content -->
    
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('change','#leave_purpose_id',function(){

            var leave_purpose_id = $(this).val();
            if(leave_purpose_id == '0'){
                $('#add_another').show();
            }else{
                $('#add_another').hide();
            }
        });

    });

</script>

@endsection