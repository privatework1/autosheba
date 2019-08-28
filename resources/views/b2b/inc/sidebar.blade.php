<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/b2b-dashboard') }}" aria-expanded="false"><i class="fa fa-cab"></i><span class="hide-menu">Dashboard</span></a></li>

      <?php
          $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();

        ?>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/b2b-dashboard') }}" aria-expanded="false"><i class="fa fa-cab"></i><span class="hide-menu">
       @if(!empty($b2bInfo))
           <span>{{$b2bInfo->b2bCustomer_name}}</span>
        <img src="{{asset('uploads/b2bcustomer/'.$b2bInfo->b2bCustomer_logo)}}" alt="" style="width:40px;height: 40px;border-radius: 50%;">

        @endif
        </span></a></li>
         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-th"></i><span class="hide-menu">Purchase</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ url('b2b-site-po') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Generate PO</span></a></li>
            <li class="sidebar-item"><a href="{{ url('b2b-site-polist') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">PO List</span></a></li>
          </ul>
        </li>

          <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-inbox"></i><span class="hide-menu">Invoice</span></a>
              <ul aria-expanded="false" class="collapse  first-level">
                  <li class="sidebar-item"><a href="{{ url('b2b-site-generateinvoice') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Generate Invoice</span></a></li>
                  <li class="sidebar-item"><a href="{{ url('b2b-site-final-invoicelist') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Invoice List</span></a></li>
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