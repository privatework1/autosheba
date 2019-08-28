@extends('site.layouts.app')
@section('main_content')
    <style>
        input[type=password] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
    </style>
        <!-- Customer Login - start -->
<div class="cont maincont">
    <h1 class="text-center"><span>Log In B2B</span></h1>
    <div class="container">
        <div class="user_card">
            <div class="col-md-6" style="width:50%;margin:0 auto;">
                <form action="{{ url('/b2b-site/login') }}" method="post">
                    {{ csrf_field() }}
                    <h2><span>Login</span></h2>
                    <p>Already registered? Please log in below:</p>


                    <label>Email address</label>

                    <input type="text" required name="b2b_email" class="form-control input_user" value="" placeholder="email address">

                    <label>Password</label>
                    <input type="password" required name="b2b_code" class="form-control input_pass" value="" placeholder="password/Code">

                    <input type="submit" name="btn" class="btn btn-info btn-block" value="Login">
                </form>
            </div>



    </div>
    </div>
</div>

@endsection
