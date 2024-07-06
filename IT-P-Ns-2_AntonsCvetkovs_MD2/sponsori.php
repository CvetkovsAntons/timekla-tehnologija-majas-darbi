<?php

require_once('autoload.php');

use app\Models\Sacensibas;
use app\Models\Sponsori;



$sacensibas = Sacensibas::query()->select()->where('id', '=', $_GET['id'])->get();
$sacensibas = $sacensibas[0]; // dabunam masivu ar chempionata datiem

$sponsori = [];
foreach (Sacensibas::query()->pivot($_GET['id']) as $v) {
	$sponsori[] = $v['sponsors']; // pievienojam visus si cempionata sponsoru ID masiva
}

$model = new Sponsori();
// dabunam datus par visiem chempionata sponsoriem
$sponsori = $model::query()->select()->where('id', 'IN', $sponsori)->get();;

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

<h3>Championship data</h3>
<table>
<?php foreach ($sacensibas as $column => $value) { ?>
	<tr>
		<td><?= $column ?></td>
		<td><?= $value ?></td>
	</tr>
<?php } ?>
</table>

<h3>Championship sponsors</h3>
<table>
	<tr>
		<?php foreach ($model->columns() as $column) { ?>
			<td><?= $column ?></td>
		<?php } ?>
	<tr>
	<?php foreach ($sponsori as $sponsors) { ?>
	<tr>
		<?php foreach ($sponsors as $k => $v) { ?>
			<td>
				<?php if (in_array($k, ['url', 'name', 'logo'])) { ?>
					<a href="<?= $sponsors['url'] ?>" target="_blank">
						<?php if ($k == 'logo') { ?>
							<img src="<?php echo "images/$v"; ?>" alt="not_found" style="width: 20%">
						<?php } else { ?>
							<?= $v ?>
						<?php } ?>
					</a>
				<?php } else { ?>
					<?= $v ?>
				<?php } ?>
			</td>
		<?php } ?>
	</tr>
	<?php } ?>
</table>
</body>
</html>
