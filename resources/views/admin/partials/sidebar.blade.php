  <div class="topbar">
      <!-- LOGO -->
      <div class="topbar-left">
          <a href="{{ url('/') }}" class="logo">
            <span>

               <img src="{{ asset('/images/logo.png') }}" alt="" height="30" width="110">
            </span>
            <i>
              <img src="{{ asset('/images/logo_sm.png') }}" alt="" height="30">
            </i>
          </a>
      </div>
      <nav class="navbar-custom">
          <ul class="list-unstyled topbar-right-menu float-right mb-0">
           <li class="dropdown notification-list">
              <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                 aria-haspopup="false" aria-expanded="false">
              <span class="ml-1">ADMIN<i class="mdi mdi-chevron-down"></i> </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                 <a href="{{ url('/admin/logout') }}" class="dropdown-item notify-item">
                 <i class="fi-powe"></i> <span>Log Out</span>
                 </a>
              </div>
           </li>
        </ul>

          <ul class="list-inline menu-left mb-0 float-left">
              <li class="float-left">
                  <button class="button-menu-mobile open-left waves-light waves-effect">
                      <i class="dripicons-menu"></i>
                  </button>
              </li>
          </ul>
      </nav>
  </div>
 
  <!-- ========== Left Sidebar Start ========== -->
  <div class="left side-menu">
      <div class="slimscroll-menu" id="remove-scroll">
          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu" id="side-menu">
                  <li class="menu-title">Navigation</li>
                  <li>
                      <a href="{{ url('/admin/dashboard') }}">
                          <i class="fa fa-dashcube"></i><span> Dashboard </span>
                      </a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-shopping-cart"></i> <span> Orders </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level" aria-expanded="false">
                          <li><a href="{{ url('/admin/orders/pending') }}">Pending Orders</a></li>
                          <li><a href="{{ url('/admin/orders/approved') }}">Approved Orders</a></li>
                          <li><a href="{{ url('/admin/orders/completed') }}">Completed Orders</a></li>
                          <li><a href="{{ url('/admin/orders/cancelled') }}">Cancelled Orders</a></li>

                      </ul>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-tag"></i> <span> Services </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level" aria-expanded="false">
                          <li><a href="{{ url('/admin/services') }}">Manage Services</a></li>
                          <li><a href="{{ url('/admin/services/add') }}">Add Service</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>
  <!-- Left Sidebar End -->

  <style>
    .page_hd {    width: 100%;
    text-align: center;
    color: #FFF;
    font-size: 22px;
    text-transform: uppercase;
    line-height: 70px;}

  </style>
