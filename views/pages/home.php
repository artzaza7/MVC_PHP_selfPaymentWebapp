<div class="row justify-content-center align-items-center py-3 w-75">
    <div class="col-12 d-flex justify-content-center align-items-center text-center">
        <h3 class="my-0 fw-bolder">
            Welcome to Self Payment Website Application
        </h3>
    </div>
    <div class="col-12 d-flex flex-column justify-content-center align-items-center text-center mt-2">
        <h3 class="my-0 fw-bold">
            User Login
        </h3>
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'createUserSuccess') {
                echo '<div class="my-2 d-flex justify-content-center align-items-center text-center alert alert-success alert-dismissible fade show" role="alert">
                <div>
                <strong>Register Successful.</strong> Thanks for using my application.
               </div>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
        ?>
    </div>
    <div
        class="my-3 my-md-3 my-lg-3 col-sm-12 col-md-12 col-lg-12 justify-content-center align-items-center text-center text-dark">
        <div class="container-fluid px-0 form-floating w-75">
            <input type="text" class="form-control" id="username" placeholder="b63XXXXXXXX">
            <label for="username">USERNAME</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 justify-content-center align-items-center text-center text-dark">
        <div class="container-fluid px-0 form-floating w-75">
            <input type="password" class="form-control" id="password" placeholder="PASSWORD">
            <label for="password">PASSWORD</label>
        </div>
    </div>
    <div
        class="mt-3 mb-3 mt-md-3 mt-lg-3 mb-md-3 mb-lg-3 col-sm-12 col-md-12 col-lg-12 justify-content-center align-items-center text-center text-dark">
        <div class="container-fluid d-flex justify-content-center align-items-center mx-0 my-0 px-0 py-0 w-100">
            <button class="badge rounded-pill bg-success w-50 py-3 fs-5">
                LOGIN
            </button>
        </div>
    </div>
    <div
        class="mb-md-3 mb-lg-3 col-sm-12 col-md-12 col-lg-12 justify-content-center align-items-center text-center text-dark">
        Not registered? <a href="?controller=pages&action=registerPage" class="text-warning">Create an account</a>
    </div>
</div>