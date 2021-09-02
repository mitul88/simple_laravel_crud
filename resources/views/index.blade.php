<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School CRUD database</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
    <section class="main center">
        <div class="center-box">
            <h1>A BASIC SCHOOL DATABASE</h1>
            <div class="btn-case">
                <a href="{{ route('student.index') }}" class="btn btn-green">Students</a>
                <a href="{{ route('teacher.index') }}" class="btn btn-blue">Teachers</a>
                <a href="{{ route('staff.index') }}" class="btn btn-orange">Staffs</a>
            </div>
        </div>
    </section>
</body>
</html>