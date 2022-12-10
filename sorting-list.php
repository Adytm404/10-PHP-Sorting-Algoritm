1. Bubble Sort dengan PHP

<?php 
function bubbleSort($arr) 
{ 
    $n = count($arr); 
    for($i = 0; $i < $n; $i++) 
    { 
        for ($j = 0; $j < $n - $i - 1; $j++) 
        { 
            if ($arr[$j] > $arr[$j+1]) 
            { 
                $t = $arr[$j]; 
                $arr[$j] = $arr[$j+1]; 
                $arr[$j+1] = $t; 
            } 
        } 
    } 
    return $arr; 
} 

$arr = array(64, 34, 25, 12, 22, 11, 90); 
$arr = bubbleSort($arr); 
$n = count($arr); 
for($i = 0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?>

2. Insertion Sort dengan PHP

<?php 

function insertionSort($arr) 
{ 
    $n = count($arr); 
    for ($i = 1; $i < $n; $i++) 
    { 
        $key = $arr[$i]; 
        $j = $i-1; 
  
        while ($j >= 0 && $arr[$j] > $key) 
        { 
            $arr[$j+1] = $arr[$j]; 
            $j = $j-1; 
        } 
        $arr[$j+1] = $key; 
    } 
    return $arr; 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$arr = insertionSort($arr); 
$n = count($arr); 
for ($i=0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?>

3. Selection Sort dengan PHP

<?php 

function selectionSort($arr) 
{ 
    $n = count($arr); 
  
    for ($i = 0; $i < $n-1; $i++) 
    { 
        $min_idx = $i; 
        for ($j = $i+1; $j < $n; $j++) 
            if ($arr[$j] < $arr[$min_idx]) 
                $min_idx = $j; 
  
        $t = $arr[$min_idx]; 
        $arr[$min_idx] = $arr[$i]; 
        $arr[$i] = $t; 
    } 
  
    return $arr; 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$arr = selectionSort($arr); 
$n = count($arr); 
for ($i=0; $i<$n; $i++) 
    echo $arr[$i]." "; 

?>

4. Quick Sort dengan PHP

<?php 

function partition($arr, $low, $high) 
{ 
    $pivot = $arr[$high]; 
    $i = ($low - 1); 
    for ($j = $low; $j <= $high - 1; $j++) 
    { 
        if ($arr[$j] < $pivot) 
        { 
            $i++; 
            $t = $arr[$i]; 
            $arr[$i] = $arr[$j]; 
            $arr[$j] = $t; 
        } 
    } 
    $t = $arr[$i + 1]; 
    $arr[$i + 1] = $arr[$high]; 
    $arr[$high] = $t; 
    return ($i + 1); 
} 
  
function quickSort($arr, $low, $high) 
{ 
    if ($low < $high) 
    { 
        $pi = partition($arr, $low, $high); 
        quickSort($arr, $low, $pi - 1); 
        quickSort($arr, $pi + 1, $high); 
    } 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$n = count($arr); 
quickSort($arr, 0, $n - 1); 
  
for ($i = 0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?>

5. Merge Sort dengan PHP

<?php 

function merge(&$arr, $l, $m, $r) 
{ 
    $n1 = $m - $l + 1; 
    $n2 = $r - $m; 
  
    $L = array(); 
    $R = array(); 
  
    for ($i = 0; $i < $n1; $i++) 
        $L[$i] = $arr[$l + $i]; 
    for ($j = 0; $j < $n2; $j++) 
        $R[$j] = $arr[$m + 1 + $j]; 
  
    $i = 0; 
    $j = 0; 
    $k = $l; 
  
    while ($i < $n1 && $j < $n2) 
    { 
        if ($L[$i] <= $R[$j]) 
        { 
            $arr[$k] = $L[$i]; 
            $i++; 
        } 
        else
        { 
            $arr[$k] = $R[$j]; 
            $j++; 
        } 
        $k++; 
    } 
  
    while ($i < $n1) 
    { 
        $arr[$k] = $L[$i]; 
        $i++; 
        $k++; 
    } 
  
    while ($j < $n2) 
    { 
        $arr[$k] = $R[$j]; 
        $j++; 
        $k++; 
    } 
} 
  
function mergeSort(&$arr, $l, $r) 
{ 
    if ($l < $r) 
    { 
        $m = ($l + $r) / 2; 
        mergeSort($arr, $l, $m); 
        mergeSort($arr, $m + 1, $r); 
        merge($arr, $l, $m, $r); 
    } 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$n = count($arr); 
  
mergeSort($arr, 0, $n - 1); 
  
for ($i = 0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?>

6. Heap Sort dengan PHP

<?php 

function heapify(&$arr, $n, $i) 
{ 
    $largest = $i; 
    $l = 2 * $i + 1; 
    $r = 2 * $i + 2; 
  
    if ($l < $n && $arr[$l] > $arr[$largest]) 
        $largest = $l; 
  
    if ($r < $n && $arr[$r] > $arr[$largest]) 
        $largest = $r; 
  
    if ($largest != $i) 
    { 
        $t = $arr[$i]; 
        $arr[$i] = $arr[$largest]; 
        $arr[$largest] = $t; 
  
        heapify($arr, $n, $largest); 
    } 
} 
  
function heapSort(&$arr, $n) 
{ 
    for ($i = $n / 2 - 1; $i >= 0; $i--) 
        heapify($arr, $n, $i); 
  
    for ($i = $n - 1; $i >= 0; $i--) 
    { 
        $t = $arr[0]; 
        $arr[0] = $arr[$i]; 
        $arr[$i] = $t; 
  
        heapify($arr, $i, 0); 
    } 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$n = count($arr); 
  
heapSort($arr, $n); 
  
for ($i = 0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?>

7. Counting Sort dengan PHP

<?php 

function countingSort(&$arr, $n) 
{ 
    $m = max($arr); 
    $count = array_fill(0, $m + 1, 0); 
  
    for ($i = 0; $i < $n; $i++) 
        $count[$arr[$i]]++; 
  
    $i = 0; 
    for ($j = 0; $j <= $m; $j++) 
        for ($k = 0; $k < $count[$j]; $k++) 
            $arr[$i++] = $j; 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$n = count($arr); 
  
countingSort($arr, $n); 
  
for ($i = 0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?>


8. Radix Sort dengan PHP

<?php 

function countSort($arr, $exp) 
{ 
    $n = count($arr); 
    $output = array_fill(0, $n, 0); 
    $count = array_fill(0, 10, 0); 
  
    for ($i = 0; $i < $n; $i++) 
        $count[ ($arr[$i]/$exp)%10 ]++; 
  
    for ($i = 1; $i < 10; $i++) 
        $count[$i] += $count[$i - 1]; 
  
    for ($i = $n - 1; $i >= 0; $i--) 
    { 
        $output[$count[ ($arr[$i]/$exp)%10 ] - 1] = $arr[$i]; 
        $count[ ($arr[$i]/$exp)%10 ]--; 
    } 
  
    for ($i = 0; $i < $n; $i++) 
        $arr[$i] = $output[$i]; 
} 
  
function radixSort($arr, $n) 
{ 
    $m = max($arr); 
  
    for ($exp = 1; $m/$exp > 0; $exp *= 10) 
        countSort($arr, $exp); 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$n = count($arr); 
radixSort($arr, $n); 
  
for ($i = 0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?>

9. Shell Sort dengan PHP

<?php 

function shellSort(&$arr, $n) 
{ 
    for ($gap = floor($n/2); $gap > 0; $gap = floor($gap/2)) 
    { 
        for ($i = $gap; $i < $n; $i++) 
        { 
            $temp = $arr[$i]; 
            $j;             
            for ($j = $i; $j >= $gap && $arr[$j - $gap] > $temp; $j -= $gap) 
                $arr[$j] = $arr[$j - $gap]; 
              
            $arr[$j] = $temp; 
        } 
    } 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$n = count($arr); 
  
shellSort($arr, $n); 
  
for ($i = 0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?> 

10. Comb Sort dengan PHP

<?php 

function combSort(&$arr, $n) 
{ 
    $gap = $n; 
  
    $swapped = true; 
  
    while ($gap != 1 || $swapped == true) 
    { 
        $gap = floor($gap / 1.3); 
  
        if ($gap < 1) 
            $gap = 1; 
  
        $i = 0; 
        $swapped = false; 
  
        while ($i + $gap < $n) 
        { 
            if ($arr[$i] > $arr[$i + $gap]) 
            { 
                $t = $arr[$i]; 
                $arr[$i] = $arr[$i + $gap]; 
                $arr[$i + $gap] = $t; 
  
                $swapped = true; 
            } 
            $i++; 
        } 
    } 
} 
  
$arr = array(64, 34, 25, 12, 22, 11, 90); 
$n = count($arr); 
combSort($arr, $n); 
  
for ($i = 0; $i < $n; $i++) 
    echo $arr[$i]." "; 

?>
