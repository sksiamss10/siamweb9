<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (empty($username) || empty($password) || empty($email)) {
        echo "Please fill the form.";
    } else {
        $conn = new mysqli("localhost", "root", "", "ajax_form");
        $sql = "INSERT INTO `form_data`(`Name`, `Password`, `Email`) VALUES ('$username','$password','$email')";
        $conn->query($sql);
        $post_data = $_POST;
        $id['ID'] = $conn->insert_id;
        $data = array_merge($id,$post_data);
        echo json_encode($data);
    }
?>