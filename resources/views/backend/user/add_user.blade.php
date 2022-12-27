@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <h3>Add User Form</h3>
            </div>

            <div class="box-body">

                <form action="{{route('users.store')}}" method="post">
                    @csrf

                    <div class="row">

                        <div class="col-6">
    
                            <div class="form-group">
                                <h5>User Type <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="usertype" id="" class="form-control">
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                               
                            </div>
    
                        </div>
    
                        <div class="col-6">
    
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required"> 
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
                                        <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                   
                                </div>
                               
                            </div>
    
                        </div>
    
                        <div class="col-6">
    
                            <div class="form-group">
                                <h5>User Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> 
                                </div>
                               
                            </div>
    
                        </div>
    
    
                    </div>


                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add User">
                </form>
               
            </div>
            
        </div>

      </section>
      <!-- /.content -->
    
    </div>
</div>

@endsection