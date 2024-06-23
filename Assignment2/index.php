<?php

        require_once 'Income.php';
        require_once 'Expense.php';
        require_once 'handleData.php';

    // Initial function to display the menu
    function showMenu() {

        echo "1. Add Income" . PHP_EOL;
        echo "2. Add expense" . PHP_EOL;
        echo "3. View incomes" . PHP_EOL;
        echo "4. View expenses" . PHP_EOL;
        echo "5. View savings" . PHP_EOL;
        echo "6. View categories" . PHP_EOL;
        echo "0. Exit" . PHP_EOL;
        echo "Enter your option: ";
    }

    /// Income adding function

    function addIncome($dataHandler) {

        echo "Enter Amount: ";
        $amount = readline();
        $amount = trim($amount);

        echo "Enter Category: ";
        $category = readline();
        $category = trim($category);

        echo "Enter Description: ";
        $description = readline();
        $description = trim($description);

        $income = new Income($amount, $category, $description);
        $dataHandler -> saveIncome($income -> toArray());

        $dataHandler -> saveCategory($category);
        echo "Income added successfully!" . PHP_EOL;
    }

     /// Expense adding function

    function addExpense($dataHandler) {

        echo "Enter Amount: ";
        $amount = readline();
        $amount = trim($amount);

        echo "Enter Category: ";
        $category = readline();
        $category = trim($category);

        echo "Enter Description: ";
        $description = readline();
        $description = trim($description);
    
        $expense = new Expense($amount, $category, $description);
        $dataHandler -> saveExpense($expense -> toArray());

        $dataHandler -> saveCategory($category);
        echo "Expense added successfully!" . PHP_EOL;
    }

    /// Viewing income

    function viewIncomes($dataHandler) {

        $incomes = $dataHandler -> getIncomes();
        if(empty($incomes))  echo "No incomes added yet." . PHP_EOL; 

        else {
            foreach($incomes as $income) 
                echo "Amount: {$income['amount']}, Category: {$income['category']}, Description: {$income['description']}" . PHP_EOL;
        }
    }

    /// Viewing expense

    function viewExpense($dataHandler) {

        $expenses = $dataHandler -> getExpenses();
        if(empty($expenses)) echo "No expenses added yet." . PHP_EOL;

        else {
            foreach($expenses as $expense) 
                echo "Amount: {$expense['amount']}, Category: {$expense['category']}, Description: {$expense['description']}" . PHP_EOL;
        }
    }

     /// Viewing savings

    function viewSavings($dataHandler) {

        $savings = $dataHandler -> getSavings();
        echo "Total Income: {$savings['totalIncome']}" . PHP_EOL;

        echo "Total Expense: {$savings['totalExpense']}" . PHP_EOL;
        echo "Total Savings: {$savings['totalSavings']}" . PHP_EOL;
    }
    
     /// Viewing categories

    function viewCategories($dataHandler) {

        $categories = $dataHandler -> getCategories();
        if(empty($categories)) echo "No categories added yet." . PHP_EOL;
        else echo "Categories: " . implode(', ', $categories) . PHP_EOL;
    }

    /// Handling user options

    $dataHandler = new HandleData();

    while(1) {

        showMenu();
        $option = readline();
        $option = trim($option);

        if($option == 1) addIncome($dataHandler);
        else if($option == 2) addExpense($dataHandler);

        else if($option == 3) viewIncomes($dataHandler);
        else if($option == 4) viewExpense($dataHandler);

        else if($option == 5) viewSavings($dataHandler);
        else if($option == 6) viewCategories($dataHandler);

        else if($option == 0) exit("This program is exiting.") . PHP_EOL;
        else echo "Invalid option. Please try again with a valid option." . PHP_EOL;
    }


?>