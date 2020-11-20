<?php
session_start();
require_once "functions.php";

$inputEmail = get_user_by_email($email);

if(!empty($inputEmail)) {
    set_flash_message("alert","Уведомление! Этот эл. адрес уже занят другим пользователем.");
    redirect_to("Location: /taskI_1/page_register.php");
   exit;
}

else {
    set_flash_message("add_user","Регистрация успешна");
    add_user ($email, $password);
    redirect_to("Location: /taskI_1/page_login.php");
}





