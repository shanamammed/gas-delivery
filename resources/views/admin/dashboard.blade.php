@extends("admin.layouts.master")

@section("content")    
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Dashboard</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Gas Delivery</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-shopping-cart float-right"></i>
                            <h6 class="text-muted text-uppercase mb-3"> Today's Orders<br> (<?php echo date('d M Y'); ?> )</h6>
                             <h4 class="mb-3" data-plugin="counterup">{{ $orders_today }}</h4> 
                        </div>
                    </a>
                </div>
                
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-shopping-cart float-right"></i>
                            <h6 class="text-muted text-uppercase mb-3"> Weekly Orders<br> (<?=date('w')?>)</h6>
                             <h4 class="mb-3" data-plugin="counterup">{{ $orders_weekly }}</h4> 
                        </div>
                    </a>
                </div>
                
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-shopping-cart float-right"></i>
                            <h6 class="text-muted text-uppercase mb-3"> Monthly Orders<br> (<?php echo date('M Y'); ?> )</h6>
                             <h4 class="mb-3" data-plugin="counterup">{{ $orders_monthly }}</h4> 
                        </div>
                    </a>
                </div>
                
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-user float-right"></i>
                            <h6 class="text-muted text-uppercase mb-3">Users</h6>
                            <h4 class="mb-3" data-plugin="counterup">{{ $users }}</h4>
                        </div>
                    </a>    
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-flag float-right"></i>
                            <h6 class="text-muted text-uppercase mb-3">Services</h6>
                            <h4 class="mb-3" data-plugin="counterup">{{ $services }}</h4>
                        </div>
                    </a>    
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card-box tilebox-one">
                            <i class="fa fa-users float-right"></i>
                            <h6 class="text-muted text-uppercase mb-3">Drivers</h6>
                            <h4 class="mb-3" data-plugin="counterup">{{ $drivers }}</h4>
                        </div>
                    </a>    
                </div>
            </div>
            <!-- end row -->
            <div class="row">
        
         

             
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
@endsection    