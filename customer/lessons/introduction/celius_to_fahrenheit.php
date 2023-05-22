<?php

echo "Using for loop <br>";
echo "Celcius" . str_repeat('&nbsp;', 5) . "Fahrenheit<br>";
for ($i = 0; $i <= 100; $i++) {
    $fahrenheit = ($i * 1.8) + 32;
    if ($i < 10) {
        $i = " $i";
    }
    // printf("%-3s\t\t%-15s <br>", $i, $fahrenheit);

    echo "<p>$i " . str_repeat('&nbsp;', 10) . "$fahrenheit</p>";
}
?>