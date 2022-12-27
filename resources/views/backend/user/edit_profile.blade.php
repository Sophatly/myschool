@extends('admin.admin_master')
@section('admin')

<script src="{{asset('backend/jquery.js')}}"></script>


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <h3>Manage Profile</h3>
            </div>

            <div class="box-body">

                <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" value="{{$editData->name}}" required data-validation-required-message="This field is required"> 
                                </div>
                               
                            </div>
                        </div>

                        <div class="col-6">
    
                            <div class="form-group">
                                <div class="form-group">
                                    <h5>User Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" value="{{$editData->email}}" required data-validation-required-message="This field is required"> 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-6">
    
                            <div class="form-group">
                                <h5>User Mobile</h5>
                                <div class="controls">
                                    <input type="text" name="mobile" id="mobile" class="form-control" value="{{$editData->mobile}}">   
                                </div>
                               
                            </div>
    
                        </div>
    
                        <div class="col-6">
    
                            <div class="form-group">
                                <h5>User Address</h5>
                                <div class="controls">
                                    <input type="text" name="address" class="form-control" value="{{$editData->address}}"> 
                                </div>
                               
                            </div>
    
                        </div>
    
    
                    </div>

                    <div class="row">

                        <div class="col-6">
    
                            <div class="form-group">
                                <div class="form-group">
                                    <h5>User Gender <span class="text-danger">*</span></h5>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" selected="" disabled>Select Gender</option>
                                        <option value="Male" {{($editData->gender=="Male"? "selected": "")}}>Male</option>
                                        <option value="Female" {{($editData->gender=="Female"? "selected": "")}}>Female</option>
                                    </select>
                                </div>
                               
                            </div>

                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <h5>User Image</h5>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="controls">
                                    <img id="showImage" src="{{ (!empty($editData->userimage))? url('upload/user_images/'.$editData->userimage):url('upload/no_image.jpg')}}" style="width:120px;height:120px;border:1px solid #000000;" alt="">
                                </div>
                            </div>
                        </div>
    
    
                    </div>


                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update User">
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