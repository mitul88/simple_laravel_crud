<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD with Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }   
     
    </style>
</head>
<body class="bg-dark">
    
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card shadow my-5 px-2 py-4 bg-light">
                    <div class="card-title text-center mt-4">
                        <h2>CREATE NEW ENTRY</h2>
                    </div>
                    <div class="card-body">

                      @if(Session::has('success'))

                        <p class="alert alert-success">{{ Session::get('success') }} <button class="close" data-dismiss="alert"> &times; </button> </p>
              
                      @endif()

                      @if($errors->any())

                        <p class="alert alert-danger">{{ $errors->first() }} <button class="close" data-dismiss="alert"> &times; </button> </p>

                      @endif

                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                            <div class="form-group">
                              <label for="name">Name:</label>
                              <input name="name" type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                              <label for="email">Email address:</label>
                              <input name="email" type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                              <label for="cell">Cell number:</label>
                              <input name="cell" type="text" class="form-control" id="cell">
                            </div>
                            <div class="form-group">
                              <label for="user_name">Username:</label>
                              <input name="uname" type="text" class="form-control" id="user_name">
                            </div>
                            <div class="form-group">
                              <label for="photo">Photo:</label>
                              <input name="photo" type="file">
                            </div>
                            <input type="submit" class="btn btn-success w-25" value="Submit">
                          </form>
                    </div>
                    <hr>
                    <a href="{{ route('student.index') }}" class="btn btn-lg btn-outline-dark w-50 mx-auto">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>