@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <h3>Change Password</h3>
            </div>

            <div class="box-body">

                <form action="{{route('password.update')}}" method="post">
                    @csrf
    
                        <div class="form-group">
                            <div class="form-group">
                                <h5>Current Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="oldpassword" id="current_password" class="form-control"> 
                                    @error('oldpassword')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                            </div>
                               
                        </div>
    
    
                        <div class="form-group">
                            <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                        </div>

                        <div class="form-group">
                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"> 
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                               
                        </div>
    

                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Change Password">
                </form>
               
            </div>
            
        </div>

      </section>
      <!-- /.content -->
    
    </div>
</div>

@endsection