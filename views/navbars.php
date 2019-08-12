<!-- start section navigasi -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <a class="navbar-brand" href="<?php echo $url_index; ?>">
        <span class="fw-bold f-roboto">
            Toko Buku Wiwin
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 align-self-center">
                    <form class="form-inline my-2 my-lg-0 justify-content-center">
                        <input class="form-control mr-sm-2 w-75" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <div class="my-2 my-md-0">&nbsp;</div>
                <div class="col-md-2 text-center">
                    <a name="" id="" class="btn btn-outline-light w-100 w-md-50 mx-auto" href="#" role="button">My Cart</a>
                    <span class="btn btn-secondary w-100 w-md-50">
                        Rp. 100k
                    </span>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end section navigasi -->
<!-- start section menu navigasi -->
<nav class="navbar navbar-expand-lg py-2 navbar-dark bg-primary text-center" style="color:white!important;">
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse nav-costume py-2 navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 justify-content-center w-100  mt-lg-0 navbar-center">
            <li class="nav-item">
                <a class="nav-link f-lato" href="<?php echo $url_index.'?page=kategori&action=' ?>">
                    <h4>
                        Daftar Buku
                    </h4>
                </a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>
                        Kategori
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link f-lato" href="#">
                    <h4>
                        Tentang kami
                    </h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link f-lato" href="#">
                    <h4>
                        Info Pembayaran
                    </h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link f-lato" href="#">
                    <h4>
                        Blog
                    </h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link f-lato" href="#">
                    <h4>
                        Kontak
                    </h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link f-lato btn btn-outline-dark w-md-50 mx-auto" href="index.php?page=login">
                    <h4>
                        Login
                    </h4>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- end section menu navigasi -->