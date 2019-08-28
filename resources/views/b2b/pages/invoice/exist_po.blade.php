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
            <h3>Exist PO</h3>
            @if(!empty($existpo->po_company_logo))

                <img src="{{asset('uploads/b2bcompany/'.$existpo->po_company_logo)}}" alt="" style="float:right;width:50px;height:50px;">
            @else

                <form action="@if(!empty($existpo)){{url('updatecompanylogo/'.$existpo->id)}}@endif" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="uplogo">
                    </div>
                    <input type="submit" name="btn" value="Upload">
                </form>
            @endif
            <form action="{{url('b2b-site-exitpo')}}" class="form-inline" method="get">
                {{csrf_field()}}

                <div class="form-group">
                    <input type="text" name="ponumber" id="ponumber" class="form-control input-lg" placeholder="Search Po Number" />
                    <div id="ponumberList">

                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn" class="btn btn-info" value="GO">

                    </div>
                </div>




            </form>
        </div>

        @if(!empty($existpo))

            <div class="container2" id="main_warp2">

                <div class="myexistData">
                    <form action="{{url('/existpoinvoicegenerate')}}" method="post" class="" enctype="multipart/form-data">
                        {{csrf_field()}}
                <div class="row p-5">
                    <div class="col-md-6 poImage">



                        <div class="form-group">
                            <label>Company Name</label>
                            &nbsp;<input type="text" name="poinvoice_company_name" value="{{$existpo->po_company_name}}" class="">
                        </div>
                        <div class="form-group">
                            <label>Company Email</label>
                            &nbsp;&nbsp;<input type="text" name="poinvoice_company_email" value="{{$existpo->po_company_email}}">
                        </div>
                        <div class="form-group">
                            <label>Company Mobile</label>
                            <input type="text" name="poinvoice_company_mobile" value="{{$existpo->po_company_mobile}}">
                        </div>

                        <div class="form-group">
                            <label>Model No:</label>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="poinvoice_company_code" value="{{$existpo->po_company_code}}" class="">
                            <?php
                            Session::put('poCompanyCode',$existpo->po_company_code);
                            ?>
                        </div>


                    </div>

                    <div class="col-md-6 text-right">
                        <br/>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <label>Company Address</label>
                            &nbsp;<textarea  name="poinvoice_company_address" class="">{{$existpo->po_company_address}}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Invoice No:</label>
                            &nbsp;<input type="text" name="poinvoice_code" value="<?php echo str_random('5'); ?>" class="">
                        </div>

                        <div class="form-group">
                            <label>Invoice Date</label>
                            &nbsp;&nbsp;<input type="text" name="poinvoice_date" id="datepicker" class="date-picker">
                        </div>
