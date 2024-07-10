<?php

    session_start();
    if (!isset($_GET['uid'])) {

        echo "Invalid link.";
        exit();
    }

    $uid = $_GET['uid'];
    $usersFile = 'allData/allUsers.json';

    $users = json_decode(file_get_contents($usersFile), true) ?? [];
    $currentUser = null;

    foreach ($users as $user) {
        if ($user['uid'] === $uid) { 

            $currentUser = $user;
            break;
        }
    }

    if ($currentUser === null) {

        echo "User not found.";
        exit();
    }

    $username = $currentUser['name'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $message = $_POST['message'];
        $timestamp = date('Y-m-d H:i:s');

        $feedbackFile = 'allData/allFeedbacks.json';
        $feedbacks = json_decode(file_get_contents($feedbackFile), true) ?? [];

        $feedbacks[] = [

            'uid' => $uid,
            'message' => $message,
            'timestamp' => $timestamp
        ];

        file_put_contents($feedbackFile, json_encode($feedbacks));
        header('Location: feedback-success.html');

        exit();
    }

    include 'feedback.html';
?>