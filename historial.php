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
    else {
        $user_id = $user_data['id'];

        connect();
        if ($user_data['usuario'] == 'admin') {
            $query = "select * from reporte inner join usuario on usuario_id = usuario.id order by field(status,'creado','progreso','terminado','cancelado')";
        }
        else {
            $query = "select * from reporte where usuario_id='$user_id' order by field(status,'creado','progreso','terminado','cancelado')";
        }

        $result = mysqli_query($conn,$query);
        $rows = mysqli_fetch_all($result);
        disconnect();
    }

    ?>
    <body>
        <div class="container">
            <?php require('navbar.php'); ?>
            <div class="col-md-12">
                <div class="row justify-content-center align-items-center">
                    <table class="table table-sm table-bordered table-hover" style="background: white;">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">#</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Comentarios</th>
                                <?php if ($user_data["usuario"] == "admin") { ?>
                                    <th scope="col">Usuario</th>
                                <?php } ?>
                                <th scope="col">Status</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row) { ?>
                                <tr style="text-align: center;">
                                    <th id="<?php echo $row[0]; ?>"
                                        scope="row"
                                        style="width: 5%;">
                                        <?php echo $row[0]; ?>
                                    </th>
                                    <td style="width: 10%;">
                                        <?php 
                                        switch ($row[2]) {
                                            case 'computadora':
                                                echo '&#128187;';
                                                break;
                                            case 'impresora':
                                                echo '&#128424;';
                                                break;
                                            case 'mobiliario':
                                                echo '&#128715;';
                                                break;
                                            case 'consumibles':
                                                echo '&#9981;';
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: justify; width: 50%;">
                                        <?php echo $row[3]; ?>
                                    </td>
                                    <?php if ($user_data["usuario"] == "admin") { ?>
                                        <td scope="col"><?php echo $row[6]; ?></td>
                                    <?php } ?>
                                    <?php
                                    switch ($row[4]) {
                                        case 'creado':
                                            echo "<td id='$row[0]status' style='width: 5%; background: red;'></td>";
                                            break;
                                        case 'progreso':
                                            echo "<td id='$row[0]status' style='width: 5%; background: orange;'></td>";
                                            break;
                                        case 'terminado':
                                            echo "<td id='$row[0]status' style='width: 5%; background: green;'></td>";
                                            break;
                                        case 'cancelado':
                                            echo "<td id='$row[0]status' style='width: 5%; background: gray;'></td>";
                                            break;
                                    }
                                    ?>
                                    <td style="width: 30%;">
                                        <?php if ($user_data['usuario'] == 'admin') { ?>
                                            <?php if ($row[4] == 'creado') { ?> 
                                                <button id="<?php echo "$row[0]progreso" ?>"
                                                        data-id="<?php echo $row[0]; ?>"
                                                        class="progreso">
                                                    &#9874;
                                                </button>
                                            <?php } ?>
                                            <?php if ($row[4] == 'progreso') { ?> 
                                                <button id="<?php echo "$row[0]terminado" ?>"
                                                        data-id="<?php echo $row[0]; ?>"
                                                        class="terminado">
                                                    &#10004;
                                                </button>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if ($row[4] == "creado" || $row[4] == 'progreso') { ?>
                                            <button id="<?php echo "$row[0]cancelar" ?>"
                                                    data-id="<?php echo $row[0]; ?>"
                                                    class="cancelar">
                                                &#10006;
                                            </button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php require('foot.php'); ?>
    </body>

</html>