invoice


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="text-align: center;"><strong>Suummary</strong></h3>
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <td><strong>Item</strong></td>
                                            <td class="text-center"><strong>Price</strong></td>
                                            <td class="text-center"><strong>Quantity</strong></td>
                                            <td class="text-right"><strong>Totals</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                        @php($sum=0)
                                        @foreach($b2bexistpoDetails as $b2bpurchaseDetail)
                                            <tr>
                                                <td>
                                                    {{$b2bpurchaseDetail->item_name}}
                                                    <input type="hidden" name="item_Id[]" value="{{$b2bpurchaseDetail->item_id}}">
                                                    <input type="hidden" name="item_name[]" value="{{$b2bpurchaseDetail->item_name}}">

                                                </td>
                                                <td class="text-center">
                                                    {{$b2bpurchaseDetail->item_price}}
                                                    <input type="hidden" name="item_price[]" value="{{$b2bpurchaseDetail->item_price}}">
                                                </td>
                                                <td class="text-center">
                                                    {{$b2bpurchaseDetail->item_quantity}}
                                                    <input type="hidden" name="item_quantity[]" value="{{$b2bpurchaseDetail->item_quantity}}">
                                                </td>
                                                <td class="text-right">
                                                    {{$b2bpurchaseDetail->item_quantity*$b2bpurchaseDetail->item_price}}
                                                    <input type="hidden" name="" value="{{$b2bpurchaseDetail->item_quantity*$b2bpurchaseDetail->item_price}}">

                                                </td>
                                            </tr>
                                            <?php $sum+=$b2bpurchaseDetail->item_quantity*$b2bpurchaseDetail->item_price?>
                                        @endforeach

                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Grand Total</strong></td>
                                            <td class="no-line text-right">{{ $sum}}
                                                <?php Session::put('singleprevious_purchaseamount',$sum); ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group existpoDiv">
                                        <input type="submit" name="btn" value="Generate Invoice" class="btn btn-primary" style="float:right;">

                                        {{--<button type="submit" name="btn" value="" class="btn btn-primary" onclick="ExistPoInvoice()" style="float:right;">Generate Invoice</button>--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    </form>
                    </div>

                <div class="row">








                    <div class="col-md-12 poForm">



                            <div class="mainAddmoreData">
                                <form action="{{url('/existpoinvoicegenerate')}}" method="post" class="" enctype="multipart/form-data">
                                    {{csrf_field()}}

                        <div id="ExistPoData">

                            <div class="row p-5">
                                <div class="col-md-6 poImage">


                                    <div class="form-group">
                                        <label>Company Name</label>
                                        &nbsp;<input type="text" name="myinvoice_company_name" value="{{$existpo->po_company_name}}" class="">
                                    </div>
                                    <div class="form-group">
                                        <label>Company Email</label>
                                        &nbsp;&nbsp;<input type="text" name="myinvoice_company_email" value="{{$existpo->po_company_email}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Company Mobile</label>
                                        <input type="text" name="myinvoice_company_mobile" value="{{$existpo->po_company_mobile}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Model No:</label>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="myinvoice_company_code" value="{{$existpo->po_company_code}}" class="">
                                        <?php
                                        Session::put('poCompanyCode',$existpo->po_company_code);
                                        ?>
                                    </div>


                                </div>

                                <div class="col-md-6 text-right">
                                    <br/>
                                    <br/>
                                    <br/>
                                    <div class="form-group">
                                        <label>Company Address</label>
                                        &nbsp;<textarea  name="myinvoice_company_address" class="">{{$existpo->po_company_address}}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label>Invoice No:</label>
                                        &nbsp;<input type="text" name="myinvoice_code" value="<?php echo str_random('5'); ?>" class="">
                                    </div>

                                    <div class="form-group">
                                        <label>Invoice Date</label>
                                        &nbsp;&nbsp;<input type="text" name="myinvoice_date" id="mydatepicker" class="date-picker">
                                    </div>



                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title" style="text-align: center;"><strong>Suummary</strong></h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-condensed">
                                                    <thead>
                                                    <tr>
                                                        <td><strong>Item</strong></td>
                                                        <td class="text-center"><strong>Price</strong></td>
                                                        <td class="text-center"><strong>Quantity</strong></td>
                                                        <td class="text-right"><strong>Totals</strong></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                    @php($sum=0)
                                                    @foreach($b2bexistpoDetails as $b2bpurchaseDetail)
                                                        <tr>
                                                            <td>
                                                                {{$b2bpurchaseDetail->item_name}}
                                                                <input type="hidden" name="item_Id[]" value="{{$b2bpurchaseDetail->item_id}}">
                                                                <input type="hidden" name="item_name[]" value="{{$b2bpurchaseDetail->item_name}}">

                                                            </td>
                                                            <td class="text-center">
                                                                {{$b2bpurchaseDetail->item_price}}
                                                                <input type="hidden" name="item_price[]" value="{{$b2bpurchaseDetail->item_price}}">
                                                            </td>
                                                            <td class="text-center">
                                                                {{$b2bpurchaseDetail->item_quantity}}
                                                                <input type="hidden" name="item_quantity[]" value="{{$b2bpurchaseDetail->item_quantity}}">
                                                            </td>
                                                            <td class="text-right">
                                                                {{$b2bpurchaseDetail->item_quantity*$b2bpurchaseDetail->item_price}}
                                                                <input type="hidden" name="total_price[]" value="{{$b2bpurchaseDetail->item_quantity*$b2bpurchaseDetail->item_price}}">

                                                            </td>
                                                        </tr>
                                                        <?php $sum+=$b2bpurchaseDetail->item_quantity*$b2bpurchaseDetail->item_price?>
                                                    @endforeach

                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center"><strong>Grand Total</strong></td>
                                                        <td class="no-line text-right">{{ $sum}}
                                                            <?php Session::put('multiprevious_purchaseamount',$sum); ?>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <p class="text-center">Details</p>
                        <table class="table table-bordered">
                            <thead>


                            <th>ItemName</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>TotalPrice</th>
                            <th><a href="" class="add"><i class="glyphicon glyphicon-plus"></i></a></th>

                            </thead>

                            <tbody class="mybody">
                            <tr>

                                <td>
                                    <select name="product_name[]" class="productName" required>
                                        <option value="">Select Option</option>
                                        @foreach($items as $item)
                                            <option value="{!! $item->id !!}">{!! $item->item_name !!}</option>
                                        @endforeach

                                    </select>

                                </td>

                                <td><input type="text"  onkeypress="return event.charCode >48 && event.charCode <= 57" name="qty[]" class="form-control qty"></td>
                                <td><input type="text" name="price[]" readonly="true" class="form-control price"></td>
                                <td><input type="text" name="total_price[]" readonly="true" class="form-control total_price"></td>
                                <td><a href="" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>


                            </tr>
                            </tbody>

                            <tfoot>
                            <tr>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td style="border:none;"></td>
                                <td><b>TotalAmount</b></td>
                                <td class="total" style="">
                                </td>
                                <input type="hidden" name="total_amount" class="total_amount" value="">




                            </tr>
                            </tfoot>


                        </table>
                        <div class="form-group">

                            <button type="submit" name="alldatabtn" value="1" class="btn btn-primary" style="float:right;">Generate Invoice</button>

                        </div>
                    </form>
                    </div>

                    </div>


                </div>
                {{--<button onclick="myFunction()" style="float:right;">Print</button>--}}
            </div>

<div class="row">
    <div class="col-md-12">
        <button type="button" class="addMorebtn" id="addMorebtn">AddMore</button>
        <button type="button" class="closebtn" id="closebtn">Close</button>
    </div>
</div>






        @endif








    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".addMorebtn").click(function(){
                $('.poForm').show();
                $('.myexistData').hide();

            });
            $('.poForm').hide(); // hide again once clicked off the tab.
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".closebtn").click(function(){
                $('.poForm').hide();
                $('.myexistData').show();

            });
            $('.poForm').hide(); // hide again once clicked off the tab.
        });
    </script>


