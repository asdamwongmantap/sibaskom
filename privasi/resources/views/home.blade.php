@include('template/headermeta')

<!-- @section('content') -->
        <!-- page content -->
        <body class="nav-md" progress_bar="true">
  
    <div class="container body">
      <div class="main_container">
      @include('template/menu')
      @include('template/topmenu')
        <div class="right_col" role="main">
           <!--marquee-->
           @include('template/headerinfo')
		  <!-- end marquee-->
		  <!--list userakses-->
			<div class="row">
              @if (auth()->user()->level == '1')
                  <div class="col-md-12 col-sm-4 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Welcome <small>{{auth()->user()->name}}</small></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
            <div class="dashboard-widget-content">
                Welcome  To SIBASKOM Admin Panel</br>

            </div>
            </div>
                  </div>
                </div>
							@else
							<div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
              <div class="tile-stats">
                <div class="icon" style="margin-top: 20px;"><i class="fa fa-certificate"></i>
                </div>
                <div class="count">{{$data_point[0]->poin_amount}}</div>
                <h3>Your Point</h3>
                <!-- <p>Tentang Simulasi Angsuran</p> -->
              </div>
              
              </div>
              @endif
              
			

			<!-- end widget -->
			  		  
            </div>
			<!--end list userakses-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
        </body>
</html>