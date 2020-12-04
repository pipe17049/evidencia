<?php

$servername = "localhost";  //servidor
$username = "root";         //usuario
$password = "";             //password

$conn = mysqli_connect($servername, $username, $password); //conexion con la base de datos
/*
if (!$conn) { //Si no hay conexion
    die('Could not connect: ' . mysql_error()); //Mata proceso
}
else{
    print "<script> console.log('Conexion exitosa'); 
    </script>";     //Imprimi en consolo Exitosa
}
*/
$conn->select_db("DB_users");  

$sql = "SELECT * FROM datos_users"; //Guarda en la variable SQL un query de crear database
//$result=mysqli_query($conn,"SELECT id FROM datos_users");
$result=mysqli_query($conn,$sql);

print('

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/evidencia/css/bootstrap.min.css">

</head>

<body>
    <h1 class="text-center"> Tabla Salida</h1>
    <div class="container">

        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Edad</th>
                <th scope="col">Email</th>
                </tr>
            </thead>');

while($mostrar = mysqli_fetch_array($result)){

    
    print ('
    
            <tbody>
                <tr>
                <th scope="row">'.$mostrar['id'].'</th>
                <td>'.$mostrar['fname'].'</td>
                <td>'.$mostrar['lname'].'</td>
                <td>'.$mostrar['age'].'</td>
                <td>'.$mostrar['email'].'</td>
                </tr>
 ');
};               
print ('  
            </tbody>
        </table>

    <script src="/evidencia/js/jquery-3.5.1.min.js"></script>
    <script src="/evidencia/js/bootstrap.bundle.min.js"></script>
</body>
<div class="centered">
    <div class="col-md-6 text-center">
        <a class="btn btn-warning btn-lg" href="index.php">New Discussion</a>
    </div>
</div>
');
mysqli_close($conn);
?>