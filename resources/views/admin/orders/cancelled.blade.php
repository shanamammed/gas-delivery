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
                  <h4 class="page-title float-left">PENDING ORDERS</h4>
                 
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
                          <th width="10%">Order ID</th>
                          <th width="30%">Customer</th>
                          <th width="30%">Service</th>
                          <th width="10%">Total</th>
                          <th width="30%">Booked On</th>
                          <th width="5%">Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                        <tr>
                          <td>ORD-{{ $order->id }}</td>
                          <td>{{ $order->name }}<br> {{ $order->email }}</td>
                          <td>{{ $order->service_name_english }}/{{ $order->service_name_arabic }}<br>{{ $order->service_type }}<br>{{ $order->sub_type_name }}</td>
                          <td> {{ number_format($order->total,2) }} BD</td>
                          <td>{{ date('d Y M, h:i A',strtotime($order->booked_at)); }}</td>
                          <td><a href="{{ url('/admin/orders/details',$order->id)}}" class="btn btn-alert">View</a></td>
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
