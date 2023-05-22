<?php
$string = "Inle Lake is a freshwater lake located in the Nyaungshwe Township of Taunggyi District of Shan State, part of Shan Hills in Myanamar (Burma).";

$length_of_str= strlen($string);

echo "<br>".$length_of_str."<br>";

$word_count= str_word_count($string);
echo $word_count."<br>";

echo "<br>All upper case <br>";
echo strtoupper($string)."<br>";

echo "<br>All lower case <br>";
echo strtolower($string)."<br>";

echo "<br>upper case first <br>";
echo ucfirst($string)."<br>";

echo "<br>lower case first <br>";
echo lcfirst($string)."<br>";

// remove all spaces from the string
$string = str_replace(' ', '', $string);
$char_count =  strlen($string);
echo "<br>".$char_count."<br>";
?>