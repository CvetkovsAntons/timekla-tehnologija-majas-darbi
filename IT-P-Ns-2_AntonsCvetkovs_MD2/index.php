<?php

require_once('autoload.php');

use app\Models\Sacensibas;

$model = new Sacensibas();

$sacensibas = [];
foreach (['2021', '2022', '2023'] as $year) {
	$sacensibas[$year] = $model::query()->select()
		->where('start_date', 'like', "$year%")
		->orderBy('start_date')->get();
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>IT-P-Ns-2_AntonsCvetkovs_MD2</title>
	<style>
        table {
            width: 100%;
            border-collapse: collapse;
	        margin-bottom: 25px;
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
<?php
foreach ($sacensibas as $year => $rows) { ?>
	<h3><?= $year; ?></h3>
	<table>
		<tr>
			<?php foreach ($model->columns() as $column) { ?>
				<td><?= $column ?></td>
			<?php } ?>
		<tr>
			<?php foreach ($rows as $row) { ?>
		<tr>
			<?php foreach ($row as $key => $value) { ?>
				<td>
					<?php if ($key == 'name') { ?>
						<a href="sponsori.php?id=<?= $row['id'] ?>" target="_blank"><?= $value ?></a>
					<?php } else { ?>
						<?= $value ?>
					<?php } ?>
				</td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
<?php } ?>
</body>
</html>