<?php
// Créer un tableau contenant les valeurs de 1 à 1000
$shuffleNumbers = [
    10,
    4,
    9,
    1,
    6,
    2,
    8,
    7,
    5,
    6
];

// Afficher le tableau
print_r($shuffleNumbers);


for ($i = 0; $i < count($shuffleNumbers) - 1; $i++) {
    for ($j = 0; $j < count($shuffleNumbers) - $i - 1; $j++) {
        if ($shuffleNumbers[$j] > $shuffleNumbers[$j + 1]) {
            $temp = $shuffleNumbers[$j];
            $shuffleNumbers[$j] = $shuffleNumbers[$j + 1];
            $shuffleNumbers[$j + 1] = $temp;
        }
    }
}

?>
<br>
<br>
<br>
<br>
<?php
print_r($shuffleNumbers);
?>