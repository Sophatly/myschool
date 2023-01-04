@extends('admin.admin_master')
@section('admin')

<script src="{{asset('backend/jquery.js')}}"></script>

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
              <h4 class="box-title">Student <strong>Roll Generate</strong></h4>
              </div>
    
              <div class="box-body">
                
                <form action="{{route('roll.generate.store')}}" method="post">
                  @csrf
                  
                  <div class="row">
                  
                    <div class="col-md-5">

                      <div class="form-group">
                        <h5>Year</h5>
                        <div class="controls">
                          <select name="year_id" id="year_id" class="form-control">
                            <option value="" selected="" disabled>Select Year</option>
                            @foreach($years as $year)
                              <option value="{{$year->id}}">{{$year->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    </div>  {{-- End Col-md5 --}}

                    <div class="col-md-5">

                      <div class="form-group">
                        <h5>Class</h5>
                        <div class="controls">
                          <select name="class_id" id="class_id" class="form-control">
                            <option value="" selected="" disabled>Select Class</option>
                            @foreach($classes as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    </div>  {{-- End Col-md5 --}}

                    <div class="col-md-2" style="padding-top:25px;">
                      <div class="form-group">
                        <a id="search" name="search" class="btn btn-primary">Search</a>
                      </div>
                    </div>



                  {{-- End Col 12 --}}

                  </div>  {{-- End Row --}}


                  {{-- Roll Generate Table --}}
                  <div class="row d-none" id="roll-generate">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped" style="width:100%">
                            <th>
                                <tr>
                                    <th>ID No</th>
                                    <th>Student Name</th>
                                    <th>Gender</th>
                                    <th>Father Name</th>
                                    <th>Roll</th>
                                </tr>
                            </th>

                            <tbody id="roll-generate-tr">

                            </tbody>
                        </table>
                    </div>
                  </div>

                  <input type="submit" class="btn btn-info" value="Roll Generator">
                 
                </form>
             
              </div>
            </div>
          </div>
            
         
        </div>
        <!-- /.row -->


      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).on('click','#search',function(){
      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
       $.ajax({
        url: "{{ route('student.registration.getstudents')}}",
        type: "GET",
        data: {'year_id':year_id,'class_id':class_id},
        success: function (data) {
          $('#roll-generate').removeClass('d-none');
          var html = '';
          $.each( data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.fname+'</td>'+
            '<td>'+v.student.gender+'</td>'+
            '<td><input type="text" class="form-control form-control-md" name="roll[]" value="'+v.roll+'"></td>'+
            '</tr>';
          });
          html = $('#roll-generate-tr').html(html);
        }
      });
    });
  
  </script>

@endsection