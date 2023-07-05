<!-- PHP -->
<?php
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP DASHBOARD | CHANAKAN</title>

    <!-- Bootstrap 5 -->
    <!-- <link rel="stylesheet" href="Bootstrap5/CSS/bootstrap.min.css"> -->
    <!-- <script src="Bootstrap5/Javascript/bootstrap.bundle.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Font Kanit -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet" />

    <!-- CSS -->
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            display: flex;
            justify-content: between;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            min-width: 100vw;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: white;
        }
        button {
            border: none;
        }
    </style>
</head>
<body>
    <!-- <header class="bg-primary w-100 d-flex justify-content-center align-items-center" style="min-height: 10vh">
        <div class="row align-items-center h-100 w-100">
            <div class="col px-0 d-flex justify-content-center align-items-center">
                <a href="?controller=pages&action=home" class="text-white">HOME</a>
            </div>
            <div class="col px-0 d-flex justify-content-center align-items-center">
                <a href="?controller=pages&action=error" class="text-white">ERROR</a>
            </div>
            <div class="col px-0 d-flex justify-content-center align-items-center">
                <a href="?controller=pages&action=checking" class="text-white">CHECKING</a>
            </div>
        </div>
    </header> -->
    <div class="container-fluid d-flex justify-content-center align-items-center w-100 px-0 py-3 mx-0 my-0"
        style="min-height: 80vh;">
        <?php
        require_once("routes.php");
        ?>
    </div>
    <footer class="bg-danger w-100 d-flex justify-content-center align-items-center" style="min-height: 20vh">
        <div class="row w-100 h-100 my-3">
            <div class="col-12 w-100 px-0 d-flex justify-content-center align-items-center my-1">
                <h6 class="text-white my-0 text-center">SELF PROJECT : Self Income & Expenses Website Application (SIEWA)</h6>
            </div>
            <div class="col-12 w-100 px-0 d-flex justify-content-center align-items-center my-1">
                <h6 class="text-white my-0 text-center">Kasetsart University Kamphaeng Saen Campus</h6>
            </div>
            <div class="col-12 w-100 px-0 d-flex justify-content-center align-items-center my-1">
                <h6 class="text-white my-0 text-center">Faculty of Engineering at Kamphaeng Saen</h6>
            </div>
            <div class="col-12 w-100 px-0 d-flex justify-content-center align-items-center my-1">
                <h6 class="text-white my-0 text-center">Department of Computer Engineering</h6>
            </div>
            <div class="col-12 w-100 px-0 d-flex justify-content-center align-items-center my-1">
                <h6 class="text-warning my-0 text-center">Created by Chanakan Srisarutiporn</h6>
            </div>
        </div>
    </footer>
</body>
</html>