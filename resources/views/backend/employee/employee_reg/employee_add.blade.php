@extends('admin.admin_master')
@section('admin')

<script src="{{asset('backend/jquery.js')}}"></script>


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <h3>Add Employee</h3>
            </div>

            <div class="box-body">

                <form action="{{route('store.employee.registration')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-12">

                            <div class="row"> {{-- 1st Row --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <h5>Employee Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" id="current_password" class="form-control"> 
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div> 
                                        </div> 
                                    </div>
                                </div> {{-- End Col md 4 --}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <h5>Father's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="fname" id="current_password" class="form-control"> 
                                                @error('fname')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div> 
                                        </div> 
                                    </div>
                                </div> {{-- End Col md 4 --}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <h5>Mother's Name </h5>
                                            <div class="controls">
                                                <input type="text" name="mname" id="current_password" class="form-control"> 
                                                @error('mname')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div> 
                                        </div> 
                                    </div>
                                </div> {{-- End Col md 4 --}}

                            </div>  {{-- End 1st Row --}}

                          
                            <div class="row"> {{-- 2nd Row --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mobile Number</h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" id="" class="form-control">
                                            @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> {{-- End Col md 4 --}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address</h5>
                                        <div class="controls">
                                            <input type="text" name="address" id="" class="form-control">
                                            @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> {{-- End Col md 4 --}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender</h5>
                                        <div class="controls">
                                            <select name="gender" id="" class="form-control">
                                                <option value="" selected="" disabled>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> {{-- End Col md 4 --}}

                            </div> {{-- End 2nd Row --}}

                           
                              {{-- Third Row --}}
                            <div class="row"> {{-- 3rd Row --}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Religion</h5>
                                        <div class="controls">
                                            <select name="religion" id="" class="form-control">
                                                <option value="" selected="" disabled>Select Religion</option>
                                                <option value="Buddish">Buddish</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Christan">Christan</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> {{-- End Col md 4 --}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Date of Birth</h5>
                                        <div class="controls">
                                            <input type="date" name="dob" id="" class="form-control">
                                            @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> {{-- End Col md 4 --}}

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Designation</h5>
                                        <div class="controls">
                                            <select name="designation_id" id="" class="form-control">
                                                <option value="" selected="" disabled>Select Designation</option>
                                                @foreach($designation as $desi)
                                                    <option value="{{$desi->id}}">{{$desi->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> {{-- End Col md 4 --}}

                               

                            </div> {{-- End 3rd Row --}}

                            <div class="row"> {{-- 4th Row --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Salary</h5>
                                        <div class="controls">
                                            <input type="text" name="salary" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>  {{-- End Col-md-4 --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Join Date</h5>
                                        <div class="controls">
                                            <input type="date" name="join_date" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>  {{-- End Col-md-4 --}}

                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Image</h5>
                                        <div class="controls">
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>
                                </div> {{-- End col-md-4 --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img src="{{url('upload/no_image.jpg')}}" id="showImage" alt="" style="width:120px;">
                                        </div>
                                    </div>
                                </div>
                                    
                                

                            </div> {{-- End 4th Row --}}
                           

                            
                        </div>
                    </div>
    
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Submit">
                </form>
               
            </div>
            
        </div>

      </section>
      <!-- /.content -->
    
    </div>
</div>

<script>
    $(document).ready(function(){

        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    })
</script>

@endsection