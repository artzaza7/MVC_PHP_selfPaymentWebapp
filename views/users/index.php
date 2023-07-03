<div class="row">
    <div class="col d-flex flex-column justify-content-center align-items-center">
        <div>
            <?php
                $id = $_GET['userId'];
                echo "<p>INDEX OF USER_ID : " . $id . "</p>"
            ?>
        </div>
        <div>
            <a href="?controller=pages&action=home" class="btn btn-primary text-center">Go Back</a>
        </div>
    </div>
</div>