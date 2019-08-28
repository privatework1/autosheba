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
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-th"></i><span class="hide-menu">Menu/Categories</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('categories.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Categories </span></a></li>
            <li class="sidebar-item"><a href="{{ route('categories.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> View Categories </span></a></li>
          </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-th"></i><span class="hide-menu">Sub-Menu/Sub-Categories</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('subcategories.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Add Sub-Categories</span></a></li>
            <li class="sidebar-item"><a href="{{ route('subcategories.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">View Sub-Categories</span></a></li>
          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-brain"></i><span class="hide-menu">Brand </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('brands.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Brand </span></a></li>
            <li class="sidebar-item"><a href="{{ route('brands.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> View Brand </span></a></li>
          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-compass"></i><span class="hide-menu">Item </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('item.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Item </span></a></li>
            <li class="sidebar-item"><a href="{{ route('item.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> View Item </span></a></li>
          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-vials"></i><span class="hide-menu">Vendor </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('vendors.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Vendor </span></a></li>
            <li class="sidebar-item"><a href="{{ route('vendors.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> View Vendor </span></a></li>
          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-ban"></i><span class="hide-menu">B2B Customer </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('b2bcustomers.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Customer </span></a></li>
            <li class="sidebar-item"><a href="{{ route('b2bcustomers.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> View Customer </span></a></li>
          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-cannabis"></i><span class="hide-menu">Company </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('companies.create') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Company </span></a></li>
            <li class="sidebar-item"><a href="{{ route('companies.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Manage Company </span></a></li>
          </ul>
        </li>
        {{--<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fab fa-product-hunt"></i><span class="hide-menu">Product </span></a>--}}
          {{--<ul aria-expanded="false" class="collapse  first-level">--}}
          {{--<li class="sidebar-item"><a href="{{ url('/addProduct') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Product </span></a></li>--}}
            {{--<li class="sidebar-item"><a href="{{ route('products.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Manage Product </span></a></li>--}}
          {{--</ul>--}}
        {{--</li>--}}

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span class="hide-menu">Order </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ url('/orderlist') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Order List </span></a></li>

          </ul>
        </li>


        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-bezier-curve"></i><span class="hide-menu">Order Delivery </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ url('/orderdeliverylist') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Delivery List</span></a></li>
            <li class="sidebar-item"><a href="{{ url('/orderstatus') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Delivery Status </span></a></li>
            <li class="sidebar-item"><a href="{{ url('/orderinvoices') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Order Invoices</span></a></li>
            <li class="sidebar-item"><a href="{{ url('/paymenthistory') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Payment History</span></a></li>
          </ul>
        </li>


        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-band-aid"></i><span class="hide-menu">Banner</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ url('/banner') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Add Banner</span></a></li>
            <li class="sidebar-item"><a href="{{ url('/bannerList') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Manage Banner</span></a></li>

          </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-football-ball"></i><span class="hide-menu">Footer Setting</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ url('/customsite') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Add Footer Site</span></a></li>
            <li class="sidebar-item"><a href="{{ url('/customsiteList') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Manage Footer</span></a></li>

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