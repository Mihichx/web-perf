<?php

class BankAccount
{
    protected string $owner;
    protected float $balance = 0;

    public function __construct(string $name) {
        $this->owner = $name;
    }

    public function deposit(int $sum) {
        if ($sum > 0) {
            $this->balance += $sum;
        } else {
            $this->balance -= $sum;
        }
    }   

    public function withdraw(int $sum) {
        if (($this->balance - $sum) >= 0) {
            $this->balance -= $sum;
        } else {
            echo "Не достаточно средств";
            echo "<br>";
        }
    }

    public function get_balance() {
        echo $this->balance;
        echo "<br>";
    }
}

class SavingsAccount extends BankAccount
{   
    private $percent = 0.05;

    public function dep() {
        $this->balance += $this->balance * $this->percent;
    }
} 

class CreditAccount extends BankAccount
{   
    private $limit = 100;

    public function withdraw(int $sum) {
        if (($this->balance + $this->limit - $sum) >= 0) {
            $this->balance -= $sum;
        } else {
            echo "Выход за лимит";
            echo "<br>";
        }
    }
} 

$b = new BankAccount("user1");
$s = new SavingsAccount("user2");
$c = new CreditAccount("user3");

$b->deposit(100);
$s->deposit(100);
$c->deposit(100);

$b->withdraw(101);
$s->withdraw(99);
$c->withdraw(200);

$s->dep();

$b->get_balance();
$s->get_balance();
$c->get_balance();