<script>
    function ExistPoInvoice(){
        $.ajax({
            url:"{{url('/existpoinvoicegenerate')}}",
            method:"post",

            success:function(response){

            }
        });
    }
</script>




    <script>
        $(document).ready(function(){

            $('#ponumber').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('autocomplete.fetch') }}",
                        method:"POST",
                        data:{query:query, _token:_token},
                        success:function(data){
                            $('#ponumberList').fadeIn();
                            $('#ponumberList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function(){
                $('#ponumber').val($(this).text());
                $('#ponumberList').fadeOut();
            });

        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $('.date-picker').datepicker();

    </script>

    <script>
        $('#mydatepicker').datepicker();

    </script>




    <script>


        $('.mybody').delegate('.productName','change',function(){

            var currentSelectEl = $(this);
            var cProductName=$(this).val();
            var trRowList=$(this).parents('tr').siblings();

//        var tr=$(this).parent().parent();
//        var id=tr.find('.productName').val();

            $.each(trRowList,function(key,el){
                var selectData = $(el).find('.productName').val();
                if(cProductName === selectData){
                    alert('Item Already Selected, Please Choose Another Item!');
                    currentSelectEl.val(0);
//                    $(".qty").val(" ");
//                    $(".total_price").val(" ");
                    currentSelectEl.parents('tr').find('input.price').prop('');
                }
            });
            if( $(this).val() !== 0 ) {
                var dataId = $(this).val();
                var dataId = {'id': dataId};
                $.ajax({
                    type: 'GET',
                    url: "{{url('/b2b-site-po/findPrice')}}",
                    dataType: 'json',
                    data: dataId,
                    success: function (data) {
                        currentSelectEl.parents('tr').find('.price').val(data.sale_price);//val prodide database table column
                    }

                });
            }
        });


        $('.mybody').delegate('.productName','change',function(){
            var tr=$(this).parent().parent();
            tr.find('.qty').focus();
        });


        $('.mybody').delegate('.qty,.price','keyup',function(){

            var tr=$(this).parent().parent();
            var qty=tr.find('.qty').val();
            var price=tr.find('.price').val();
            var mytotal_price=(qty*price);
            tr.find('.total_price').val(mytotal_price);
            total();

        });


        $('.add').on('click',function(e){

            e.preventDefault();
            addRow();
        });



        function total(){
            var total=0;
            $('.total_price').each(function(i,e){

                var amount=$(this).val()-0;
                total+=amount;
            });
            //$('.total').html(total);
            $('.total').html(total.formatMoney(2,',','.')+ "");
            $(".total_amount").val(total);


        };

        Number.prototype.formatMoney=function(decPlaces,thouSeparator,decSeparator)
        {
            var n=this,
                    decPlaces=isNaN(decPlaces=Math.abs(decPlaces))? 2: decPlaces,

                    decSeparator=decSeparator==undefined ? ".": decSeparator,
                    thouSeparator=thouSeparator==undefined ? ",": thouSeparator,
                    sign=n<0 ? "-":"",
                    i=parseInt(n=Math.abs(+n||0).toFixed(decPlaces))+ "",
                    j=(j=i.length)>3?j%3:0;
            return sign+(j?i.substr(0,j)+thouSeparator: "")
                    +i.substr(j).replace(/(\d{3})(?=\d)/g, "$1"+thouSeparator)
                    +(decPlaces?decSeparator+Math.abs(n-i).toFixed(decPlaces).slice(2):"");

        };


        function addRow(){


            var tr='<tr>'+
                    '<td>'+
                    '<select name="product_name[]" class="productName" required>'+
                    '<option value="">Select Option</option>'+
                    '@foreach($items as $item)'+
                    '<option value="{!! $item->id !!}">{!! $item->item_name !!}</option>'+
                    '@endforeach'+
                    '</select>'+
                    '</td>'+
                    '<td><input type="text" onkeypress="return event.charCode >48 && event.charCode <= 57" name="qty[]" class="form-control qty"></td>'+
                    '<td><input type="text" name="price[]" readonly="true" class="form-control price"></td>'+
                    '<td><input type="text" name="total_price[]" readonly="true" class="form-control total_price"></td>'+
                    '<td><a href="" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                    '</tr>';

            $('.mybody').append(tr);

        };



        $('.mybody').on("click",".remove", function(e){
            e.preventDefault();
            if ($('.mybody tr').length == 1) {
                return;
            }
            var id = $(this).closest("tr").find("td").eq(0).html();
            $(this).closest("tr").fadeOut("normal", function () {
                $(this).remove();
                total();
            });
        });





    </script>






@endsection
