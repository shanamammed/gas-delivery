@extends("admin.layouts.master")

@section("content")    
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Dashboard</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Hungerline</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-shopping-cart float-right"></i>
                            <!-- <h6 class="text-muted text-uppercase mb-3"> Orders<br> (<?php echo date('M Y'); ?> )</h6>
                             <h4 class="mb-3" data-plugin="counterup"></h4> --> 
                        </div>
                    </a>
                </div>
                
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-shopping-cart float-right"></i>
                           <!--  <h6 class="text-muted text-uppercase mb-3"> Today's Orders<br> (<?php echo date('d M Y'); ?> )</h6>
                             <h4 class="mb-3" data-plugin="counterup"></h4>  -->
                        </div>
                    </a>
                </div>
                
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-shopping-cart float-right"></i>
                           <!--  <h6 class="text-muted text-uppercase mb-3"> Cancelled Orders Todat<br> (<?php echo date('d M Y'); ?> )</h6>
                             <h4 class="mb-3" data-plugin="counterup"></h4>  -->
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-coffee float-right"></i>
                            <h6 class="text-muted text-uppercase mb-3">Active Restaurants</h6>
                            <!-- <h4 class="mb-3" data-plugin="counterup"></h4> -->
                        </div>
                    </a>    
                </div>

              

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-users float-right"></i>
                            <h6 class="text-muted text-uppercase mb-3">Total Customers</h6>
                            <!-- <h4 class="mb-3" data-plugin="counterup"></h4> -->
                        </div>
                    </a>    
                </div>
            </div>
            <!-- end row -->
            <div class="row">
        

                <div class="col-lg-4">
                    <div class="card-box">
                        <h4 class="header-title mb-4">New Restaurants</h4>
                        <div class="inbox-widget slimscroll" style="max-height: 670px;">
                        
                        </div>
                    </div>
                </div>

                
                <div class="col-lg-4">
                    <div class="card-box">
                        <h4 class="header-title mb-4">New Orders</h4>
                        <div class="inbox-widget slimscroll" style="max-height: 670px;">
                          
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-box">
                        <h4 class="header-title mb-4">New Customers</h4>
                        <div class="inbox-widget slimscroll" style="max-height: 670px;">
                          
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- container -->
    </div> <!-- content -->
@endsection    