<?php

    session_start();
    if (!isset($_SESSION['uid'])) {

        header('Location: login.html');
        exit();
    }

    $usersFile = 'allData/allUsers.json';
    $users = json_decode(file_get_contents($usersFile), true) ?? [];

    $currentUser = null;
    foreach ($users as $user) {

        if ($user['uid'] === $_SESSION['uid']) {
            $currentUser = $user;
            break;
        }
    }

    if ($currentUser === null) {
        echo "User not found.";
        exit();
    }

    $username = $currentUser['name'];
    $shareableLink = $_SESSION['shareable_link'];

    $feedbackFile = 'allData/allFeedbacks.json';
    $feedbacks = json_decode(file_get_contents($feedbackFile), true) ?? [];

    $userFeedbacks = array_filter($feedbacks, function($feedback) use ($currentUser) {
        return $feedback['uid'] === $currentUser['uid'];
    });

    include 'dashboard.html';
?>