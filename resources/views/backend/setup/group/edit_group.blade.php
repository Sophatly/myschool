@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <h3>Edit Student Group</h3>
            </div>

            <div class="box-body">

                <form action="{{route('update.student.group',$editData->id)}}" method="post">
                    @csrf
    
                        <div class="form-group">
                            <div class="form-group">
                                <h5>Group Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" id="name" class="form-control" value="{{$editData->name}}"> 
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                            </div>
                               
                        </div>
    

                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Group">
                </form>
               
            </div>
            
        </div>

      </section>
      <!-- /.content -->
    
    </div>
</div>

@endsection