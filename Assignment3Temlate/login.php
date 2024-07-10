<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $usersFile = 'allData/allUsers.json';
        $users = json_decode(file_get_contents($usersFile), true);

        foreach ($users as $user) {

            if ($user['email'] === $email && password_verify($password, $user['password'])) {
                
                header('Location: dashboard.php');
                exit();
            }
        }

        echo 'Invalid credentials';
    }
?>
