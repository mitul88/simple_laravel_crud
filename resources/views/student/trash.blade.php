<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD with Laravel TRASH: Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }   
    </style>
</head>
<body class="bg-dark">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand bg-dark text-light p-2" href="{{ route('home.index') }}" style="border-radius: 20px">LaravelCRUD</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                    <a class="btn btn-light mx-2 font-weight-bolder" href="{{ route('home.index') }}">Home</a>
                    <a class="btn btn-light mx-2 active" href="{{ route('student.index') }}">Student</a>
                    <a class="btn btn-light mx-2" href="{{ route('teacher.index') }}">Teacher</a>
                    <a class="btn btn-light mx-2" href="{{ route('staff.index') }}">Staff</a>
                    <a class="btn btn-danger mx-2" href="{{ route('student.trash') }}">Deleted Student</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card shadow my-5 bg-light">
                    <div class="card-title text-center mt-4">
                        <h2 class="bg-danger text-light mx-5 py-2" style="border-radius:5px">DELETED STUDENT</h2>
                    </div>
                   
                    @if(Session::has('info'))

                     <p class="alert alert-info mx-5 mt-3">{{ Session::get('info') }} <button class="close" data-dismiss="alert"> &times; </button> </p>

                    @endif()

                    @if(Session::has('danger'))

                     <p class="alert alert-danger mx-5 mt-3">{{ Session::get('danger') }} <button class="close" data-dismiss="alert"> &times; </button> </p>

                    @endif()

                    <div class="card-body">

                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-dark ml-2" href="{{ route('student.restoreAll') }}">Restore All <i class="fas fa-trash-restore-alt"></i> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-danger ml-2" href="{{ route('student.deleteAll') }}">Delete All <i class="far fa-trash-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>  

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Deleted at</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($all_data as $data)
                                    <tr>
                                        <th scope="row">{{ $loop -> index + 1}}</th>
                                        <td>{{ $data -> name }}</td>
                                        <td>{{ $data -> uname }}</td>
                                        <td>{{ $data -> deleted_at }}</td>
                                        <td style="display:flex; flex-direction: column; justify-content: center; align-items:center">
                                            <img src="{{ URL::to('') }}/media/student_img/{{ $data->photo }}" alt="{{ $data->name }}" style="height:50px; width:50; border-radius:5px">
                                        </td>
                                        <td>
                                            <a href="{{ route('student.restore',  $data-> id) }}" class="btn btn-sm btn-success font-weight-bold"><i class="fas fa-trash-restore"></i> Restore</a>
                                            <a href="{{ route('student.deleteFromTrash', $data->id) }}" class="btn btn-sm btn-danger font-weight-bold">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>

                        <a href="{{ route('student.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> BACK</a>

                    </div>
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