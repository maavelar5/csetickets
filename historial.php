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
        connect();
        $user_id = $user_data['id'];
        $query = "select * from reporte where usuario_id='$user_id'";

        $result = mysqli_query($conn,$query);
        
        $rows = mysqli_fetch_all($result);
    }

    ?>
    <body>
        <div class="container">
            <?php require('navbar.php'); ?>
            <div class="col-md-12">
                <div class="row justify-content-center align-items-center">
                    <table class="table table-sm table-bordered table-hover" style="background: white;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Comentarios</th>
                                <th scope="col">Status</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row) { ?>
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        <?php echo $row[0]; ?>
                                    </th>
                                    <td style="text-align: center">
                                        <?php echo $row[2]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row[3]; ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo $row[4]; ?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php if ($row[4] == 'creado') { ?>
                                            <i>&#10006;</i>
                                        <?php } ?>
                                        <?php if ($user_data['usuario'] == 'admin') { ?>
                                            <i>&#10004;</i>
                                            <i>&#9874;</i>
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
