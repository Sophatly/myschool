@extends('admin.admin_master')
@section('admin')

<script src="{{asset('backend/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">

        <div class="row">

          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
              <h4 class="box-title">Employee <strong>Monthly Salary</strong></h4>
              </div>
    
              <div class="box-body">
                  
                  <div class="row">
                  
                    <div class="col-md-5">

                      <div class="form-group">
                        <h5>Attendance Date</h5>
                        <div class="controls">
                            <input type="date" name="date" id="date" class="form-control">
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


                  {{------------------------------------ Registration Fee Table --------------------------------------------}}

                  <div class="row">
                    <div class="col-md-12">

                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">

                                <table class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            @{{{thsource}}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @{{#each this}}
                                        <tr>
                                            @{{{tdsource}}}
                                        </tr>

                                        @{{/each}}
                                    </tbody>
                                </table>

                            </script>
                          
                        </div>

                    </div>
                  </div>

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
      var date = $('#date').val();
       $.ajax({
        url: "{{ route('employee.monthly.salary.get')}}",
        type: "get",
        data: {'date':date},
        beforeSend: function() {       
        },
        success: function (data) {
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $('#DocumentResults').html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
      });
    });
  
  </script>

@endsection