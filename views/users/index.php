<div class="row w-75">
    <div class="col-12 d-flex flex-column justify-content-center align-items-center w-100 mx-0 my-0 px-0 py-0">
        <div>
            <?php
            echo "<p class='my-0'>INDEX OF USER_ID : " . $decrypted_id . "</p>";
            $nullValue = false;
            if (isset($_POST['submit'])) { // checking for submit by form
                submitFormCreateExpenses($_POST, $decrypted_id, $user_id_string);
                $nullValue = true;
            }

            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'Create Expenses Success' && !$nullValue) {
                    echo '<div class="my-2 d-flex justify-content-center align-items-center text-center alert alert-success alert-dismissible fade show" role="alert">
                    <div>
                    <strong>Create Expenses Successful.</strong> Thanks for using my application.
                   </div>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
            }
            ?>
        </div>
        <div>
            <a href="?controller=pages&action=home" class="btn btn-primary text-center">Go Back</a>
        </div>
    </div>
    <div class="col-12 d-flex flex-column justify-content-center align-items-center w-100 mx-0 my-0 px-0 py-0 w-100">
        <form action="" method="POST" class="w-100">
            <div class="row w-100">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="container-fluid px-0 my-2 form-floating w-100">
                        <input type="number" class="form-control" id="money" name="money" placeholder="XXXXX">
                        <label for="money">MONEY : Bath</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="container-fluid form-floating px-0 my-2 w-100">
                        <select class="form-select" aria-label="Default select example" id="typeExpenses"
                            name="typeExpensesId">
                            <?php
                            foreach ($type_expenses_list as $type_expenses) {
                                echo "<option value=" . $type_expenses->id . ">" . $type_expenses->name . "</option>";
                            }
                            ?>
                        </select>
                        <label for="typeExpenses">เลือกประเภทรายจ่าย</label>
                    </div>
                </div>
                <div class="col-12 container-fluid form-floating px-0 my-2 w-100 d-flex justify-content-center">
                    <button type="submit" name="submit" value="submit"
                        class="py-3 fs-6 w-50 badge rounded-pill bg-success">สร้างรายจ่าย</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 d-flex flex-column justify-content-center align-items-center w-100 mx-0 my-0 px-0 py-0 w-100">
        <div class="card w-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">จำนวนเงิน</th>
                                <th scope="col">ประเภทการใช้จ่าย</th>
                                <th scope="col">วัน</th>
                                <th scope="col">เวลา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($expenses_typeExpenses_list as $expenses_typeExpenses) {
                                echo "<tr>";
                                echo "<th scope='row'>".$index."</th>";
                                echo "<td>".$expenses_typeExpenses->money."</td>";
                                echo "<td>".$expenses_typeExpenses->name."</td>";
                                echo "<td>".$expenses_typeExpenses->date."</td>";
                                echo "<td>".$expenses_typeExpenses->time."</td>";
                                echo "</tr>";
                                $index++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function submitFormCreateExpenses($result, $userId, $token)
{
    $money = $result['money'];
    $typeExpensesId = $result['typeExpensesId'];
    if ($money == '' || $typeExpensesId == '') {
        echo '<div class="mt-0 mb-0 d-flex justify-content-center align-items-center text-center alert alert-warning alert-dismissible fade show" role="alert">
            <div>
            <strong>Error! Do not have value.</strong> You should check in on some of those inputs below.
           </div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    } else {
        header("Location: ?controller=users&action=createExpenses&money=" . $money . "&user_id=" . $userId . "&type_expenses_id=" . $typeExpensesId . "&token=" . $token);
    }
}
?>