<div class="row w-75">
    <div class="mb-3 col-12 d-flex flex-column justify-content-center align-items-center">
        <h3 class="my-0 fw-bold text-center">
            Welcome to Register Page
        </h3>
        <h6 class="my-1 fw-bolder text-center">
            Please enter info to create account
        </h6>
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'duplicate') {
                echo '<div class="my-0 d-flex justify-content-center align-items-center text-center alert alert-danger alert-dismissible fade show" role="alert">
            <div>
            <strong>Error! Duplicate Username.</strong> You should check in on some of those inputs below.
           </div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
        }

        if (isset($_POST['submit'])) { // checking for submit by form
            submitRegisterForm($_POST);
        }
        ?>
    </div>
    <!-- Form Action : register -->
    <form action="" method="POST">
        <div class="my-2 col-12 justify-content-center align-items-center text-center text-dark">
            <div class="container-fluid px-0 form-floating w-75">
                <input type="text" class="form-control" id="username" name="username" placeholder="b63XXXXXXXX">
                <label for="username">USERNAME</label>
            </div>
        </div>
        <div class="my-2 col-12 justify-content-center align-items-center text-center text-dark">
            <div class="container-fluid px-0 form-floating w-75">
                <input type="password" class="form-control" id="password" name="password" placeholder="b63XXXXXXXX">
                <label for="password">PASSWORD</label>
            </div>
        </div>
        <div class="my-2 col-12 justify-content-center align-items-center text-center text-dark">
            <div class="container-fluid px-0 form-floating w-75">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                    placeholder="b63XXXXXXXX">
                <label for="confirmPassword">CONFIRM PASSWORD</label>
            </div>
        </div>
        <div class="mt-2 col-12 d-flex justify-content-center">
            <button type="submit" name="submit" value="submit"
                class="py-3 fs-5 w-50 badge rounded-pill bg-success">Register</button>
        </div>
    </form>
    <div class="mt-2 col-12 d-flex justify-content-center">
        <a href="?controller=pages&action=home" class="py-3 fs-5 w-50 badge rounded-pill bg-primary">Go to
            home</a>
    </div>
</div>

<?php
function submitRegisterForm($result)
{
    $username = $result['username'];
    $password = $result['password'];
    $confirmPassword = $result['confirmPassword'];
    if ($username == '' || $password == '' || $confirmPassword == '') {
        echo '<div class="mt-3 mb-0 d-flex justify-content-center align-items-center text-center alert alert-warning alert-dismissible fade show" role="alert">
            <div>
            <strong>Error! Do not have value.</strong> You should check in on some of those inputs below.
           </div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    } else if ($password != $confirmPassword) {
        echo '<div class="mt-3 mb-0 d-flex justify-content-center align-items-center text-center alert alert-danger alert-dismissible fade show" role="alert">
            <div>
            <strong>Error! Something is wrong.</strong> You should check in on some of those inputs below.
           </div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    } else {
        header("Location: ?controller=pages&action=register&username=" . $username . "&password=" . $password);
    }
}
?>