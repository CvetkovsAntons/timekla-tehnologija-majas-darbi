<?php

require_once('autoload.php');

use App\Models\Car;
use App\Models\Crew\CoPilot;
use App\Models\Crew\Crew;
use App\Models\Crew\Pilot;
use App\Models\Race;
use App\Models\Track;

// ar for loop veidojam 3 atrumposmus
$tracks = [];
for ($i = 0; $i < 3; $i++) {
	$name = 'Track ' . ($i + 1); // nosaukums
	$difficulty = rand(1, 5); // sarezgiba
	$length = round($difficulty + 0.99 / rand(1, 10), 2); // veidojam nejausu atrumposma garumu

	$tracks[] = new Track($name, $length, $difficulty); // pievinjam atrumposmu masivaa
}
// ar otru for loop viedojam 4 komandas un 12 braucienus.
// 4 komandas, katrai 1 brauciens, katra atrumposmaa
$races = [];
for ($i = 0; $i < 4; $i++) {
	$pilot    = new Pilot('Pilot', $i); // izveidojam pilota objektu
	$co_pilot = new CoPilot('Co-pilot', $i); // izveidojam otra pilota objektu
	// izveidojam Car objektu, ar nejausu kategoriju
	$car_types = Car::types();
	$car = new Car($car_types[rand(0, count($car_types) - 1)], $i + 1000);
	// veidojam komandas objektu
	$crew = new Crew($pilot, $co_pilot, $i, $car);

	foreach ($tracks as $track) { // katra komanda, piedalas sacensibas katra atrumposmaa
		$start_time = time(); // sakuma laiks UNIX laika formataaa
		$finish_time = $start_time + rand(500, 1000);  // brauciea beigas laiks UNIX laika formataaa
		// izvediojam brauciena objektus
		$races[] = new Race($crew, $track, $start_time, $finish_time);
	}
}

usort($races, function (Race $a, Race $b) {
	// sakumaa salidzinam atrumposmas nosaukumus
	$name_cmp = strcmp($a->track()->name(), $b->track()->name());
	// ja nosaukumi ir dazadi, tad atrgiezam ta starpibu
	// ja ne, tad salidzinam laikus
	return $name_cmp != 0 ? $name_cmp : $a->total_time() - $b->total_time();
});

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>IT-P-Ns-2_AntonsCvetkovs_MD1</title>
	<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Track</th>
			<th>Track length</th>
			<th>Track difficulty</th>
			<th>Car Number</th>
			<th>Pilot</th>
			<th>Co-pilot</th>
			<th>Race time</th>
		</tr>

		<?php
		foreach ($races as $race) { ?>
			<tr>
				<td><?= $race->track()->name() ?></td>
				<td><?= $race->track()->length() ?></td>
				<td><?= $race->track()->difficulty() ?></td>
				<td><?= $race->crew()->car()->number() ?></td>
				<td><?= $race->crew()->pilot()->full_name() ?></td>
				<td><?= $race->crew()->co_pilot()->full_name() ?></td>
				<td><?= $race->total_time(true) ?></td>
			</tr>
			<?php
		} ?>
	</table>
</body>
</html>