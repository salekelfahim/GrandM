<?php
/**
 * Authentication Functions
 *
 * Handles login and registration logic
 *
 * @package Le_Grand_Marche
 */

// Register user
function lgm_process_registration() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lgm_register_nonce']) && wp_verify_nonce($_POST['lgm_register_nonce'], 'lgm_register_action')) {
        $errors = [];

        $username   = sanitize_user($_POST['username']);
        $email      = sanitize_email($_POST['email']);
        $password   = $_POST['password'];
        $confirm_pw = $_POST['confirm_password'];

        if (empty($username) || empty($email) || empty($password) || empty($confirm_pw)) {
            $errors[] = 'Tous les champs sont obligatoires.';
        }

        if (!is_email($email)) {
            $errors[] = "Email invalide.";
        }

        if (username_exists($username)) {
            $errors[] = "Ce nom d'utilisateur est déjà utilisé.";
        }

        if (email_exists($email)) {
            $errors[] = "Cette adresse email est déjà utilisée.";
        }

        if ($password !== $confirm_pw) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }

        if (empty($errors)) {
            $user_id = wp_create_user($username, $password, $email);

            if (!is_wp_error($user_id)) {
                wp_set_current_user($user_id);
                wp_set_auth_cookie($user_id);
                wp_redirect(home_url('/my-account'));
                exit;
            } else {
                $errors[] = $user_id->get_error_message();
            }
        }

        return $errors;
    }
    
    return [];
}

// Login user
function lgm_process_login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lgm_login_nonce']) && wp_verify_nonce($_POST['lgm_login_nonce'], 'lgm_login_action')) {
        $errors = [];

        $username = sanitize_user($_POST['username']);
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $errors[] = "Nom d'utilisateur et mot de passe sont requis.";
        }

        if (empty($errors)) {
            $creds = [
                'user_login'    => $username,
                'user_password' => $password,
                'remember'      => true
            ];

            $user = wp_signon($creds, is_ssl());

            if (is_wp_error($user)) {
                $errors[] = "Identifiants incorrects. Veuillez vérifier votre nom d'utilisateur/email et mot de passe.";
            } else {
                wp_redirect(home_url('/my-account'));
                exit;
            }
        }

        return $errors;
    }
    
    return [];
}