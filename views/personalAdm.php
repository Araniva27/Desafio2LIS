<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar personal-Colegio Cristobal Colón</title>
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
                    <a class="nav-link" href="index.php">Registrar estudiante</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="docentes.php">Registrar docente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="personalAdm.php">Registrar personal administrativo</a>
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
    require_once '../helpers/personalAdm.php';

    if (!isset($_SESSION['personal'])) {
        $_SESSION['personal'] = array();
    }

    if (isset($_POST['ingresar'])) {
        $personal = new PersonalAdm();
        if ($personal->setNombre($_POST['nombre'])) {
            if ($personal->setApellido($_POST['apellidos'])) {
                if ($personal->setFechaNacimiento($_POST['fecha'])) {
                    $edad = $personal->calcularEdad($personal->getFechaNacimiento());
                    if ($personal->esMayorEdad($edad)) {
                        if ($personal->setDui($_POST['dui'])) {
                            if ($personal->setNit($_POST['nit'])) {
                                if ($personal->setDireccion($_POST['direccion'])) {
                                    if ($personal->setTelefonoMovil($_POST['movil'])) {
                                        if ($personal->setCorreo($_POST['correo'])) {
                                            if ($personal->setSexo($_POST['sexo'])) {
                                                if ($personal->setTelefonoFijo($_POST['fijo'])) {
                                                    if ($personal->setSalarioMensual($_POST['salario'])) {
                                                        if ($personal->setDependencias($_POST['dependencia'])) {
                                                            if ($personal->setAniosTrabajados($_POST['anios'])) {
                                                                $jubilacion = $personal->getAniosTrabajados();
                                                                if ($personal->jubilacion($jubilacion)) {
                                                                    var_dump($jubilacion);
                                                                    $codigoEmpleado = $personal->generarCodigo();
                                                                    if ($personal->setcodigoEmpleado($codigoEmpleado)) {
                                                                        if ($personal->setFunciones($_POST['funcion'])) {
                                                                            $personal->setMayorEdad(1);
                                                                            if($jubilacion>=30){
                                                                                $personal->setjubilar(1);
                                                                            }else{
                                                                                $personal->setjubilar(0);
                                                                            }
                                                                            $personalArray = array(
                                                                                "nombre" => $personal->getNombre(),
                                                                                "apellido" => $personal->getApellido(),
                                                                                "dui" => $personal->getDui(),
                                                                                "nit" => $personal->getNit(),
                                                                                "direccion" => $personal->getDireccion(),
                                                                                "correo" => $personal->getCorreo(),
                                                                                "movil" => $personal->getTelefonoMovil(),
                                                                                "fijo" => $personal->getTelefonoFijo(),
                                                                                "sexo" => $personal->getSexo(),
                                                                                "fechaNacimiento" => $personal->getFechaNacimiento(),
                                                                                "edad" => $edad,
                                                                                "dependencia" => $personal->getDependencias(),
                                                                                "salario" => $personal->getSalarioMensual(),
                                                                                "funciones" => $personal->getFunciones(),
                                                                                "aniosT" => $personal->getAniosTrabajados(),
                                                                                "codigo" => $codigoEmpleado,
                                                                                "mayor"=>$personal->getMayorEdad(),
                                                                                "jubilar"=>$personal->getjubilar(),
                                                                            );
                                                                            $personal->agregarEmpleado($personalArray);
                                                                        } else {
                                                                            echo "
                                                                                <div class='container-fluid'>
                                                                                    <div class='row'>
                                                                                        <div class='alert alert-warning' role='alert'>
                                                                                            Error al asignar funciones
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
                                                                                        Error al generar codigo del empleado
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        ";
                                                                    }
                                                                } else {
                                                                    /* echo "
                                                                        <div class='container-fluid'>
                                                                            <div class='row'>
                                                                                <div class='alert alert-warning' role='alert'>
                                                                                    Error al generar jubilacion
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    ";*/

                                                                    $codigoEmpleado = $personal->generarCodigo();
                                                                    if ($personal->setcodigoEmpleado($codigoEmpleado)) {
                                                                        if ($personal->setFunciones($_POST['funcion'])) {
                                                                            $personal->setMayorEdad(1);
                                                                            if($jubilacion>=30){
                                                                                $personal->setjubilar(1);
                                                                            }else{
                                                                                $personal->setjubilar(0);
                                                                            }
                                                                            $personalArray = array(
                                                                                "nombre" => $personal->getNombre(),
                                                                                "apellido" => $personal->getApellido(),
                                                                                "dui" => $personal->getDui(),
                                                                                "nit" => $personal->getNit(),
                                                                                "direccion" => $personal->getDireccion(),
                                                                                "correo" => $personal->getCorreo(),
                                                                                "movil" => $personal->getTelefonoMovil(),
                                                                                "fijo" => $personal->getTelefonoFijo(),
                                                                                "sexo" => $personal->getSexo(),
                                                                                "fechaNacimiento" => $personal->getFechaNacimiento(),
                                                                                "edad" => $edad,
                                                                                "dependencia" => $personal->getDependencias(),
                                                                                "salario" => $personal->getSalarioMensual(),
                                                                                "funciones" => $personal->getFunciones(),
                                                                                "aniosT" => $personal->getAniosTrabajados(),
                                                                                "codigo" => $codigoEmpleado,
                                                                                "mayor"=>$personal->getMayorEdad(),
                                                                                "jubilar"=>$personal->getjubilar(),
                                                                            );
                                                                            $personal->agregarEmpleado($personalArray);
                                                                        } else {
                                                                            echo "
                                                                                <div class='container-fluid'>
                                                                                    <div class='row'>
                                                                                        <div class='alert alert-warning' role='alert'>
                                                                                            Error al asignar funciones
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
                                                                                        Error al generar codigo del empleado
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        ";
                                                                    }
                                                                }
                                                            } else {
                                                                echo "
                                                                    <div class='container-fluid'>
                                                                        <div class='row'>
                                                                            <div class='alert alert-warning' role='alert'>
                                                                                Error al asignar anios
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
                                                                            Error al asignar dependencia
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
                                                                        Error al asignar salario
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
                                                                    Error al asignar teléfono fijo
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
                                                                Error al asignar sexo
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
                                                            Error al asignar correo
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
                                                        Error al asignar teléfono móvil
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
                                                    Error al asignar dirección
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
                                                Error al asignar NIT
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
                                            Error al ingresar el DUI, verifique formato
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
                                        No se admiten empleados menores de edad
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
                Registro de personal administrativo
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
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Dirección:</label>
                                    <textarea class="form-control" placeholder="Ingrese su dirección" id="direccion" name="direccion"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Funciones que realiza:</label>
                                    <textarea class="form-control" placeholder="Ingrese las funciones que realiza" id="funcion" name="funcion"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Teléfono móvil:</label>
                                    <input type="text" class="form-control" id="movil" name="movil" placeholder="7896-3214">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Correo electrónico:</label>
                                    <input type="text" class="form-control" id="correo" name="correo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Sexo</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelectDisabled" name="sexo" aria-label="Floating label disabled select example">
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
                                    <input type="text" class="form-control" id="fijo" name="fijo" placeholder="7896-3214">
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
                                    <label for="exampleInputPassword1" class="form-label">Depencia:</label>
                                    <input type="text" class="form-control" id="dependecia" name="dependencia">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Salario mensual:</label>
                                    <input type="text" class="form-control" id="salario" name="salario" step="0.01">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Años trabajados:</label>
                                    <input type="text" class="form-control" id="anios" name="anios">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit" name="ingresar">Ingresar</button>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:10px">
                            <a href="empleadosDatos.php" class="btn btn-success" type="submit" name="listado">Listado de personal administrativo</a>
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