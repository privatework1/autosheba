@extends('b2b.layouts.app')
@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

    <div class="container-fluid">
        <div class="col-md-12 mt-3">
            <form action="{{url('b2b-site-generateinvoice')}}" class="form-inline" method="get">
                <div class = "form-group ml-5">
                    <label class="" for = "name">Purchase Code</label>
                    <select name="purchase_code" class="">
                        <option value="">Select Option</option>
                        @foreach($b2bpurchases as $b2bpurchase)
                            <option value="{{$b2bpurchase->id}}">{{$b2bpurchase->b2bpurchase_code}}</option>
                        @endforeach
                    </select>
                    <input type ="submit" class ="btn btn-default" value="Search">

                </div>

            </form>

        </div>

        @if(!empty($b2bpurchaseDetails))

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Purchase Order summary
                                    {{$purchaseCode}}
                                    <?php Session::put('purchaseCode',$purchaseCode); ?>
                                </strong></h3>
                            @if(Session::has('message'))
                                <h3><span class="btn btn-success">{{Session::get('message')}}</span></h3>
                            @endif
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
                                    @foreach($b2bpurchaseDetails as $b2bpurchaseDetail)
                                        <tr>
                                            <td>{{$b2bpurchaseDetail->item_name}}</td>
                                            <td class="text-center">{{$b2bpurchaseDetail->item_price}}</td>
                                            <td class="text-center">{{$b2bpurchaseDetail->item_quantity}}</td>
                                            <td class="text-right">{{$b2bpurchaseDetail->item_quantity*$b2bpurchaseDetail->item_price}}</td>
                                        </tr>
                                        <?php $sum+=$b2bpurchaseDetail->item_quantity*$b2bpurchaseDetail->item_price?>
                                    @endforeach

                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Grand Total</strong></td>
                                        <td class="no-line text-right">
                                            {{ $sum}}
                                            <?php Session::put('previous_purchaseamount',$sum); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 mt-3">
                    <button type="button" class="addMorebtn" id="addMorebtn">AddMore</button>
                    <button type="button" class="closebtn" id="closebtn">Close</button>


                    <div class="poForm">

                        <form action="{{url('/b2b-site-generateinvoice')}}" method="post" class="" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="info">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body p-0">


                                                <div class="row">
                                                    <div class="col-md-12">

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

                                                                <td><input type="text" required  onkeypress="return event.charCode >48 && event.charCode <= 57" name="qty[]" class="form-control qty"></td>
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
                                                                <input type="text" name="total_amount" class="total_amount" style="background: red;" value="">
                                                            </tr>
                                                            </tfoot>


                                                        </table>


                                                        <div class="form-group">
                                                            <div class="col-md-4">
                                                                <input type="submit" name="btn" value="Generate Invoice" class="btn btn-primary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @endif

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".addMorebtn").click(function(){
                $('.poForm').show();

            });
            $('.poForm').hide(); // hide again once clicked off the tab.
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".closebtn").click(function(){
                $('.poForm').hide();

            });
            $('.poForm').hide(); // hide again once clicked off the tab.
        });
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
            $('.total').html(total.formatMoney(2,',','.')+ " $");
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
                    '<td><input type="text" required onkeypress="return event.charCode >48 && event.charCode <= 57" name="qty[]" class="form-control qty"></td>'+
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

    <script>
        function myFunction() {
            var printContents = document.getElementById('main_warp').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

        }
    </script>

@endsection
