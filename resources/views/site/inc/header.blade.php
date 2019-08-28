<nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-secondary">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTop">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"> <i class="fa fa-phone"></i> Call us: 020 2366 455 </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li><a href="{{ url('/customer/customerProfile') }}" class="nav-link"> My Account </a></li>
        <li><a href="{{ url('/cart') }}" class="nav-link"> Shopping Cart </a></li>
      </ul>
    </div>
  </div>
</nav>

<section class="header-main border-bottom">
	<div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5-24 col-sm-5 col-3">
        <div class="brand-wrap">
          <a href="{{url('/')}}"><img class="logo" src="{{ asset('img/eklas_logo.png') }}"></a>
        </div> <!-- brand-wrap.// -->
      </div>
      <div class="col-lg-13-24 col-sm-12 order-3 order-lg-2">
        <form id="searchProductForm" role="form" action="{{ url('/searchItems') }}" method="POST">
          {{ csrf_field() }}
          <div class="input-group w-100">
            <select class="custom-select"  name="category_name">
                <option value="">All type</option><option value="codex">Special</option>
                <option value="comments">Only best</option>
                <option value="content">Latest</option>
            </select>
              <input type="text" class="form-control" style="width:60%;" name="searchEntity" placeholder="Search Items" required>
              
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
        </form> 
      </div> 
      <div class="col-lg-6-24 col-sm-7 col-9  order-2  order-lg-3">
        <div class="d-flex justify-content-end">
          <div class="widget-header">

            @if(Session::get('customerId'))
              <?php
                    $customerInfo=DB::table('customers')->where('id',Session::get('customerId'))->first();
              ?>
              <small class="title text-muted">Welcome {{$customerInfo->name }}</small>
              <div> <a href="{{ url('/mycustomerProfile') }}">Profile</a> <span class="dark-transp"> | </span>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"> Log Out</a></div>

              <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                {{ csrf_field() }}
              </form> 
            @else
              <small class="title text-muted">Welcome guest!</small>
              <div> <a href="{{ url('/login/customers') }}">Sign in</a> <span class="dark-transp"> | </span>
              <a href="{{ url('/register/customers') }}"> Register</a></div>
            @endif
          </div>
          <a href="{{ url('/cart') }}" class="widget-header border-left pl-3 ml-3">
            <div class="icontext">
              <div class="icon-wrap icon-sm round border"><i class="fa fa-shopping-cart"></i></div>
            </div>
            <span class="badge badge-pill badge-danger notify">{{ $cartCount }}</span>
          </a>
        </div>
      </div>
    </div>
	</div>
</section>