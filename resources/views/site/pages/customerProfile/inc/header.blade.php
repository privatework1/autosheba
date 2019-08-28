<!-- Header - start -->
<div class="top">
    <div class="top_menu">
      <ul>
        <a href=""><li>Welcome </li></a>
        <a href="{{ url('/customerProfile') }}">
          <li><i class="fas fa-user-circle"></i> Profile1</li>
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <li><i class="fas fa-sign-out-alt"></i> Log Out</li>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
          {{ csrf_field() }}
        </form> 
      </ul>
    </div>
  </div>
  <!--Top end-->
  
  <div class="header"> 
    <!-- Navmenu Mobile Toggle Button --> 
    <a href="#" class="header-menutoggle" id="header-menutoggle">Menu</a>
    <div class="header-info"> 
      
      <!-- Small Cart --> 
      <a href="{{ url('/cart') }}" class="header-cart">
        <div class="header-cart-inner">
          <p class="header-cart-count"> <img src="{{ asset('img/cart.png') }}" alt=""> <span>{{ $cartCount }}</span></p>
        </div>
      </a> 
      
      <!--Search Form --> 
      <a href="#" class="header-searchbtn" id="header-searchbtn"></a>
      <form action="#" class="header-search" id="header-search">
        <input type="text" class="inputHeaderSearch" placeholder="Search parts or vehicles">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    
    <!-- Logotype -->
    <p class="header-logo"> <a href="{{ url('/') }}"><img src="{{asset('frontend')}}/img/autosheba_logo.png" alt=""></a> </p>
    <!-- Navmenu - start -->
    <nav id="top-menu">
      <div class="search">
        <form method="post">
          <input type="text" class="textbox inputHeaderSearch" placeholder="Type to search">
          <button type="submit" class="button"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <!--search end-->
      <ul>
        <li class="has-child"><a href="">Category</a> <em class="fa fa-angle-down"></em>
          <ul>
            @if(count($categories)>0)
              @foreach ($categories as $category)
                <li><a href="">{{ $category->category_name }}</a></li>
              @endforeach
            @else
              <li><a href="">No Category Found</a></li>
            @endif
          </ul>
        </li>
  
        <li class="has-child"> <a href="">Brands</a> <i class="fa fa-angle-down"></i>
          <ul>
            @if(count($companies)>0)
              @foreach ($companies as $company)
                <li><a href="">{{ $company->company_name }}</a></li>
              @endforeach
            @else
              <li><a href="">No Brand Found</a></li>
            @endif
          </ul>
        </li>
        <li><a href="">Service</a></li>
        <li class="has-child"> <a href="">New Arrival</a> <i class="fa fa-angle-down"></i>
          <ul>
            <li><a href="">Orders</a></li>
            <li><a href="">Messages</a></li>
            <li><a href="{{ url('/cart') }}">Shopping Cart</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- Navmenu - end --> 
  </div>
  <!-- Header - end --> 