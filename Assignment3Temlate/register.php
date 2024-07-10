<?php

    function generateUID() {
        return uniqid();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $email = $_POST['email'];

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $uid = generateUID(); 

        $usersFile = 'allData/allUsers.json';
        $users = json_decode(file_get_contents($usersFile), true);

        $users[] = [

            'name' => $name,
            'email' => $email,

            'password' => $password,
            'uid' => $uid
        ];

        file_put_contents($usersFile, json_encode($users));
        session_start();

        $_SESSION['uid'] = $uid;
        $_SESSION['shareable_link'] = "http://localhost:8000/feedback.php?uid=" . $uid;
        
        header('Location: login.html');
        exit();
    }
?>
