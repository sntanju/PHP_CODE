<?php

class HandleData 
{
    private $incomeFile = 'income.json';
    private $expenseFile = 'expense.json';
    private $categoryFile = 'categories.json';

    public function __construct() {
        $this -> initializeFiles();
    }

    private function initializeFiles() {

        if (!file_exists($this -> incomeFile)) file_put_contents($this -> incomeFile, json_encode([]));

        if (!file_exists($this -> expenseFile)) file_put_contents($this -> expenseFile, json_encode([]));

        if (!file_exists($this -> categoryFile)) file_put_contents($this -> categoryFile, json_encode([]));
    }

    public function saveIncome($income) {

        $incomes = json_decode(file_get_contents($this -> incomeFile), true);
        $incomes[] = $income;

        file_put_contents($this -> incomeFile, json_encode($incomes));
    }

    public function saveExpense($expense) {

        $expenses = json_decode(file_get_contents($this -> expenseFile), true);
        $expenses[] = $expense;

        file_put_contents($this -> expenseFile, json_encode($expenses));
    }

    public function saveCategory($category) {

        $categories = json_decode(file_get_contents($this -> categoryFile), true);
        if (!in_array($category, $categories)) {

            $categories[] = $category;
            file_put_contents($this -> categoryFile, json_encode($categories));
        }
    }

    public function getIncomes() {
        return json_decode(file_get_contents($this -> incomeFile), true);
    }

    public function getExpenses() {
        return json_decode(file_get_contents($this -> expenseFile), true);
    }

    public function getCategories() {
        return json_decode(file_get_contents($this -> categoryFile), true);
    }

    public function getSavings() {

        $incomes = $this -> getIncomes();
        $expenses = $this -> getExpenses();

        $totalIncome = array_sum(array_column($incomes, 'amount'));
        $totalExpense = array_sum(array_column($expenses, 'amount'));
        $totalSavings = $totalIncome - $totalExpense;

        return [
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'totalSavings' => $totalSavings,
        ];
    }
}

?>