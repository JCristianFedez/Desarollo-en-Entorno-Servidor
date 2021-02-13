<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container px-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="masInfoPeli.php">Pelicula Aleatoria</a>
                    </li>
                </ul>
                <form method="post" action="buscarPeli.php" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nombrePeli" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>