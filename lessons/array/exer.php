<?php
//exercise 1
$color = array(4=>"white", 6=>"green",11=>"red");
echo "Exercicse 1<br>";
echo $color[4]."<br><br>";


// exercise 2

$color= array("white", "green","red","blue","black");
echo "Exercicse 2<br>";
echo "The memeory of that scene for me is like a frame of film forever frozen at that moment: the $color[2] carpet, the $color[1] lawn, the $color[0] house, the leaden sky. The new president and his first lay. - Richard M.Nixon <br><br>";


// exercise 3

$x = array(1, 2, 3, 4, 5);
unset($x[3]);
$new  = $x ;
echo "Exercicse 3<br>";
var_dump($new);
echo "<br><br>";

// exercise 4
$original_array = array(1, 2, 3, 4, 5);

echo "Exercicse 4<br>";
echo "Original array: <br>";
print_r($original_array);

$new_item = '$';
$insert_position = 3;
array_splice($original_array, $insert_position, 0, $new_item);

echo "After inserting  '$' the array is:  <br>";
print_r($original_array);
echo "<br><br>";

// exercise 5
$students = array("Sophia"=>"31","Jacob"=>"41","Wiliam"=>"39","Ramesh"=>"40");
echo "Exercicse 5<br>";
// a) ascending order sort by value
echo "ascending order sort by value <br>";
asort($students);
print_r($students);
echo "<br>";
// b) ascending order sort by key
echo "ascending order sort by key <br>";
ksort($students);
print_r($students);
echo "<br>";
// c) descending order sorting by value
echo "descending order sorting by value <br>";
arsort($students);
print_r($students);
echo "<br>";
// d) descending order sorting by key
echo "descending order sorting by key <br>";
krsort($students);
print_r($students);
echo "<br><br>";


// exercise 6

$charAry = array("abcd","abc","de","hjjj","g","wer");
$shortest = 999;
$longest = 0;
foreach($charAry as $char){
    $current = strlen($char);
    if(  $current < $shortest){
        $shortest =  $current;
    }else if(  $current > $longest){
        $longest =  $current;
    }
}
echo "Exercicse 6<br>";
echo "The shortest array length is $shortest. The longest array length is $longest."
?>