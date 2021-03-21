<?php 
    session_start();
    require('viewCreateArticle.php');
    ob_start();
   
    ?>
    <div id="connectingForm">
        <form action="#" method="POST">
            <div class="col-12 mt-5">
                <div class="mb-3 col-3  mx-auto">
                    <label for="exampleInputId"  class="form-label">Identifiant</label>
                    <input type="text" name="id" class="form-control" id="exampleInputId">
                </div>
                <div class="mb-3 col-3 mx-auto">
                    <label for="exampleInputPassword1"  class="form-label">Mot de passe</label>
                    <input type="password" name ="pswd" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-flex justify-content-center mt-4">
                <input type="submit" />
                </div>
            </div>
        </form>
    </div>

    <?php
        $viewLoggin  = ob_get_clean();
        $contenu = "";
        require_once('template.php');
        echo $viewLoggin;

        if(isset($_POST['id']) && isset($_POST['pswd'])){

            $username = $_POST['id'];
            $password = $_POST['pswd'];
            
            if (password_verify($password, $admin['password']) && $username === $admin['identifiant']){

                $_SESSION["identify"] = $username;
                $_SESSION["mdp"] = $password;

                if($_SESSION["identify"] === $admin['identifiant'] && $_SESSION["mdp"] === password_verify($_SESSION["mdp"], $admin['password'])){

    ?>
                    <style type="text/css">
                        #connectingForm{
                            display: none;
                        }
                    </style>
    <?php
                    echo "Vous êtes connecté";
                    $contenu = $createArticle;
                    echo $contenu;
                }else {
                    echo "Identifiant et / ou mot de passe erroné";
                };
            };
        };
    ?>
