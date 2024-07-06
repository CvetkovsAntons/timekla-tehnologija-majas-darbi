<?php

namespace app\Models;

class Model
{
	protected string $table; // tabulas nosaukums
	protected string $primary_key = 'id'; // pirmara atslega
	protected string $pivot_table = ''; // many-to-many starp tabulas nosaukums
	protected string $pivot_column = ''; // many-to-many tabulas references kolonna
	protected array $columns = []; // tabulas kolonnas

	public final function columns(): array
	{
		return $this->columns;
	}

	public final function table(): string
	{
		return $this->table;
	}

	public final function primary_key(): string
	{
		return $this->primary_key;
	}

	public final function pivot_table(): string
	{
		return $this->pivot_table;
	}

	public final function pivot_column(): string
	{
		return $this->pivot_column;
	}
	// query funkcija atgriez jaunu Query kalses objektu
	public final static function query(): Query
	{
		// ka parametru padodam objektu, no kura ta tika izsaukta
		// ka parametrs or padods new static, jo static norada uz objektu,
		// no kura funkcija tika izsautka, piemeram no child klases
		// slef keyword atgriez tikai Model klases objektu
		return new Query(new static);
	}

}