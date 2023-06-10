<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.min.css') }}">
    <title>T.S.I. - Manager</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row vw-50 d-flex flex-column align-items-center vh-100">
            <div class="col d-flex justify-content-around align-items-center">
                <h2>¡Bienvenido/a! Elige un perfil para comenzar:</h2>
            </div>
            <div class="col d-flex justify-content-around text-center">
                <a href="{{ route('estudiante.propuestas.index') }}" style="color:black;text-decoration:none">
                    <img src="{{ asset('images/estudiante.png') }}" alt="Estudiante" width="160">
                    <h4 class="mt-4">Estudiante</h5>
                </a>
                <a href="{{ route('profesores.index') }}" style="color:black;text-decoration:none">
                    <img src="{{ asset('images/profesor.png') }}" alt="Profesor" width="160">
                    <h4 class="mt-4">Profesor</h5>
                </a>
                <a href="{{ route('admin.index') }}" style="color:black;text-decoration:none">
                    <img src="{{ asset('images/admin.png') }}" alt="Admin" width="160">
                    <h4 class="mt-4">Admin</h5>
                </a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

