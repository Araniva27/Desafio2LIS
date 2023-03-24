<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar estudiantes-Colegio Cristobal Colón</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Colegio Cristobal Colón</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Registrar estudiante</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="docentes.php">Registrar docente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="personalAdm.php">Registrar personal administrativo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body style="background-color: #FFFDFB;">
    <div class="container-fluid" style="margin-top:16px">
        <div class="card">
            <div class="card-header text-center" style="font-size: 19px; font-weight: bold;">
                Registro de estudiantes
            </div>
            <div class="card-body">
                <div class="container-fluid" style="margin-top:10px">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nombres:</label>
                                    <input type="password" class="form-control" id="nombre" name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Apellidos:</label>
                                    <input type="password" class="form-control" id="apellido" name="apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">DUI:</label>
                                    <input type="password" class="form-control" id="dui" name="dui">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">NIT:</label>
                                    <input type="password" class="form-control" id="nit" name="nit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Dirección:</label>
                                    <textarea class="form-control" placeholder="Ingrese su dirección" id="direccion" name="direccion"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Teléfono móvil:</label>
                                    <input type="password" class="form-control" id="movil" name="movil">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Correo electrónico:</label>
                                    <input type="password" class="form-control" id="correo" name="correo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Sexo</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example">
                                            <option selected>Seleccionar sexo</option>
                                            <option value="1">Maculino</option>
                                            <option value="2">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Teléfono fijo:</label>
                                    <input type="password" class="form-control" id="fijo" name="fijo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento:</label>
                                <div class="col-sm-12" style="align-items: center;">
                                    <input type="date" name="fecha" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Edad:</label>
                                    <input type="password" class="form-control" id="edad" name="edad">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Calificación 1:</label>
                                    <input type="password" class="form-control" id="nota1" name="nota1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Calificación 2:</label>
                                    <input type="password" class="form-control" id="nota2" name="nota2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Calificación 3:</label>
                                    <input type="password" class="form-control" id="nota3" name="nota3">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="button" name="ingresar">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>