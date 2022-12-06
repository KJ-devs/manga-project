<?php

namespace App\Utils;

class verifRegister {

    function verifEmail($errors) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email n'est pas valide";
            
        }
        return $errors;
    }
    function verifPassword($errors) {
        
        if (!preg_match('`[A-Z]`', $_POST['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins une majuscule";
            
        }
        if (!preg_match('`[a-z]`', $_POST['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins une minuscule";
            
        }

        if (!strlen($_POST['password']) > 6) {
            $errors[] = "Le mot de passe doit contenir au moins 6 caractères";
            
        }

        if (!preg_match('`[0-9]`', $_POST['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins un chiffre";
            
        }
        if ($_POST['password'] != $_POST['password_confirm']) {
            $errors[] = "Les mots de passe ne correspondent pas";
            
        }
        return $errors;
    }
}
