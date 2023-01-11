@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <a href="{{route('employee.attendance.view')}}" class="btn btn-rounded btn-success" style="float: right;">Back to View</a>
                <h3>Edit Attendance</h3>
            </div>

            <div class="box-body">

                <form action="{{route('store.employee.attendance')}}" method="post">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Attendance Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="date" id="date" class="form-control" value="{{$editData['0']['date']}}"> 
                                        
                                </div> 
                            </div>
                        </div> {{-- End col-md-6 --}}
                    </div> {{-- End 1st Row --}}

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="width=100%;">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle;">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle;">Employee List</th>
                                        <th colpan="3" class="text-center" style="vertical-align:middle; width:30%">Attendance Status</th>
                                    </tr>

                                    <tr>
                                        <th class="text-center btn present_all" style="display:table-cell; background-color:rgb(1, 146, 156);">Present</th>
                                        <th class="text-center btn leave_all" style="display:table-cell; background-color:rgb(1, 146, 156);">Leave</th>
                                        <th class="text-center btn absent_all" style="display:table-cell; background-color:rgb(1, 146, 156);">Absent</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($editData as $key=>$data)

                                        <tr id="div{{$data->id}}">

                                            <input type="hidden" name="employee_id[]" value="{{$data->employee_id}}">

                                            <td>{{$key+1}}</td>
                                            <td>{{$data['user']['name']}}</td>

                                            <td colspan="3">
                                                <div class="switch-toggle switch-3 switch-candy">
                                                    <input name="attend_status{{$key}}" type="radio" value="Present" id="present{{$key}}" checked="checked" {{($data->attend_status == "Present")?"checked":""}}>
                                                    <label for="present{{$key}}">Present</label>

                                                    <input name="attend_status{{$key}}" type="radio" value="Leave" id="leave{{$key}}" {{($data->attend_status == "Leave")?"checked":""}}>
                                                    <label for="leave{{$key}}">Leave</label>

                                                    <input name="attend_status{{$key}}" type="radio" value="Absent" id="absent{{$key}}" {{($data->attend_status == "Absent")?"checked":""}}>
                                                    <label for="absent{{$key}}">Absent</label>
                                                </div>
                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div> {{-- End Col-md-12 --}}
                    </div> {{-- End 2nd Row --}}
                       
                               
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                </form>
               
            </div>
            
        </div>

      </section>
      <!-- /.content -->
    
    </div>
</div>

@endsection