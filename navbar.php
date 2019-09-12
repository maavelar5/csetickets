<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">CSE Tickets</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/historial.php">Historial<span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <a id="navbar-username" class="nav-link">
            <?php echo ($user_data) ? $user_data['usuario'] : 'Invitado' ?>
        </a>
    </div>
</nav>
