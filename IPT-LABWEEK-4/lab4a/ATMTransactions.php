<?php 
 class ATM_Transactions{
    public $transaction_ID;
    public $date;
    public $type;

    public $amount;
    public $post_balance;

    public function modifies(){
        return false;
     }
 }
?>