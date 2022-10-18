<?php
class Security extends Crud{
    // Permet à l'utilisateur de se connecter table par défaut users
    static function connexion(string $mail, string $mdp, $redirect = "#"){
        // Regénération du token
        self::regenererToken();

        // Instantiation de l'object
        $crud = new Crud();

        // Néttoyage des input
        $mail_clean = htmlspecialchars($mail);
        $mdp_clean = htmlspecialchars($mdp);

        // Récupération de l'utilisateur
        $user = $crud->readOneLine("SELECT * FROM users WHERE mail = :mail", [
            ":mail" => $mail_clean
        ]);

        // Vérifie le mot de passe
        $password_verified = password_verify($mdp_clean, $user->mdp);

        // Si le mdp est correct on démarre la session
        if ($password_verified === true) {
            $_SESSION["user_connected"] = $user;
            Config::getRedirection($redirect);
            return true;
        }else{
            Config::getRedirection(Params::$page_default);
            return false;
        }
    }

    // Permet de se déconnecter de la session en cours
    static function deconnexion(){
        session_start();
        session_destroy();
        Config::getRedirection(Params::$page_default);
    }
    //////////////////////////////////////////////////////////////////////////////////////
                                            //CSRF//
    //////////////////////////////////////////////////////////////////////////////////////
    // Permet de générer un token et le mettre en session
    static function regenererToken(): string {
        return $_SESSION['token'] = hash('sha256', random_bytes(32));
    }

    // Si la vérification ne donne pas true sur l'input csrf c'est qu'il y a une fraude
    static function verifierToken(string $token): bool {
        return ($_SESSION["token"] === $token);
    }

    // Faille Upload renvoie true si tout est bon
    static function fileUpload(string $file_write){
        $file = explode(".", trim($_FILES[$file_write]["name"]));

        if ($_FILES[$file_write]["type"] === "image/png" | $_FILES[$file_write]["type"] === "image/webp" | $_FILES[$file_write]["type"] === "image/jpeg" | !isset($file[2]) | !empty($file[2])) {
            $fichier_existant = file_exists("public/assets/upload/" . $_FILES[$file_write]['name']);
            if ($fichier_existant === false) {
                move_uploaded_file($_FILES[$file_write]["tmp_name"], "public/assets/upload/" . $_FILES[$file_write]['name']);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}