<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Ajax user Request Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 9 Ajax user Request Example - ItSolutionStuff.com
        </div>
        <div class="card-body">

            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        List Of users
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#userModal">
                            Create user
                        </button>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->codemelli }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="saveform_errlist"></ul>


                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('user.name')}}:</label>
                        <textarea name="name" class="name form-control" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="codemelli" class="form-label">{{__('user.codemelli')}}:</label>
                        <input type="text"  name="codemelli" class="codemelli form-control" placeholder="Name" required="">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">{{__('user.role')}}:</label>
                        <select name="role" class="role">
                            <option value="1">{{__('user.admin')}}</option>
                            <option value="2">{{__('user.operator')}}</option>
                        </select>
                        
                    </div>


                    <div class="mb-3 text-center">
                        <button class="btn btn-success btn-submit">Submit</button>
                    </div>

            </div>
        </div>
    </div>
</div>

</body>

<script>
    $(document).ready(function(){
        $(document).on('click','.btn-submit',function (e){
            e.preventDefault();
            // console.log("hello");
            var data={
                'name' :$('.name').val(),
                'codemelli' :$('.codemelli').val(),
                'role' :$('.role').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type : "POST",
                url : "/users",
                data : data,
                dataType : "json",
                success :function (response) {
                    // console.log(response);
                    if(response.status == 400)
                    {
                        $('#saveform_errlist').html("");
                        $('#saveform_errlist').addClass('alert alert-danger');

                        $.each(response.errors,function (key,err_values){
                            $('#saveform_errlist').append('<li>'+err_values+'</li>');

                        });


                    }
                    else{
                        $('#saveform_errlist').html("");

                        $('#success_message').addClass('alert alert-success')
                        $('#success_message').text(response.message)
                        $('#exampleModal').modal('hide');
                        $('#exampleModal').find('input').val("");
                    }
                }
            });



        }) ;
    });
</script>

</html>
