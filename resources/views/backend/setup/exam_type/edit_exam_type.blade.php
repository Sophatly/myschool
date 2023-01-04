
@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="box">

            <div class="box-header">
                <a href="{{route('exam.type.view')}}" class="btn btn-rounded btn-success" style="float: right;">Back to View</a>
                <h3>Edit Exam Type</h3>
                
            </div>

            <div class="box-body">

                <form action="{{route('update.exam.type',$editData->id)}}" method="post">
                    @csrf
    
                        <div class="form-group">
                            <div class="form-group">
                                <h5>Exam Type Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" id="name" class="form-control" value="{{$editData->name}}"> 
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                            </div>
                               
                        </div>
    

                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Exam Type">
                </form>
               
            </div>
            
        </div>

      </section>
      <!-- /.content -->
    
    </div>
</div>

@endsection