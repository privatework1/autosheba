<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/dashboard') }}" aria-expanded="false"><i class="fa fa-cab"></i><span class="hide-menu">Dashboard</span></a></li>

      <?php
          $vendorInfo=DB::table('vendors')->where('id',Session::get('vendorId'))->first();
        ?>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/dashboard') }}" aria-expanded="false"><i class="fa fa-cab"></i><span class="hide-menu">
       @if(!empty($vendorInfo))
        <img src="{{asset('uploads/Vendor/'.$vendorInfo->vendor_logo)}}" alt="" style="width:40px;height: 40px;border-radius: 50%;">

        @endif
        </span></a></li>
         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-th"></i><span class="hide-menu">Menu/Categories</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('vendor-site-categories.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Categories </span></a></li>
            <li class="sidebar-item"><a href="{{ route('vendor-site-categories.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> View Categories </span></a></li>
          </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-th"></i><span class="hide-menu">Sub-Menu/Sub-Categories</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('vendor-site-subcategories.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Add Sub-Categories</span></a></li>
            <li class="sidebar-item"><a href="{{ route('vendor-site-subcategories.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">View Sub-Categories</span></a></li>
          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-brain"></i><span class="hide-menu">Brand </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('vendor-site-brands.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Brand </span></a></li>
            <li class="sidebar-item"><a href="{{ route('vendor-site-brands.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> View Brand </span></a></li>
          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-compass"></i><span class="hide-menu">Item </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('vendor-site-items.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Item </span></a></li>
            <li class="sidebar-item"><a href="{{ route('vendor-site-items.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> View Item </span></a></li>
          </ul>
        </li>


        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span class="hide-menu">Order </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ url('/vendororderlist') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Order List </span></a></li>
              {{--<li class="sidebar-item"><a href="{{ url('/vendorpaymenthistory') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Payment History</span></a></li>--}}
          {{----}}
          </ul>
        </li>





          <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-bezier-curve"></i><span class="hide-menu">Order Delivery </span></a>
              <ul aria-expanded="false" class="collapse  first-level">
                  <li class="sidebar-item"><a href="{{ url('/vendororderdeliverylist') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Delivery List</span></a></li>
                  <li class="sidebar-item"><a href="{{ url('/vendororderstatus') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Delivery Status </span></a></li>
                 <li class="sidebar-item"><a href="{{ url('/paymenthistory') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Payment History</span></a></li>
              </ul>
          </li>





      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->