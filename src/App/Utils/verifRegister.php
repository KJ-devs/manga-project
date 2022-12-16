<?php

namespace App\Utils;

class verifRegister {

    private array $errors = [];

    public function getErrors(): array
    {
        return $this->errors;
    }

    function verifEmail() {
        if (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "L'email n'est pas valide";
            
        }
        return $this->errors;
    }
    function verifPassword() {
        
        if (!preg_match('`[A-Z]`', $_POST['password'])) {
            $this->errors['password'] = "Le mot de passe doit contenir au moins une majuscule";
            
        }
        if (!preg_match('`[a-z]`', $_POST['password'])) {
            $this->errors['password'] = "Le mot de passe doit contenir au moins une minuscule";
            
        }

        if (!strlen($_POST['password']) > 6) {
            $this->errors['password'] = "Le mot de passe doit contenir au moins 6 caractères";
            
        }

        if (!preg_match('`[0-9]`',$_POST['password'])) {
            $this->errors['password'] = "Le mot de passe doit contenir au moins un chiffre";
            
        }
        if ((($_POST['password'])) != ($_POST['password_confirm'])) {
            $this->errors['password'] = "Les mots de passe ne correspondent pas";
            
        }
        return $this->errors;
    }
    function verifAddress() {
        
        if (!preg_match('`[0-9]`', $_POST['address'])) {
            $this->errors['address'] = "L'adresse doit contenir au moins un chiffre";
            
        }
        return $this->errors;
    }
    function verifCity() {
        
        if (!preg_match('`[A-Z]`', $_POST['city'])) {
            $this->errors['city'] = "La ville doit contenir au moins une majuscule";
            
        }
        return $this->errors;
    }
    function verifZipCode() {
        if (!preg_match ("~^[0-9]{5}$~",$_POST['zipCode'])) {
            $this->errors['zipCode'] = "Le code postal doit contenir 5 chiffres";

        }
        return $this->errors;
    }

    function verifRegister() {
        $this->verifEmail();
        $this->verifPassword();
        $this->verifAddress();
        $this->verifCity();
        $this->verifZipCode();
        return $this->errors;
    }
}
