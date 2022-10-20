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
                <!-- Start content -->
                @yield('content')
                
                @include("admin.partials.footer")
            </div>
        </div>
        @include("admin.partials.scripts")
        @include("admin.partials.table-scripts")
    </body>
</html>
