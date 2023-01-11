@extends('admin.admin_master')
@section('admin')

<script src="{{asset('backend/jquery.js')}}"></script>


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <h3>Edit Employee</h3>
            </div>

            <div class="box-body">

                <form action="{{route('update.employee.registration',$editData->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-12">

                            <div class="row"> {{-- 1st Row --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <h5>Employee Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" id="current_password" class="form-control" value="{{$editData->name}}"> 
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
                                                <input type="text" name="fname" id="current_password" class="form-control" value="{{$editData->fname}}"> 
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
                                                <input type="text" name="mname" id="current_password" class="form-control" value="{{$editData->mname}}"> 
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
                                            <input type="text" name="mobile" id="" class="form-control" value="{{$editData->mobile}}">
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
                                            <input type="text" name="address" id="" class="form-control" value="{{$editData->address}}">
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
                                                <option value="Male" {{ ($editData->gender == "Male")?"selected":""}}>Male</option>
                                                <option value="Female" {{ ($editData->gender == "Female")?"selected":""}}>Female</option>
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
                                                <option value="Buddish" {{($editData->religion == "Buddish")?"selected":""}}>Buddish</option>
                                                <option value="Islam" {{($editData->religion == "Islam")?"selected":""}}>Islam</option>
                                                <option value="Christan" {{($editData->religion == "Christan")?"selected":""}}>Christan</option>
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
                                            <input type="date" name="dob" id="" class="form-control" value="{{$editData->dob}}">
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
                                                    <option value="{{$desi->id}}" {{($desi->id == $editData->designation_id)?"selected":""}}>{{$desi->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> {{-- End Col md 4 --}}

                               

                            </div> {{-- End 3rd Row --}}

                            <div class="row"> {{-- 4th Row --}}
                            
                                @if(!isset($editData))
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Salary</h5>
                                            <div class="controls">
                                                <input type="text" name="salary" id="" class="form-control" value="{{$editData->salary}}">
                                            </div>
                                        </div>
                                    </div>  {{-- End Col-md-4 --}}
                                @endif
                                
                                @if(!isset($editData))
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Join Date</h5>
                                            <div class="controls">
                                                <input type="date" name="join_date" id="" class="form-control" value="{{$editData->join_date}}">
                                            </div>
                                        </div>
                                    </div>  {{-- End Col-md-4 --}}
                                @endif
                                
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
                                            <img src="{{(!empty($editData->userimage))?url('upload/employee_images/'.$editData->userimage):url('upload/no_image.jpg')}}" id="showImage" alt="" style="width:120px;">
                                        </div>
                                    </div>
                                </div>
                                    
                                

                            </div> {{-- End 4th Row --}}
                           

                            
                        </div>
                    </div>
    
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