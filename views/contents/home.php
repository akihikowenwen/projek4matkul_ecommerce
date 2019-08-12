<!-- start landing slider -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-3 py-3">
            <div class="shadow rounded" style="height:500px;">
                <div class="py-2 pl-3 rounded-top bg-success" style="color:white">
                    <h4 class="f-lato">
                        kategori
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-lg-8 py-3">
            <div class="row mr-1 border">
                <div class="col pt-4">
                    <div class="owl-carousel owl-theme" style="">
                        <?php 
                            include_once($url_db);
                            $query = mysqli_query($connect,"SELECT photo FROM tb_buku");
                            if (mysqli_num_rows($query)>0) {
                                while ($content = mysqli_fetch_array($query)) {
                        ?>
                            <div class="item text-center mx-3">
                                <img src="<?php echo $url_db_cover.$content['photo'] ?>" class="img-fluid-c" alt="Responsive image">
                            </div>
                        <?php 
                                }
                            } 
                        ?>
                    </div> 
                </div>
                <div class="w-100 my-3"></div>
                <div class="col">
                    <div class="container-fluid">
                        <div class="row justify-content-center">

                            <?php 
                                include_once($url_db);
                                $query = mysqli_query($connect,"SELECT * FROM tb_buku");
                                if (mysqli_num_rows($query)>0) {
                                    while ($content = mysqli_fetch_array($query)) {
                            ?>
                                <div class="col-md-6 py-3">
                                    <div class="my-card mx-auto">
                                        <div class="box shadow-sm"></div>
                                        <div class="row h-100">
                                            <div class="col-4 px-0">
                                                <div class="h-100 img" style="background:url('<?php echo $url_db_cover.$content['photo'] ?>');"></div>
                                            </div>
                                            <div class="col-7 h-100 d-table">
                                                <div class="d-table-cell align-middle">
                                                    <div class="title f-roboto">
                                                        <!-- masih masalah di truncatenya  -->
                                                        <h3> 
                                                            <?php echo $content['jdl_buku'] ?>
                                                        </h3>
                                                    </div>
                                                    <div class="harga text-center">
                                                        <span>
                                                            Rp. <?php echo $content['harga'] ?>,00.-
                                                        </span>
                                                    </div>
                                                    <div class="action justify-content-center form-inline mt-2 w-100">
                                                        <a href="#" class="btn btn-primary">
                                                            View
                                                        </a>
                                                        <span class="mx-1"></span>
                                                        <a href="#" class="btn btn-success">
                                                            Buy
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                    }
                                } 
                            ?>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end landing slider -->
