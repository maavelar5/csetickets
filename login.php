<!DOCTYPE html>
<html>
    <?php
    require('db.php');
    if ($_POST['usuario'] && $_POST['secreto']) {
        extract($_POST);
        
        if ($secreto == 'csetickets') {
            connect();

            $result = mysqli_query ($conn , "SELECT * FROM usuario WHERE usuario='$usuario'");
            $user_data = mysqli_fetch_array($result);

            disconnect();

            if ($user_data) {
                setcookie('user_data',serialize($user_data), time() + (86400 * 365),'/');
                header('Location: home.php');
            }
        }
    }
    ?>

    <?php require('head.php'); ?>
    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4 login">
                        <form method="POST"
                              action="/login.php">
                            <label>Usuario</label>
                            <input type="text"
                                   class="form-control"
                                   name="usuario">

                            <label>Secreto</label>
                            <input type="password"
                                   class="form-control"
                                   name="secreto">

                            <button type="submit"
                                    class="btn btn-success float-right"
                                    style="margin-top: 5px;">
                                Entrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require('foot.php'); ?>
    </body>
</html>
