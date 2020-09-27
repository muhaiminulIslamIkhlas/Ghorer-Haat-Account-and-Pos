@extends('admin.master')

@section('body')

    <div class="container">
        <h3 align="center">Image upload</h3>
        <br />
        <form method="post" id="upload_form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td width="20%" align="right"><label>Select a date</label></td>
                        <td width="30"><input type="date" name="date" id="date" /></td>
                        <td width="20%" align="right"><label>Select a type</label></td>
                        <td width="30%" align=""><select name="section">
                                <option value="1">First paper</option>
                                <option value="2">Second paper</option>
                                <option value="3">Vip</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td></td><td width="50"><span class="text-muted">Only jpg, png, gif</span></td>
                        <td width="10"></td>
                        <td width="30"></td>
                        <td width="10"></td>

                    </tr>
                </table>

            </div>

        <br />

        <span id="uploaded_image"></span>

        <table class="table table-bordered table-responsive bg-white" id="myTableId">
            <thead >

            <tr>
                <th scope="col" >File</th>
                <th scope="col">Action</th>
            </tr>
            </thead >
            <tbody id="row">

            </tbody>
        </table>
            <div class="submit" style="text-align: left"><input type="submit" name="upload" id="upload" class="btn btn-primary rounded" value="Upload"></div>
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){



            var count = 1;

            dynamic_field(count);

            function dynamic_field(number)
            {

                html = '<tr>';
                html += '<td><input type="file" name="select_file[]" class="form-control" /></td>';
                if(number > 1)
                {

                    html += '<td><i name="remove" class="fa fa-trash remove" style="font-size:34px;color:darkblue"></i></td></tr>';
                    $('#myTableId tbody').append(html);
                }
                else
                {
                    console.log("ok")
                    html += '<td><i class="fa fa-plus" name="add" id="add" style="font-size:34px;color:yellowgreen"></i></td></tr>';
                    $('#myTableId tbody').html(html);
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



            $('#upload_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{URL('/ajax_upload/action')}}',
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function(){
                        $("#upload").prop('disabled', true);
                        $('#upload').prop('value','Please wait....');
                    },
                    success:function(data)
                    {
                        console.log(data.data)
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        $('#message').addClass(data.class_name);
                        // $('#uploaded_image').html(data.uploaded_image);
                        $("#upload").prop('disabled', false);
                        $('#upload').prop('value','Insert All Data');
                        $.notify(""+data.message+"", data.class_name);
                    }
                })
            });

        });
    </script>


@endsection()
