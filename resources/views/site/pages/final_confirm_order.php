@extends('site.pages.customerProfile.layouts.app')
@section('content')
<!-- Main Content - start -->
<div class="row">
   <div class="col-md-12 bg-grad-primary">
       <form class="form-register" id="form-register" action="{{url('/shipping')}}" method="post">
       {{ csrf_field() }}
           {{-- <div class="form-row">
                               <div class="form-holder form-holder-2">
                                   <label for="username">Username*</label>
                                   <input type="text" placeholder="Username" class="form-control" id="username" name="username" required>
                               </div>
                           </div>
                           <div class="form-row">
                               <div class="form-holder form-holder-2">
                                   <label for="email">Email Address*</label>
                                   <input type="email" placeholder="Your Email" class="form-control" id="email" name="email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                               </div>
                           </div>
                           <div class="form-row">
                               <div class="form-holder">
                                   <label for="password">Password*</label>
                                   <input type="password" placeholder="Password" class="form-control" id="password" name="password" required >
                               </div>
                               <div class="form-holder">
                                   <label for="confirm_password">Confirm Password*</label>
                                   <input type="password" placeholder="Confirm Password" class="form-control" id="confirm_password" name="confirm_password" required>
                               </div>
                           </div> --}}
           <div class="form-row pl-2 pr-2">
               <div class="form-group col-md-6">
                   <label for="customer_firstName">First Name</label>
                   <input type="text" class="form-control" id="customer_firstName" name="customer_firstName" placeholder="First Name" autocomplete="off" required>
                   @if ($errors->has('customer_firstName'))
                       <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_firstName') }}</small>
                   @endif
               </div>
               <div class="form-group col-md-6">
                   <label for="customer_lastName">Last Name</label>
                   <input type="text" class="form-control" id="customer_lastName" name="customer_lastName" placeholder="Last Name" autocomplete="off" required>
                   @if ($errors->has('customer_lastName'))
                       <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_lastName') }}</small>
                   @endif
               </div>
           </div>

           <div class="form-group">
               <label for="customer_email">Email</label>
               <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" autocomplete="off" required>
               @if ($errors->has('customer_email'))
                   <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_email') }}</small>
               @endif
           </div>
           <br/>
           <div class="form-group">
               <label for="customer_phone">Phone</label>
               <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Phone" autocomplete="off" required>
               @if ($errors->has('customer_phone'))
                   <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_phone') }}</small>
               @endif
           </div>
           <br/>
           <div class="form-group">
               <label for="customer_address">Address</label>
               <div class="controls">
                   <textarea class="form-control" id="customer_address" name="customer_address" rows="3" placeholder="Address" required></textarea>
               </div>
               @if ($errors->has('customer_address'))
                   <small class="text-danger font-weight-bold errortext">{{ $errors->first('customer_address') }}</small>
               @endif
           </div>
       </form>
   </div>
</div>
<!-- Main Content - end -->
@endsection
