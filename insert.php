<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (empty($username) || empty($password) || empty($email)) {
        echo "Please fill the form.";
    } else {
        $conn = new mysqli("remotemysql.com", "z5m5hgq7cD", "LwpEGJ2mWx", "z5m5hgq7cD");
        $sql = "INSERT INTO `form_data`(`Name`, `Password`, `Email`) VALUES ('$username','$password','$email')";
        $conn->query($sql);
        $post_data = $_POST;
        $id['ID'] = $conn->insert_id;
        $data = array_merge($id,$post_data);
        echo json_encode($data);
        $for_alert = "Success.";
    }
?>