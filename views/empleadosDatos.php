<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes-datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="background-color: #FFFDFB;">
    <div class="container-fluid" style="margin-top:16px">
        <div class="card">
            <div class="card-header text-center" style="font-size: 19px; font-weight: bold; background-color:#C0EDFF ">
                Empleados registrados
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">DUI</th>
                        <th scope="col">NIT</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Teléfono móvil</th>
                        <th scope="col">Teléfono fijo</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Años trabajados</th>
                        <th scope="col">Dependencia</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Funciones</th>
                        <th scope="col">+18</th>
                        <th scope="col">Jubilación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        session_start();                         
                        //$_SESSION['estudiantes'] = array();
                        if(isset($_POST['eliminar'])){
                            $_SESSION['personal'] = array();
                        }
                        foreach($_SESSION['personal'] as $personal){
                            echo "
                            <tr>
                                <td>".$personal["nombre"]."</td>
                                <td>".$personal["apellido"]."</td>
                                <td>".$personal["dui"]."</td>
                                <td>".$personal["nit"]."</td>
                                <td>".$personal["direccion"]."</td>
                                <td>".$personal["correo"]."</td>
                                <td>".$personal["movil"]."</td>
                                <td>".$personal["fijo"]."</td>
                                <td>".$personal["sexo"]."</td>
                                <td>".$personal["fechaNacimiento"]."</td>
                                <td>".$personal["edad"]."</td>
                                <td>".$personal["codigo"]."</td>
                                <td>".$personal["aniosT"]."</td>
                                <td>".$personal["dependencia"]."</td>
                                <td>".$personal["salario"]."</td>
                                <td>".$personal["funciones"]."</td>
                                <td>".$personal["mayor"]."</td>
                                <td>".$personal["jubilar"]."</td>

                                </tr>    
                            
                            ";
                        }
                    ?>
                   
                </tbody>
            </table>
            <div class="d-grid gap-2 col-3 mx-auto" style="margin-bottom:15px">
            <form method="POST">
                <a href="personalAdm.php" class="btn btn-primary" type="button" name="regresar">Regresar</a>
                <button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>
            </form>
</div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>