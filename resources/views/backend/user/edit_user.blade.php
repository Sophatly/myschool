@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <h3>Edit User Form</h3>
            </div>

            <div class="box-body">

                <form action="{{route('users.update',$editData->id)}}" method="post">
                    @csrf

                    <div class="row">

                        <div class="col-6">
    
                            <div class="form-group">
                                <h5>User Type <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="usertype" id="" class="form-control">
                                        <option value="" selected="" disabled>Select Role</option>
                                        <option value="Admin" {{ ($editData->usertype ==  "Admin" ? "selected" : "") }}>Admin</option>
                                        <option value="User" {{ ($editData->usertype ==  "User" ? "selected" : "") }}>User</option>
                                    </select>
                                </div>
                               
                            </div>
    
                        </div>
    
                        <div class="col-6">
    
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" value="{{$editData->name}}" required data-validation-required-message="This field is required"> 
                                </div>
                               
                            </div>
    
                        </div>
    
    
                    </div>

                    <div class="row">

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
    
                        <div class="col-6">
    
                           
    
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

@endsection