<?php

// create array with days of week

$days_of_week = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturaday", "Sunday");

// display the element from array(do while)

$counter1 = 0;
do {

    echo $days_of_week[$counter1] . ", ";
    $counter1++;
} while ($counter1 < sizeof($days_of_week));

echo "<br>";
// display the element from array(while)

$counter2 = 0;
while ($counter2 < sizeof($days_of_week)) {
    echo $days_of_week[$counter2] . ", ";
    $counter2++;
}
echo "<br>";
// display the element from array(for)

for ($i = 0; $i < sizeof($days_of_week); $i++) {
    echo "<p style='font-size:20px;'>" . $days_of_week[$i] . "</p>";
}

// display the element from array(forreach)

foreach ($days_of_week as $day) {
    echo "<h4>" . $day . "</h4>";
}
