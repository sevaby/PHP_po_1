<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];



function get_user_by_email($email){
    $pdo = new PDO("mysql:host=localhost;dbname=my_project;","root", "root");
    $email = $_POST['email'];

    $sql = "SELECT * FROM email WHERE email = (:email)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $res = $statement->fetch(PDO::FETCH_ASSOC);
    return $res;
}

function add_user ($email, $password){
    $pdo = new PDO("mysql:host=localhost;dbname=my_project;","root", "root");
    $sql = "INSERT INTO email (email, password) VALUE( '$email', '$password')";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $_SESSION['add_user'] = 'Регистрация успешна';

    header("Location: /taskI_1/page_login.php");
}


if(!empty(get_user_by_email($email))) {
       $_SESSION['alert'] = "Уведомление! Этот эл. адрес уже занят другим пользователем.";
   header("Location: /taskI_1/page_register.php");
   exit;
}

else {
    add_user ($email, $password);
}




