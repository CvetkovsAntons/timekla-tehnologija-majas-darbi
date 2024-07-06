<?php

namespace app\Models;

class Sponsori extends Model
{
	protected string $table = 'sponsori';
	protected string $pivot_table = 'sacensibas_sponsori';
	protected string $pivot_column = 'sponsors';

	protected array $columns = [
		'id',
	    'name',
	    'url',
	    'logo',
	    'phone_number',
	    'notes'
	];

}