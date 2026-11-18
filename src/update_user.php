<?php
include '../settings/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile_phone = $_POST['mobile_phone'];

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_name = $_FILES['photo']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_ext, ['jpg', 'jpeg', 'png'])) {
            $new_file_name = $mobile_phone . '.' . $file_ext;
            $upload_dir = 'photos/';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                $url_photo = 'photos/' . $new_file_name;

                $sql = "UPDATE users SET firstname = $1, lastname = $2, email = $3, mobile_phone = $4, url_photo = $5 WHERE id = $6";
                $res = pg_query_params($local_conn, $sql, array($firstname, $lastname, $email, $mobile_phone, $url_photo, $id));
            }
        }
    } else {
        $sql = "UPDATE users SET firstname = $1, lastname = $2, email = $3, mobile_phone = $4 WHERE id = $5";
        $res = pg_query_params($local_conn, $sql, array($firstname, $lastname, $email, $mobile_phone, $id));
    }

    if ($res) {
        echo "<script>alert('User has been updated successfully !!!'); window.location='list_users.php';</script>";
    } else {
        echo "<script>alert('Error updating user.'); window.location='list_users.php';</script>";
    }
}
?>