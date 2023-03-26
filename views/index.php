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

    <?php
    session_start();
    require_once '../helpers/validator.php';
    require_once '../helpers/persona.php';
    require_once '../helpers/estudiantes.php';

    if (!isset($_SESSION['estudiantes'])) {
        $_SESSION['estudiantes'] = array();
    }

    if (isset($_POST['ingresar'])) {
        $estudiante = new Estudiantes();
        if ($estudiante->setNombre($_POST['nombre'])) {
            if ($estudiante->setApellido($_POST['apellidos'])) {
                if ($estudiante->setFechaNacimiento($_POST['fecha'])) {
                    $edad = $estudiante->calcularEdad($estudiante->getFechaNacimiento());
                    if ($estudiante->esMayorEdad($edad)) {
                        if ($estudiante->setDui($_POST['dui'])) {
                            if ($estudiante->setNit($_POST['nit'])) {
                                if ($estudiante->setDireccion($_POST['direccion'])) {
                                    if ($estudiante->setTelefonoMovil($_POST['movil'])) {
                                        if ($estudiante->setCorreo($_POST['correo'])) {
                                            if ($estudiante->setSexo($_POST['sexo'])) {
                                                if ($estudiante->setTelefonoFijo($_POST['fijo'])) {                                                   
                                                    $nota1=$_POST['nota1'];
                                                    $nota2=$_POST['nota2'];
                                                    $nota3=$_POST['nota3'];
                                                    $notas = array($nota1,$nota2,$nota3);
                                                    if($estudiante->setCalificaciones($notas)){
                                                        $promedio = $estudiante->calcularNotaPromedio($notas);
                                                        if($estudiante->setNotaPromedio($promedio)){
                                                            $codigoEstudiante = $estudiante->generarCodigo();
                                                            if($estudiante->setCodigoEstudiante($codigoEstudiante)){
                                                                if($edad>18){
                                                                    $estudiante->setMayorEdad(1);
                                                                }else{
                                                                    $estudiante->setMayorEdad(0);
                                                                }
                                                                $estudianteArray = array(
                                                                    "nombre"=>$estudiante->getNombre(),
                                                                    "apellido"=>$estudiante->getApellido(),
                                                                    "dui"=>$estudiante->getDui(),
                                                                    "nit"=>$estudiante->getNit(),
                                                                    "direccion"=>$estudiante->getDireccion(),
                                                                    "correo"=>$estudiante->getCorreo(),
                                                                    "movil"=>$estudiante->getTelefonoMovil(),
                                                                    "fijo"=>$estudiante->getTelefonoFijo(),
                                                                    "sexo"=>$estudiante->getSexo(),
                                                                    "nacimiento"=>$estudiante->getFechaNacimiento(),
                                                                    "edad"=>$edad,
                                                                    "promedio"=>$promedio,
                                                                    "codigo"=>$codigoEstudiante,
                                                                    "mayor"=>$estudiante->getMayorEdad(),
                                                                );
                                                                //array_push($_SESSION['estudiantes'],$estudianteArray);                                                               
                                                                $estudiante->agregarEstudiante($estudianteArray);
                                                                echo "
                                                                <div class='container'>
                                                                    <div class='row'>
                                                                        <div class='alert alert-success' role='alert'>
                                                                            Estudiante registrado correctamente
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ";             
                                                            }else{
                                                                echo "
                                                                <div class='container'>
                                                                    <div class='row'>
                                                                        <div class='alert alert-warning' role='alert'>
                                                                            Error al asignar codigo del estudiante
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ";                                                        
                                                            }
                                                                
                                                        }else{
                                                            echo "
                                                                <div class='container'>
                                                                    <div class='row'>
                                                                        <div class='alert alert-warning' role='alert'>
                                                                            Error al asignar nota promedio
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }
                                                    }else{
                                                        echo "
                                                            <div class='container'>
                                                                <div class='row'>
                                                                    <div class='alert alert-warning' role='alert'>
                                                                        Error al asignar notas
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }    
                                                } else {
                                                    echo "
                                                        <div class='container'>
                                                            <div class='row'>
                                                                <div class='alert alert-warning' role='alert'>
                                                                    Error al asignar el teléfono fijo
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                                                }
                                            } else {
                                                echo "
                                                    <div class='container'>
                                                        <div class='row'>
                                                            <div class='alert alert-warning' role='alert'>
                                                                Error al asignar el sexo del estudiante
                                                            </div>
                                                        </div>
                                                    </div>
                                                ";
                                            }
                                        } else {
                                            echo "
                                                <div class='container'>
                                                    <div class='row'>
                                                        <div class='alert alert-warning' role='alert'>
                                                            Error al asignar el correo
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                    } else {
                                        echo "
                                        <div class='container'>
                                            <div class='row'>
                                                <div class='alert alert-warning' role='alert'>
                                                    Error al asignar el teléfono móvil
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                    }
                                } else {
                                    echo "
                                        <div class='container'>
                                            <div class='row'>
                                                <div class='alert alert-warning' role='alert'>
                                                    Error al asignar dirección
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }
                            } else {
                                echo "
                                    <div class='container'>
                                        <div class='row'>
                                            <div class='alert alert-warning' role='alert'>
                                                Error al asignar NIT
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        } else {
                            echo "
                                    <div class='container'>
                                        <div class='row'>
                                            <div class='alert alert-warning' role='alert'>
                                                El estudiante es mayor de edad debe de tener DUI
                                            </div>
                                        </div>
                                    </div>
                                ";
                        }
                    } else {
                        if ($estudiante->setDui('00000000-0')) {
                            if ($estudiante->setNit($_POST['nit'])) {
                                if ($estudiante->setDireccion($_POST['direccion'])) {
                                    if ($estudiante->setTelefonoMovil($_POST['movil'])) {
                                        if ($estudiante->setCorreo($_POST['correo'])) {
                                            if ($estudiante->setSexo($_POST['sexo'])) {
                                                if ($estudiante->setTelefonoFijo($_POST['fijo'])) {
                                                    /*if($edad>=18){
                                                        $estudiante->setMayorEdad(1);
                                                    }else{
                                                        $estudiante->setMayorEdad(0);
                                                        $estudiante->setDui('00000000-0');
                                                    }*/
                                                    $nota1=$_POST['nota1'];
                                                    $nota2=$_POST['nota2'];
                                                    $nota3=$_POST['nota3'];
                                                    $notas = array($nota1,$nota2,$nota3);
                                                    if($estudiante->setCalificaciones($notas)){
                                                        $promedio = $estudiante->calcularNotaPromedio($notas);
                                                        if($estudiante->setNotaPromedio($promedio)){
                                                            $codigoEstudiante = $estudiante->generarCodigo();
                                                            if($estudiante->setCodigoEstudiante($codigoEstudiante)){
                                                                if($edad>18){
                                                                    $estudiante->setMayorEdad(1);
                                                                }else{
                                                                    $estudiante->setMayorEdad(0);
                                                                }
                                                                $estudianteArray = array(
                                                                    "nombre"=>$estudiante->getNombre(),
                                                                    "apellido"=>$estudiante->getApellido(),
                                                                    "dui"=>$estudiante->getDui(),
                                                                    "nit"=>$estudiante->getNit(),
                                                                    "direccion"=>$estudiante->getDireccion(),
                                                                    "correo"=>$estudiante->getCorreo(),
                                                                    "movil"=>$estudiante->getTelefonoMovil(),
                                                                    "fijo"=>$estudiante->getTelefonoFijo(),
                                                                    "sexo"=>$estudiante->getSexo(),
                                                                    "nacimiento"=>$estudiante->getFechaNacimiento(),
                                                                    "edad"=>$edad,
                                                                    "promedio"=>$promedio,
                                                                    "codigo"=>$codigoEstudiante,
                                                                    "mayor"=>$estudiante->getMayorEdad(),
                                                                );
                                                                //array_push($_SESSION['estudiantes'],$estudianteArray);                                                               
                                                                $estudiante->agregarEstudiante($estudianteArray);
                                                                echo "
                                                                <div class='container'>
                                                                    <div class='row'>
                                                                        <div class='alert alert-success' role='alert'>
                                                                            Estudiante registrado correctamente
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ";             
                                                            }else{
                                                                echo "
                                                                <div class='container'>
                                                                    <div class='row'>
                                                                        <div class='alert alert-warning' role='alert'>
                                                                            Error al asignar codigo del estudiante
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ";                                                        
                                                            }
                                                                
                                                        }else{
                                                            echo "
                                                                <div class='container'>
                                                                    <div class='row'>
                                                                        <div class='alert alert-warning' role='alert'>
                                                                            Error al asignar nota promedio
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }
                                                    }else{
                                                        echo "
                                                            <div class='container'>
                                                                <div class='row'>
                                                                    <div class='alert alert-warning' role='alert'>
                                                                        Error al asignar notas
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }    
                                                } else {
                                                    echo "
                                                        <div class='container'>
                                                            <div class='row'>
                                                                <div class='alert alert-warning' role='alert'>
                                                                    Error al asignar el teléfono fijo
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                                                }
                                            } else {
                                                echo "
                                                    <div class='container'>
                                                        <div class='row'>
                                                            <div class='alert alert-warning' role='alert'>
                                                                Error al asignar el sexo del estudiante
                                                            </div>
                                                        </div>
                                                    </div>
                                                ";
                                            }
                                        } else {
                                            echo "
                                                <div class='container'>
                                                    <div class='row'>
                                                        <div class='alert alert-warning' role='alert'>
                                                            Error al asignar el correo
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                    } else {
                                        echo "
                                        <div class='container'>
                                            <div class='row'>
                                                <div class='alert alert-warning' role='alert'>
                                                    Error al asignar el teléfono móvil
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                    }
                                } else {
                                    echo "
                                        <div class='container'>
                                            <div class='row'>
                                                <div class='alert alert-warning' role='alert'>
                                                    Error al asignar dirección
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }
                            } else {
                                echo "
                                    <div class='container'>
                                        <div class='row'>
                                            <div class='alert alert-warning' role='alert'>
                                                Error al asignar NIT
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        } else {
                            echo "
                                    <div class='container'>
                                        <div class='row'>
                                            <div class='alert alert-warning' role='alert'>
                                                El estudiante es mayor de edad debe de tener DUI
                                            </div>
                                        </div>
                                    </div>
                                ";
                        }
                    }
                } else {
                    echo "
                            <div class='container'>
                                <div class='row'>
                                    <div class='alert alert-warning' role='alert'>
                                     La fecha de nacimiento no debe de ser vacio
                                    </div>
                                </div>
                            </div>
                        ";
                }
            } else {
                echo "
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='alert alert-warning' role='alert'>
                                El apellido no debe de ser vacio
                            </div>
                        </div>
                    </div>
                ";
            }
        } else {
            echo "
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='alert alert-warning' role='alert'>
                                El nombre no debe de ser vacio
                            </div>
                        </div>
                    </div>
                ";
        }
    }


    ?>
    <div class="container-fluid" style="margin-top:16px">
        <div class="card">
            <div class="card-header text-center" style="font-size: 19px; font-weight: bold;">
                Registro de estudiantes
            </div>
            <div class="card-body">
                <div class="container-fluid" style="margin-top:10px">
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nombres:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Apellidos:</label>
                                    <input type="text" class="form-control" id="apellido" name="apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">DUI:</label>
                                    <input type="text" class="form-control" id="dui" name="dui" placeholder="Ej. 00000000-0">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">NIT:</label>
                                    <input type="text" class="form-control" id="nit" name="nit" placeholder="Ej. 0000-000000-000-0">
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
                                    <input type="text" class="form-control" id="movil" name="movil" placeholder="Ej. 7896-3241">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Correo electrónico:</label>
                                    <input type="email" class="form-control" id="correo" name="correo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Sexo</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example" name="sexo">
                                            <option selected>Seleccionar sexo</option>
                                            <option value="M">Maculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Teléfono fijo:</label>
                                    <input type="text" class="form-control" id="fijo" name="fijo" placeholder="Ej. 7896-3241">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento:</label>
                                <div class="col-sm-12" style="align-items: center;">
                                    <input type="date" name="fecha" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Calificación 1:</label>
                                    <input type="number" class="form-control" id="nota1" name="nota1" step="0.1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Calificación 2:</label>
                                    <input type="number" class="form-control" id="nota2" name="nota2" step="0.1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Calificación 3:</label>
                                    <input type="number" class="form-control" id="nota3" name="nota3" step="0.1">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit" name="ingresar">Ingresar</button>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto" style = "margin-top:10px">
                            <a href="estudiantesDatos.php" class="btn btn-success" type="submit" name="listado">Listado de estudiantes</a>
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