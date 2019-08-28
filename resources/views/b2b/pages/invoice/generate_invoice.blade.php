@extends('b2b.layouts.app')
@section('content')
    <style>
        ul li {
            list-style:none;
        }
    </style>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

    <div class="container-fluid">

        <div id="Maindiv">
            <h3>Generate Invoice</h3>
            <form action="{{url('b2b-site-invoicetypet')}}" class="form-inline" method="get">
              {{csrf_field()}}


                <ul>
                    <li>  <input type="radio" name="radiodata" value="newinvoice">New Invoice</li>
                    <li>  <input type="radio" name="radiodata" value="existpo">Exist PO</li>
                    <input type="submit" name="btn" value="GO">
                </ul>

          </form>
        </div>








    </div>


@endsection
