<?php

namespace app\Models;

class Sacensibas extends Model
{
	protected string $table = 'sacensibas';
	protected string $pivot_table = 'sacensibas_sponsori';
	protected string $pivot_column = 'sacensibas';

	protected array $columns = [
		'id',
		'name',
		'address',
		'start_date',
		'end_date'
	];

}