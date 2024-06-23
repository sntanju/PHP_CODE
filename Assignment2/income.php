<?php

    class Income
    {
        public $amount;
        public $category;
        public $description;

        public function __construct($amount, $category, $description) {

            $this -> amount = $amount;
            $this -> category = $category;
            $this -> description = $description;
        }


        public function toArray() {
            return [
                'amount' => $this->amount,
                'category' => $this->category,
                'description' => $this->description,
            ];
        }
    }

?>