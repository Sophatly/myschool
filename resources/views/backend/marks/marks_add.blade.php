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
              <h4 class="box-title">Student <strong>Marks Entry</strong></h4>
              </div>
    
              <div class="box-body">
                
                <form action="{{route('marks.entry.store')}}" method="post">
                  @csrf
                  
                  <div class="row">
                  
                    <div class="col-md-2">

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

                    </div>  {{-- End Col-md-3--}}

                    <div class="col-md-2">

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

                    </div>  {{-- End Col-md-3 --}}

                    <div class="col-md-3">

                        <div class="form-group">
                          <h5>Subject</h5>
                          <div class="controls">
                            <select name="assign_subject_id" id="assign_subject_id" class="form-control">
                              <option selected="">Select Subject</option>
                            </select>
                          </div>
                        </div>
  
                      </div>  {{-- End Col-md-3 --}}

                      <div class="col-md-3">

                        <div class="form-group">
                          <h5>Exam Type</h5>
                          <div class="controls">
                            <select name="exam_type_id" id="exam_type_id" class="form-control">
                              <option value="" selected="" disabled>Select Examp Type</option>
                              @foreach($exam_types as $exam)
                                <option value="{{$exam->id}}">{{$exam->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
  
                      </div>  {{-- End Col-md-3 --}}

                      <div class="col-md-2">
                        <div class="col-md-2" style="padding-top:25px;">
                            <div class="form-group">
                              <a id="search" name="search" class="btn btn-primary">Search</a>
                            </div>
                          </div>
                      </div> {{-- End Col-md-3 --}}

                
                  {{-- End Col 12 --}}

                  </div>  {{-- End Row --}}


                  {{-- Marks Entry Table --}}
                  <div class="row d-none" id="marks-entry">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped" style="width:100%">
                            <th>
                                <tr>
                                    <th>ID No</th>
                                    <th>Student Name</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Marks</th>
                                </tr>
                            </th>

                            <tbody id="marks-entry-tr">

                            </tbody>
                        </table>

                        <input type="submit" class="btn btn-rounded btn-primary" value="Submit">
                    </div>
                  </div>
                 
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
      var assign_subject_id = $('#assign_subject_id').val();
      var exam_type_id = $('#exam_type_id').val();

       $.ajax({
        url: "{{ route('student.marks.getstudents')}}",
        type: "GET",
        data: {'year_id':year_id,'class_id':class_id},
        success: function (data) {
          $('#marks-entry').removeClass('d-none');
          var html = '';
          $.each( data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.gender+'</td>'+
            '<td>'+v.student.dob+'</td>'+
            '<td><input type="text" class="form-control form-control-md" name="marks[]"></td>'+
            '</tr>';
          });
          html = $('#marks-entry-tr').html(html);
        }
      });
    });
  
  </script>

{{-- ====================== Get Student Subject ============================ --}}
<script type="text/javascript">
    $(function(){
      $(document).on('change','#class_id',function(){
        var class_id = $('#class_id').val();
        $.ajax({
          url:"{{ route('marks.getsubject') }}",
          type:"GET",
          data:{class_id:class_id},
          success:function(data){
            var html = '<option value="">Select Subject</option>';
            $.each( data, function(key, v) {
              html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
            });
            $('#assign_subject_id').html(html);
          }
        });
      });
    });
  </script>

@endsection