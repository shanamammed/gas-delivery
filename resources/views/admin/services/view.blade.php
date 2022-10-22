<!DOCTYPE html>
<html>
  <head>
    @include("admin.partials.header")
    @include("admin.partials.table-css")
  </head>
  <body>
    <div id="wrapper">
      @include("admin.partials.sidebar")
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <h4 class="page-title float-left">SERVICES</h4>
                 
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                  <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th width="30%">Service Name</th>
                          <th width="5%">Details</th>
                          <th width="5%">Edit</th>
                          <th width="5%">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($services as $service)
                        <tr>
                          <td>{{ $service->service_name_english }}<br> {{ $service->service_name_arabic }}</td>
                          <td><a href="{{ url('/admin/services/details',$service->id)}}" class="btn btn-alert">View</a></td>
                          <td><a href="{{ url('/admin/services/edit', $service->id) }}" class="btn btn-primary">Edit</a></td>
                          <td><a href="{{ url('/admin/services/delete', $service->id) }}" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      @endforeach 
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        
      </div>
      @include("admin.partials.footer")
    </div>
  </body>
  @include("admin.partials.scripts")
  @include("admin.partials.table-scripts")
  <!-- <script type="text/javascript">
    $('#datatable').DataTable({
           "ordering": false
           });
  </script>  -->
</html>
