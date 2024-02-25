<?php
session_destroy();
session_start();
?>

<link rel="stylesheet" href="./Styles/page_login.css">

<section id="pageLogin">
    <div class="container d-flex align-items-center justify-content-center">
        <form method="post" class="boxLogin d-flex flex-column justify-content-center align-items-center">
            <h1 class="mb-3 text-warning">Log In</h1>

            <div class="input-group mb-3">
                <input type="text" name="username" class="form-control bg-dark text-white" placeholder="Username">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control bg-dark text-white" placeholder="Password">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
            </div>

            <button type="submit" name="submit" class="mb-3">Log In</button>
        </form>
    </div>
</section>

<!-- Sweetalert -->
<script src="./JS/jquery-3.4.1.min.js"></script>
<script src="./JS/sweetalert2.all.min.js"></script>

<?php
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '". $username ."' AND `password` = '". $password ."'"); 
    if(mysqli_num_rows($cek) == 0) { echo "<script>Swal.fire('Opss..','Wrong username / password specified!','warning');</script>"; return 1; }

    $d = mysqli_fetch_object($cek);
    $_SESSION['status_login'] = true;
    $_SESSION['a_global'] = $d;

    if($username == "admin") {
        $_SESSION['isAdmin'] = true;
        header("Location: ./?page=admin");
    } else { 
        $_SESSION['isAdmin'] = false;
        header("Location: ./?page=absen");
    }
    return 1;
}
?>