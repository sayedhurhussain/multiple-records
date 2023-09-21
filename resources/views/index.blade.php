<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Or Remove Multiple Records/Inputs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container d-flex justify-content-center pt-5">
        <div class="col-md-12">
            <h2 class="text-center pb-3 text-danger">Add or Remove Multiple Records</h2>

            <form action="/post" method="Post">
                @csrf

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                            
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p> {{ Session::get('success') }} </p>
                    </div>
                @endif

                <table class="table table-bordered" id="table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Marks</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="inputs[0][name]" id="name" placeholder="Enter your name" class="form-control">
                        </td>
                        <td>
                            <input type="email" name="inputs[0][email]" id="email" placeholder="Enter your email" class="form-control">
                        </td>
                        <td>
                            <input type="number" name="inputs[0][marks]" id="marks" placeholder="Enter your marks" class="form-control">
                        </td> 
                        <td>
                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </td>
                    </tr>

                </table>

                <button type="submit" class="btn btn-primary col-md-2">Save</button>
            </form>
        </div>
    </div>


    <script>
        var i=0;
        $('#add').click(function(){
            ++i;
            $('#table').append(
                `<tr>
                    <td>
                        <input type="text" name="inputs[`+i+`][name]" placeholder="Enter your name" class="form-control">
                    </td>
                    <td>
                        <input type="email" name="inputs[`+i+`][email]" placeholder="Enter your email" class="form-control">
                    </td>
                    <td>
                        <input type="number" name="inputs[`+i+`][marks]" placeholder="Enter your marks" class="form-control">
                    </td>
                    <td>
                        <button type="button" name="add" id="add" class="btn btn-danger remove-table-row">Remove</button>
                    </td>
                </tr>`
            );
        });

        $(document).on('click', '.remove-table-row', function(){
            $(this).parents('tr').remove();
        })
    </script>
    
</body>
</html>