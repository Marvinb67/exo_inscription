<?php
session_start();

if ($_GET['action']) {
    switch ($_GET['action']) {
        case "register":
            register($email, $pseudo, $password, $conf);
            break;
        case 'login':
            login($email, $password);
    }
}

function register($email, $pseudo, $password, $conf)
{
    if ($_POST['submit']) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $conf = filter_input(INPUT_POST, 'conf', FILTER_SANITIZE_STRING);

        if (array_search($email, array_column($_SESSION['users'], 'email'))) {
            $_SESSION['error'] = "Email existe deja";
            header('Location: index.php');
            die;
        } else {

            if ($email && $pseudo && $password) {
                $users = [
                    'email' => $email,
                    'pseudo' => $pseudo,
                    'password' => $password,
                ];

                $_SESSION['users'][] = $users;
                $_SESSION['error'] = "";

                header('Location: login.php');
                die;
            } elseif (!$email) {
                $_SESSION['error'] = "Veuillez entrer une email";
            } elseif (!$pseudo) {
                $_SESSION['error'] = "Veuillez entrer un pseudo";
            } elseif (!$password) {
                $_SESSION['error'] = "Veuillez entrer un mot de passe";
            } elseif (!$conf) {
                $_SESSION['error'] = "Confirmer votre mot de passe";
            } elseif ($conf == $password) {
                $_SESSION['error'] = "Les mot de passe ne correspondent pas";
            }

            header('Location: index.php');
            die;
        }
    }
}

function login($email, $password)
{
    if (isset($_POST['connexion'])) {
            $search = array_search($email, array_column($_SESSION['users'], 'email'));
            if($search){
                password_verify($password, $_SESSION['users'][$search]['password'])

            }
        }
    }


// template avec ob start ob get clean + login si pas login ou deconexio si ilogin