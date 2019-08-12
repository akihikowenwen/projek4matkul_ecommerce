<?php
    include_once($url_db);
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = mysqli_query($connect,"SELECT * FROM akun WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($query);
        if($cek>0){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['status'] = 'login';
            header($url_index.'?page=home');
        }else{
            $message = "username & passwod tidak ditemukan !";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>
<div class="container-fluid h-75">
    <div class="row h-100 justify-content-center">
        <div class="col-md-4 px-5 px-md-0">

            <div class="d-table w-100 h-100">
                <div class="d-table-cell align-middle text-center">

                    <div class="row shadow py-4 px-2">
                        <div class="col text-center">
                            <h3>Login</h3>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <form action="<?php echo $url_index.'?page=login' ?>" method="POST">
                                <div class="form-group text-left">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group text-left">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
                            </form> 
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>