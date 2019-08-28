{{-- Customer Dashboard Sidebar Menu  --}}
<ul class="list-group">
  <a href="{{ url('/customer') }}"><li class="list-group-item active">Dashboard</li></a>
  <a href="{{ url('/mycustomerProfile') }}"><li class="list-group-item">Account Information</li></a>
  <a href="{{ url('/customershippingAddressBook') }}"><li class="list-group-item">Shipping Address</li></a>
  <a href="{{ url('/customerWishList') }}"><li class="list-group-item">My Wishlist</li></a>
  <a href="{{ url('/customerOrderHistory') }}"><li class="list-group-item">Order History</li></a>
  <a href="{{ url('/customerReviewHistory') }}"><li class="list-group-item">Review History</li></a>
  <a href="{{ url('/customerChangePassword') }}"><li class="list-group-item">Change Password</li></a>
</ul>