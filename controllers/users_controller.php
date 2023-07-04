<?php
class UsersController
{
    public function index()
    {
        $encrypted_id = null;
        $salt = null;
        $encrypted_id_withOutSalt = null;
        if (isset($_GET['userId'])) {
            $encrypted_id = $_GET['userId'];
        }
        if (isset($_GET['key'])) {
            $keyword = $_GET['key'];
        }
        // หาตำแหน่งของคำว่า "salt" ในสตริง
        $saltPosition = strpos($encrypted_id, $keyword);

        if ($saltPosition !== false) {
            // หาความยาวของสตริงทั้งหมด
            $stringLength = strlen($encrypted_id);
            // ดึงคำหลังจากคำ "salt" ออกมา
            $result = substr($encrypted_id, $saltPosition + strlen($keyword), $stringLength);
            $salt = $result;
        } else {
            echo "ไม่พบคำว่า 'salt' ในสตริง";
        }

        // หาตำแหน่งของคำว่า "salt" ในสตริง
        $saltPosition = strpos($encrypted_id, $keyword);
        if ($saltPosition !== false) {
            // ตัดสตริงแบบส่วนหลังออกมา
            $result = substr($encrypted_id, 0, $saltPosition);
            $encrypted_id_withOutSalt = $result;
        } else {
            echo "ไม่พบคำว่า 'salt' ในสตริง";
        }
        if ($encrypted_id == null || $salt == null || $encrypted_id_withOutSalt == null) {
            header("Location: ?controller=pages&action=error");
        } else {
            $decrypted_id_raw = base64_decode($encrypted_id_withOutSalt);
            $decrypted_id = preg_replace(sprintf('/%s/', $salt), '', $decrypted_id_raw);
            require_once('views/users/index.php');
        }
    }
}
