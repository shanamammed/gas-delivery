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
                           <h4 class="page-title float-left">Service Details</h4>
						   
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
				                          <th scope="row">Service Name</th>
				                          <td>{{ $service->service_name_english }} / {{ $service->service_name_arabic }}</td>
				                        </tr>
				                      </tbody>
			                     </table>
		                     </div>
		                   </div>  
                       </div>
                  </div>
				     <div class="col-md-6">
                     <div class="card-box table-responsive">
	                     <div class="ms-profile-skills">
	                      <h5 class="section-title">Service Types</h2>
	                      <ul class="ms-skill-list">
	                       @foreach($service_types as $type) 
	                        <li><b>{{ $type->service_type_english}} / {{ $type->service_type_arabic }} 
                           @if(!$type->has_sub_type) - {{ $type->price }} @endif</b></li>
	                        @foreach($type->sub_types as $sub)
	                         <i><?=$sub->sub_type_name?> - BHD <?=number_format($sub->price,3)?> </i> <br> 
                            @endforeach
	                       @endforeach
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
