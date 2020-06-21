<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{asset('backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <title>POS</title>
</head>
<body>

<div style="margin-right: 200px; margin-left: 200px;">
    <div class="alert alert-dark mt-2 text-center" role="alert">
        Welcome To Ghorer Haat
    </div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-4">
            <div class="card p-4">
                <div class="alert alert-primary" role="alert">
                    Manually add product
                </div>
                <form method="post" id="dynamic_form">
                    <br />
                    <br />
                    <table class="table"  id="user_table">
                        <thead class="bg-white">
                        <tr>
                            <th>Product name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody id="manualProduct">

                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3" align="right">&nbsp;</td>
                            <td>
                                @csrf
                                <input type="submit" name="save" id="save" class="btn btn-primary" value="Cart " />
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </form>
            </div>
        </div>
        <div class="">
            <div class="card table-responsive p-4">
                <table class="table" id="datatable1">
                    <thead>

                    <tr>
                        <th width="40%">Product name</th>
                        <th width="10%">Unit Price</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter=0;
                    ?>

                    @foreach($data as $row)
                        <?php
                        $counter++;

                        ?>
                        <form id="myForm">
                            @csrf
                        <tr>
                            <input type="hidden" name="product_id" placeholder="quantity" value="{{$row->product_id}}" width="50%" disabled>
                            <input type="hidden" name="price" placeholder="quantity" value="{{$row->price}}" width="50%" disabled>
                            <td>{{$row->name}}</td>
                            <td>{{$row->price}}</td>
                            <td><input type="number" id="a_{{$counter}}" name="quantity" style="width:50%;border: none;border-bottom: 2px solid #0c5460;outline: none " min="0"  /></td>
                            <td>
                                <button id="btn_{{$counter}}" onclick="addToCart('{{$row->product_id}}',
                                    '{{$row->price}}','{{$row->name}}',document.getElementById('a_'+{{$counter}}).value,
                                    '{{$counter}}')" class="btn btn-dark">
                                    <i class='fa fa-cart-arrow-down' style='font-size:24px;color:white'></i>
                                </button>

                            </td>
                        </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4 mb-4">
            <div class="alert alert-dark mt-2 text-center" role="alert">
                Content of Cart
            </div>
            <table class="table cart" id="myTableId">
                <thead >

                <tr>
                    <th scope="col" >Product name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
                </thead >
                <tbody id="row">

                </tbody>
            </table>
        </div>
        <div class="card p-4 mb-4">
            <div class="alert alert-white mt-2 " role="alert">
                <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add a customer</button>
            </div>
            <form id="sellForm">
            @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone no</label>
                    <div class="col-sm-10">
                        <input type="text" id="phone_no" class="form-control"  name="phone_no" placeholder="Phone no" required>
                        <div id="customerList">
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" id="cus_name" class="form-control" name="customer" placeholder="Customer" required>
                </div>
            </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Sales Type</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sales_type"  value="online" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Online
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sales_type" id="directCheck" value="direct">
                                <label class="form-check-label" for="directCheck">
                                    Direct
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row" id="orderNumberRow">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Order Number</label>
                    <div class="col-sm-10">
                        <input type="text" id="orderNumInput" class="form-control" name="order_number" placeholder="order_number" required>
                    </div>
                </div>



                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Processing Cost</label>
                    <div class="col-sm-10">
                        <input type="number" value="0" id="processingInput" class="form-control" name="processing_cost" placeholder="Processing Cost" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Charge</label>
                    <div class="col-sm-10">
                        <input type="number" id="deliveryInput" value="0" class="form-control" name="delivery_charge" placeholder="Delivery Charge" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                    <div class="col-sm-10">
                        <input type="text" id="sellTotal" class="form-control" name="total"  disabled>
                    </div>
                </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Payment</label>
                <div class="col-sm-10">
                    <input type="number" id="sellPayment" name="payment" class="form-control" min="0" name="amount" value="0" required>
                </div>
            </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Due</label>
                    <div class="col-sm-10">
                        <input type="number" id="sellDue" class="form-control" min="0" name="due" value="0" placeholder="Due" >
                    </div>
                </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                   <!-- <input type="date" class="form-control" name="date" placeholder="Date" required> -->
                    <input type="date" value="<?php echo date("Y-m-d");?>" name="date">
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Payment Type</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cash_type"  value="cash" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Cash
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cash_type" id="gridRadios1" value="bkash" >
                            <label class="form-check-label" for="gridRadios1">
                                Bkash
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" id="sell" value="Sell" class="btn btn-danger" />
                </div>
            </div>
        </form>
        </div>
    </div>


</div>
</div>

<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="cutomer">
                @csrf
            <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" name="name" class="form-control" required id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone No:</label>
                        <input type="text" name="phone_no" required class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Addres:</label>
                        <textarea class="form-control" required name="address" id="message-text"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" id="cusbtn" class="btn btn-primary" value="Submit"  />
            </div>
            </form>
        </div>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="{{asset('backend/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('backend/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('backend/lib/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('backend/js/notify.js')}}"></script>
<script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>

<script>
    function addToCart(id,price,name,quantity,counter){
        inputId="#a_"+counter;
        $(inputId).val('');
        console.log(inputId);
        $.ajax({
            url:'{{URL('/admin/pos/add/product')}}',
            method:'post',
            data:{'_token': "{{ csrf_token() }}",'product_name':name,'price':price,'product_id':id,'quantity':quantity},
            dataType:'json',
            beforeSend:function(){
                $("#btn_"+counter).prop('disabled', true);

            },
            success:function(data)
            {
                if(data.success){
                    $.notify(""+data.success+"", "success");
                }else{
                    $.notify(""+data.error+"", "error");
                }


                    $('#myForm').trigger("reset");


                $("#btn_"+counter).prop('disabled', false);
                $('#myTableId tbody > tr').remove();
                Cart();

            }
        })

    }

    function Delete(rowId){
        $.ajax({
            url:'{{URL('/admin/pos/delete')}}',
            method:'post',
            data:{'_token': "{{ csrf_token() }}",'rowId':rowId},
            dataType:'json',
            beforeSend:function(){


            },
            success:function(data)
            {
                $.notify("Item removed successfully", "success");
                $('#myTableId tbody > tr').remove();
                Cart();
            }
        })
    }

    function Cart(){
        console.log('clicked');
        $.ajax({
            url:"{{URL('/admin/pos/add/cart')}}",
            method:"get",
            success:function(data){
                //$('#add').attr('disabled', false);
                var tb='<tbody>';
                $.each(data.content, function (index, value) {
                    var html = '<tr>';
                    html += '<td>' + value.name + '</td>';
                    html += '<td>' + value.qty + '</td>';
                    html += '<td>' + value.price + '</td>';
                    html += '<td>' + value.price * value.qty + '</td>';
                    html += '<td><a onClick ="Delete(\'' + value.rowId + '\')" href="#"><i style="font-size:24px" class="fa">&#xf014;</i></a></td></tr>';
                    tb +=html;
                    /*$('.cart tr:last').after(html);*/1

                })
                var html = '<tr>';
                html += '<td style="color: red">Total</td>';
                html += '<td colspan="2" style="color: red">Items :' +data.count+'</td>';
                html += '<td style="color: red">' + data.total + '</td></tr>';
                tb +=html;
                /*$('#row').replaceWith(tb);*/
                $('#myTableId tbody').replaceWith(tb);
                $('#sellTotal').val(data.total);


            }
        })
    }

    function ManualProductAdd(){
        var count = 1;

        dynamic_field(count);

        function dynamic_field(number)
        {
            html = '<tr>';
            html += '<td><input type="text" name="product_name[]" class="form-control" required /></td>';
            html += '<td><input type="number" min="0" name="unit_price[]" class="form-control" required /></td>';
            html += '<td><input type="number" name="quantity[]" class="form-control" required /></td>';
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn rounded-circle remove"><i class="fa fa-trash" style="font-size:24px;color:red"></i></button></td></tr>';
                $('#manualProduct').append(html);
            }
            else
            {
                html += '<td><button type="button" name="add" id="add" class="btn rounded-circle"><i class="fa fa-plus" style="font-size:24px;color:red"></i></button></td></tr>';
                $('#manualProduct').html(html);
            }
        }

        $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("tr").remove();
        });

        $('#dynamic_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:'{{URL('/admin/pos/add/manual')}}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $('#save').prop('value','Adding....');
                    $('#save').prop('disabled','true');
                },
                success:function(data)
                {

                        dynamic_field(1);
                        // $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        $.notify(""+data.success+"", "success");
                    $('#save').prop('value','Cart');
                    $('#save').prop('disabled','false');
                    Cart();
                }
            })
        });
    }
    function fill(name,phone){
        $('#phone_no').val(phone);
        $('#cus_name').val(name);
        $('#customerList').fadeOut();
    }

    $('input:radio[name="sales_type"]').change(
        function(){
            if (this.checked && this.value == 'online') {
                $('#orderNumberRow').show();
                $("#orderNumInput").prop('required',true);

            }else{
                $('#orderNumberRow').hide();
                $("#orderNumInput").prop('required',false);
            }
        });


    $(document).ready(function() {
        Cart();
        //Customer add
        $('#cutomer').submit(function(e) {

            e.preventDefault();
            $.ajax({
                url:'{{URL('/admin/pos/add/customer')}}',
                method:'post',
                data: $(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $("#cusbtn").prop('disabled', true);

                },
                success:function(data)
                {
                    $.notify(""+data.success+"", "success");
                    $('#customer').trigger("reset");
                    $("#cusbtn").prop('disabled', false);
                    $('.modal').modal('hide');
                }
            })
        });

        //Sell complete
        $('#sellForm').submit(function(e) {

            e.preventDefault();
            $.ajax({
                url:'{{URL('/admin/pos/sell')}}',
                method:'post',
                data: $(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $("#sell").prop('disabled', true);

                },
                success:function(data)
                {
                    $.notify(""+data.success+"", "success");
                    $('#sellForm').trigger("reset");
                    $("#sell").prop('disabled', false);
                }
            })
        });

        //Sell Due calculate
        $('#sellPayment').focusout(function(){
            var total=$('#sellTotal').val();
            var payment=$('#sellPayment').val();
            var due=total-payment;
            $('#sellDue').val(due);

        })

        $('#phone_no').focusout(function(){
            $('#customerList').fadeOut();
        })

        $('#processingInput').focusout(function(){
            var total=parseInt($('#sellTotal').val());
            var processing=parseInt($('#processingInput').val());
            var GT=total + processing;
            $('#sellTotal').val(GT);

        })

        $('#deliveryInput').focusout(function(){
            var total=parseInt($('#sellTotal').val());
            var processing=parseInt($('#deliveryInput').val());
            var GT=total+processing;
            $('#sellTotal').val(GT);

        })




        //Auto suggestion
        $("#phone_no").keyup(function(){
            $.ajax({
                type: "POST",
                url: "{{URL('/admin/pos/customer/autocomplete')}}",
                data:{'_token': "{{ csrf_token() }}",'keyword':$(this).val()},
                beforeSend: function(){
                    $("#phone_no").css({"background-color": "#ffffff",
                    "background-image": "url({{asset('backend/img/3.gif')}})",
                    "background-size": "25px 25px",
                    "background-position":"right center",
                    "background-repeat": "no-repeat"});


                },
                success: function(data){
                    /*$("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background","#FFF");*/
                    $('#customerList').fadeIn();
                    var html = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                    $.each(data.result, function (index, value) {

                        html += '<li class="list-group-item" onClick ="fill(\'' + value.name + '\',\'' + value.phone_no + '\')"> name :' + value.name + ' ; phone no :' +value.phone_no  +'</li>';
                        console.log(value.name);
                    })
                    html +='</ul>';

                    $('#customerList').html(html);
                    $("#phone_no").css("background","#FFF");


                }
            });
        });

/*        $(document).on('click', 'li', function(){
            $('#phone_no').val($(this).text());
            $('#customerList').fadeOut();
        });*/


        //Dynamic field

        ManualProductAdd();



    })

</script>
<script>
    $(function(){
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
</script>
</body>
</html>
