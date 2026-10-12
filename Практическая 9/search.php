<?php

// // Задание 2.1
// $arr = range(1, 100);
// $arr1 = [];
// foreach ($arr as $_) {
//     array_push($arr1, '.');
// }

// $count_array = count($arr);
// $target = 80;
// $time1 = 0;
// $time2 = 0;

// echo "Ищем: " . $target . "<br>";

// $start1 = microtime(true);
// for ($i = 0; $i != $count_array + 1; $i++) {
//     $arr1[$i] = '|';
//     foreach ($arr1 as $j) {
//         echo $j;
//     }
//     echo "<br>";

//     if ($arr[$i] == $target) {
//         $end1 = microtime(true);
//         $time1 = ($end1 - $start1) * 1000;
//         echo "O(n) нашёл за: " . $time1 . "<br>";
//         break;
//     }
// }

// $first = 0;
// $arr1 = [];
// foreach ($arr as $_) {
//     array_push($arr1, '.');
// }

// $last = count($arr) - 1;
// $start2 = microtime(true);
// while ($first <= $last) {
//     $middle = $first + (int)round(($last - $first) / 2);
//     $arr1[$middle] = '|';
//     foreach ($arr1 as $j) {
//         echo $j;
//     }
//     echo "<br>";

//     if ($arr[$middle] == $target) {
//         $end2 = microtime(true);
//         $time2 = ($end2 - $start2) * 1000;
//         echo "O(log n) нашёл за: " . $time2 . " (лучше при искомом значении который далеко от начала)" . "<br>";
//         break;
//     } elseif ($arr[$middle] < $target) {
//         $first = $middle + 1;
//     } else {
//         $last = $middle - 1;
//     }
// }

// if ($time1 < $time2) {
//     echo "Вариант 1 быстрее на: " . $time2 - $time1;
// } else {
//     echo "Вариант 2 быстрее на: " . $time1 - $time2;
// }

// // Задание 2.2
// $arr = [];
// $start1 = microtime(true);
// for ($i = 0; $i != 10001; $i++) {
//     array_push($arr, $i);
// }
// $end1 = microtime(true);
// $time1 = $end1 - $start1;
// echo "<br><br>" . "array_push: " . $time1;

// $arr = [];
// $start2 = microtime(true);
// for ($i = 0; $i != 10001; $i++) {
//     array_unshift($arr, $i);
// }
// $end2 = microtime(true);
// $time2 = $end2 - $start2;
// echo "<br>" . "array_unshift: " . $time2 . "<br>";

// if ($time1 < $time2) {
//     echo "Вариант 1 быстрее на: " . $time2 - $time1;
// } else {
//     echo "Вариант 2 быстрее на: " . $time1 - $time2;
// }

// echo "<br>" . "<br>";

// // Задание 2.3
// class Node
// {
//     public mixed $value;
//     public ?Node $next;

//     public function __construct(mixed $value)
//     {
//         $this->value = $value;
//         $this->next  = null;
//     }
// }

// class LinkedList
// {
//     private ?Node $head = null;

//     public function append(mixed $value): void
//     {
//         $newNode = new Node($value);

//         if ($this->head === null) {
//             $this->head = $newNode;
//             return;
//         }

//         $current = $this->head;
//         while ($current->next !== null) {
//             $current = $current->next;
//         }
//         $current->next = $newNode;
//     }

//     public function prepend(mixed $value): void
//     {
//         $newNode = new Node($value);
//         $newNode->next = $this->head;
//         $this->head = $newNode;
//     }

//     public function find(mixed $value): ?Node
//     {
//         $current = $this->head;
//         while ($current !== null) {
//             if ($current->value === $value) {
//                 return $current;
//             }

//             $current = $current->next;
//         }
//         return null;
//     }

//     public function delete(mixed $value): void
//     {
//         if ($this->head->value === $value) {
//             $this->head = $this->head->next;
//             return;
//         }

//         $current = $this->head;
//         while ($current !== null) {
//             if ($current->next->value === $value) {
//                 $current->next = null;
//                 return;
//             }
//             $current = $current->next;
//         }
//         return;
//     }
// }

// $list = new LinkedList();

// $list->append(10);

// $list->append(20);

// $list->prepend(5);

// $list->delete(5);

// print_r($list->find(20));

// echo "<br>";

// print_r($list);

// echo "<br>" . "<br>"; 

// // Задание 3.1
// $stack = new SplStack;

// for ($i = 0; $i <= 5; $i++) {
//     $stack->push($i);
// }

// while (!$stack->isEmpty()) {
//     echo $stack->pop() . " ";
// }

// echo "<br>" . "<br>";

// // Задание 3.2
// $stack = new SplQueue;

// for ($i = 1; $i <= 3; $i++) {
//     $stack->enqueue("task" . $i);
// }

// while (!$stack->isEmpty()) {
//     echo $stack->dequeue() . " ";
// }

// echo "<br>" . "<br>";

// // Задание 3.3
// $q = new SplPriorityQueue();

// $q->insert("Low priority", 1);

// $q->insert("High priority", 10);

// $q->insert("Medium priority", 5);

// while (!$q->isEmpty()) {
//     echo $q->extract() . " / ";
// }

// echo "<br>" . "<br>";

// Задание 3.4
class MyPriorityQueue
{
    private array $arr = [];

    private function sort_up(int $i)
    {
        while ($i > 0) {
            $parent_index = (int)floor(($i - 1) / 2);
            if ($this->arr[$i]['priority'] < $this->arr[$parent_index]['priority']) {
                $parent = $this->arr[$parent_index];
                $this->arr[$parent_index] = $this->arr[$i];
                $this->arr[$i] = $parent;
            } else {
                break;
            }
            $i = $parent_index;
        }
    }

    private function sort_down(int $i)
    {
        $count = count($this->arr);

        while (2 * $i + 1 < $count) {
            $left = 2 * $i + 1;
            $right = 2 * $i + 2;
            $smallest = $left;

            if ($right < $count && $this->arr[$right]['priority'] < $this->arr[$left]['priority']) {
                $smallest = $right;
            }

            if ($this->arr[$i]['priority'] > $this->arr[$smallest]['priority']) {
                // Меняем их местами
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$smallest];
                $this->arr[$smallest] = $temp;

                $i = $smallest;
            } else {
                break;
            }
        }
    }

    public function insert(string $value, int $priority)
    {
        $this->arr[] = ['value' => $value, 'priority' => $priority];
        $this->sort_up(count($this->arr) - 1);
    }

    public function extractMin()
    {
        $value = $this->arr[0];

        $last = array_pop($this->arr);
        $this->arr[0] = $last;
        $this->sort_down(0);

        return $value;
    }

    public function peek()
    {
        return $this->arr[0] ?? null;
    }
}

$a = new MyPriorityQueue;

$a->insert("Hight", 100);
$a->insert("Low1", 1);
$a->insert("Medium", 10);
$a->insert("Low2", 2);

print_r($a->extractMin());

echo "<br>";

print_r($a);

echo "<br>";

print_r($a->peek());

echo "<br>" . "<br>";

// Задание 3.4

$users = [['name' => 'Ivan', 'age' => 10], ['name' => 'Mikhail', 'age' => 19]];
$result = [];

foreach ($users as $user) {

    if ($user['age'] > 18) {
        $result[] = $user;
    }
}
print_r($result);

$result = array_filter($users, function($user) {
    return $user['age'] > 18;
});
print_r($result);
