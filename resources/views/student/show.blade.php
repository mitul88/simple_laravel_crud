
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user_data -> name }}</title>
        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mx-auto">
            <div class="col-md-6 mx-auto">
                <div class="card my-5">
                    <img class="shadow my-3" style="width: 250px;height:300px;margin:auto;border-radius:50%;" src="{{ URL::to('') }}/media/student_img/{{ $user_data -> photo }}" alt="{{ $user_data -> name }}">
                    <div class="card-title text-center">
                        <h2>{{ $user_data -> name }}</h2>
                        <em><h4 style="color:red;"></h4></em>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td>{{ $user_data -> name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user_data -> email }}</td>
                            </tr>
                            <tr>
                                <td>Cell</td>
                                <td>{{ $user_data -> cell }}</td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Bloodgroup</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <a href="{{ route('student.index') }}" class="btn btn-lg btn-outline-dark w-50 mb-4 mx-auto">Return to Home</a>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="app/main.js"></script>
</body>
</html>