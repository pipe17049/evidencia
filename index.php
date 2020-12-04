<?php





// Create connection

if (empty($_POST)){ //SI el vector POST esta limpio

    print "<script> console.log('No se han ingresado datos');
        </script>";
}

else if( count($_POST)==5 && $_POST['id']!="" &&  $_POST['fname']!="" && $_POST['lname']!="" &&  $_POST['age']!="" && $_POST['email']!="")
{ //SI no hay ninguno vacio

    $servername = "localhost";  //servidor
    $username = "root";         //usuario
    $password = "";             //password
    
    $conn = mysqli_connect($servername, $username, $password); //conexion con la base de datos
    if (!$conn) { //Si no hay conexion
        die('Could not connect: ' . mysql_error()); //Mata proceso
    }
    else{
        print "<script> console.log('Conexion exitosa'); 
        </script>";     //Imprimi en consolo Exitosa
    }

    $sql = "CREATE DATABASE DB_users"; //Guarda en la variable SQL un query de crear database

    if($conn->query($sql)){            // SI ejecuta el quert correctamente

        print "<script> console.log('Base de datos creada exitosamente');
        </script>";                 // Imprime en consoloa que se creo la base de datos

    }
    else{

        print "<script> console.log('Base de datos ya existente');
        </script>";                 // La base de datos existe
    } 
   

    $conn->select_db("DB_users");       //Seleccion de la base de datos
    $sql="CREATE TABLE datos_users(  
        id int NOT NULL unique primary key comment 'primary key',
        fname VARCHAR(30) COMMENT 'created name',
        lname VARCHAR(30)  COMMENT 'created time',
        age int comment 'created age',
        email VARCHAR(60) COMMENT 'create email'
      ) default charset utf8 ;";        //Query para creacion de la tabla 

    if($conn->query($sql)){             //Si ejecuta el query correctamente

        print "<script> console.log('Tabla creada exitosamente');
        </script>;";                    //Se crea la tabla correctamente
    }
    else{
        print "<script> console.log('Tabla existente');
        </script>";                     // La tabla existe
    }

    //Asignar el arreglo POST a cada una variable
    $NumID = $_POST['id'];
    $firtname= $_POST['fname'];
    $lstname = $_POST['lname'];
    $NumAge= $_POST['age'];
    $DirEmail= $_POST['email'];

    //Query de ingreso de datos
    $sql="INSERT INTO datos_users values('$NumID','$firtname','$lstname','$NumAge','$DirEmail');";
    $conn->query($sql);
    

    //Ejecucion script registro exitoso
    $scriptjavs = '<script> alert("Registro exitoso"); </script>';
    print $scriptjavs;

    //limpia variables
    $NumID = "";
    $firtname= "";
    $lstname = "";
    $NumAge= "";
    $DirEmail= "";

    //cierra conexion
    mysqli_close($conn);
}
else{
    $scriptjavs = '<script> alert("No ingreso toda la informacion"); </script>';
    print $scriptjavs;
}

$imprimir = '

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/evidencia/css/bootstrap.min.css">
    <style>
        .header {
            color : crimson;
            font-size: 40px;
            padding: 10px;
        }

        .bigicon {
            font-size: 35px;
            color: #36A0FF;
        }

        body {

            background-image: url("images/wp2701655-electronic-wallpaper.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .centered {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bot: 20px;
        }
        h2{
            color : crimson;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="POST" action="/evidencia/">
                        <fieldset>

                            <h2 class="text-center header"> Formulario </h2>
                            <div class="form-group centered">
                                
                                <div class="col-md-4 col-sm-5">
                                    <input id="NoId" name="id" type="number" placeholder="Ingrese su ID"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group centered">
                                
                                <div class="col-md-8">
                                    <input id="fname" name="fname" type="text" placeholder="First Name"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group centered">
                                
                                <div class="col-md-8">
                                    <input id="lname" name="lname" type="text" placeholder="Last Name"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group centered">
                                
                                <div class="col-md-8">
                                    <input id="age" name="age" type="number" placeholder="Age" class="form-control">
                                </div>
                            </div>

                            <div class="form-group centered">
                                
                                <div class="col-md-8">
                                    <input id="email" name="email" type="email" placeholder="Email" class="form-control">

                                </div>
                            </div>

                            <div class="form-group centered">
                                 
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    <input class="btn btn-dark btn-lg" type="reset" value="Reset">
                                </div>
                            </div>
                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/evidencia/js/jquery-3.5.1.min.js"></script>
    <script src="/evidencia/js/bootstrap.bundle.min.js"></script>
</body>

</html>
';

print $imprimir;
?>

