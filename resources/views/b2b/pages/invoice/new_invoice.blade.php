@extends('b2b.layouts.app')
@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .poImage img{
            float:right;
        }
    </style>

    <div class="container-fluid">
        <div class="col-md-12 mt-3">


            <div class="poForm">

                <form action="{{url('/b2b-site-poinvoice')}}" method="post" class="" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="info">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="text-center">New Invoice</h3>
                                            </div>
                                        </div>
                                        <div class="row p-5">

                                            <div class="col-md-6 poImage">
                                                <div class="form-group">
                                                    <label>Company Logo</label>
                                                    &nbsp; &nbsp; &nbsp;<input type="file" name="poinvoice_company_logo" class="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    &nbsp; &nbsp; &nbsp;<input type="text" name="poinvoice_company_name" class="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Company Email</label>
                                                    &nbsp;&nbsp; &nbsp; <input type="text" name="poinvoice_company_email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Company Mobile</label>
                                                    &nbsp; &nbsp;<input type="text" name="poinvoice_company_mobile">
                                                </div>
                                                <div class="form-group">
                                                    <label>Company Address</label>
                                                    <textarea  name="poinvoice_company_address" class=""></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Model No:</label>
                                                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="poinvoice_company_code" class="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Invoice Date</label>
                                                    &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; <input type="text" name="poinvoice_date" id="datepicker" class="date-picker">
                                                </div>


                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-md-12">
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
                                                        <input type="hidden" name="total_amount" class="total_amount" value="" style="background: red;">




                                                    </tr>
                                                    </tfoot>


                                                </table>


                                                <div class="form-group">

                                                    <input type="submit" name="btn" value="Generate Invoice" class="btn btn-primary" style="float:right;">

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $('.date-picker').datepicker();

    </script>

@endsection
