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
                           <h4 class="page-title float-left">Order Details</h4>
						   
						   <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-6 col-md-12">
                  	<div class="ms-panel ms-panel-fh">
                         <div class="ms-panel-body">
		                     <div class="card-box table-responsive">
								     <table class="table ms-profile-information">
				                      <tbody>	
                                    <tr>
                                      <th scope="row">Order ID</th>
                                      <td>ORD-{{ $order->id }}</td>
                                    </tr>	                 
				                        <tr>
				                          <th scope="row">Customer Name</th>
				                          <td>{{ $order->name }} / {{ $order->email }}</td>
				                        </tr>
                                    <tr>
                                      <th scope="row">Total</th>
                                      <td>{{ number_format($order->total,2); }} BD</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Booked On</th>
                                      <td>{{ date('d M Y,h:i A',strtotime($order->booked_at)); }}</td>
                                    </tr>
                                    @if($order->status=='2')
                                     <tr>
                                       <th scope="row">Approved On</th>
                                       <td>{{ date('d M Y,h:i A',strtotime($order->approved_at)); }}</td>
                                     </tr>
                                     <tr>
                                       <th scope="row">Approved By</th>
                                       <td>{{ $order->driver_name }}/ {{ $order->driver_mobile }}</td>
                                     </tr>
                                    @elseif($order->status=='3')
                                    <tr>
                                       <th scope="row">Completed On</th>
                                       <td>{{ date('d M Y,h:i A',strtotime($order->completed_at)); }}</td>
                                     </tr>
                                     <tr>
                                       <th scope="row">Completed By</th>
                                       <td>{{ $order->driver_name }}/ {{ $order->driver_mobile }}</td>
                                     </tr>
                                    @endif  
				                      </tbody>
			                     </table>
		                     </div>
		                   </div>  
                       </div>
                  </div>
				     <div class="col-md-6">
                     <div class="card-box table-responsive">
	                     <div class="ms-profile-skills">
	                      <h5 class="section-title">Service Details</h2>
	                      <ul class="ms-skill-list">
	                        <li><b>{{ $order->service_name_english}} / {{ $order->service_name_arabic }} </b><br>
	                         <i><?=$order->service_type?> </i> <br> 
                            @if($order->sub_type)
                            <i><?=$order->sub_type?> </i>
                            @endif
                         </li>
	                      </ul>
	                     </div>
	                     
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
</html>
