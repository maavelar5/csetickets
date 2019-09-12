<!DOCTYPE html>
<html>
    <?php require('db.php'); ?>
    <?php require('head.php'); ?>

    <?php
    $user_data = NULL;

    if (isset($_COOKIE['user_data'])) {
        $user_data = unserialize($_COOKIE['user_data']);
    }

    if (!$user_data) {
        header('Location: /');
        exit;
    }
    else if ($_POST['tipo']) {
        extract($_POST);

        $user_id = $user_data['id'];
        $report_query = "insert into reporte (usuario_id, tipo, comentarios, status) values ($user_id, '$tipo', '$comentarios', 'creado')";

        connect();
        mysqli_query ($conn, $report_query);        
        disconnect();

        $success = true;
    }
    ?>

    <body>
        <div class="container">
            <?php require('navbar.php'); ?>
            <div class="col-md-12">
                <div class="row justify-content-center align-items-center">
                    <?php if ($success) { ?>
                        <div id="success-alert"
                             class="alert alert-success alert-dismissible fade show"
                             role="alert">
                            <strong>Exito!</strong> reporte generado.
                            <button type="button"
                                    class="close"
                                    data-dismiss="alert"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-2 card"
                         data-id="computadora"
                         data-toggle="modal"
                         data-target="#exampleModal">
                        Computadora
                    </div>
                    <div class="col-lg-2 card"
                         data-id="impresora"
                         data-toggle="modal"
                         data-target="#exampleModal">
                        Impresora
                    </div>
                    <div class="col-lg-2 card"
                         data-id="inmobiliario"
                         data-toggle="modal"
                         data-target="#exampleModal">
                        Inmobiliario
                    </div>
                    <div class="col-lg-2 card"
                         data-id="consumibles"
                         data-toggle="modal"
                         data-target="#exampleModal">
                        Consumibles
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade"
             id="exampleModal"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">
                            Comentarios adicionales
                        </h5>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    <form method="POST"
                          action="/home.php">
                        <input type="hidden"
                               id="tipo"
                               name="tipo">
                        <div class="modal-body">
                            <textarea name="comentarios"
                                      class="form-control"
                                      rows="5" id="comment">
                            </textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">
                                Cerrar
                            </button>
                            <button type="submit"
                                    class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require('foot.php'); ?>
    </body>        
</html>
