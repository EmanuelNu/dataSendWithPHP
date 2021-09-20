<?php 
    //Almacenar variables.
    $connection = mysqli_connect("localhost", "root", "", "first_bd");
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $user = $_POST["user"];
    $password = $_POST["password"];
    $cellphone = $_POST["cellphone"];
    //Insertar variables en MySQL.
    $insert = "INSERT INTO user(name, surname, email, user, password, cellphone) VALUES ('$name',
    '$surname', '$email', '$user', '$password', '$cellphone')";
    //Verificar datos correspondientes.
    $email_verifier = mysqli_query($connection, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($email_verifier) > 0) {
        echo '<script>alert("El email introducido ya se encuentra registrado. Deseas recuperar tu cuenta?");
            window.history.go(-1);
            </script>';
        exit;
    }
    $user_verifier = mysqli_query($connection, "SELECT * FROM user WHERE user = '$user'");
    if (mysqli_num_rows($user_verifier) > 0) {
        echo '<script>alert("El usuario ya se encuentra registrado, por favor ingrese otro usuario.");
            window.history.go(-1);
            </script>';
        exit;
    }
    //Resultado de la validación y envío del formulario de registro.
    $result = mysqli_query($connection, $insert);
    if (!$result) {
        echo 'Error al registrarse.';
    } else {
        echo 'Usuario registrado correctamente!';
    }
    mysqli_close($connection);
?>