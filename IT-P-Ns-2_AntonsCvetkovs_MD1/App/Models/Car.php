<?php

namespace App\Models;

class Car
{
	// katrai masianai ir kategorija un numurs
	public function __construct
	(
		private readonly string $type,
		private readonly int $number
	) {}

	public function type(): string
	{
		return $this->type;
	}

	public function number(): int
	{
		return $this->number;
	}
	// masinas kategorijas tika panemti no sejenes: https://en.wikipedia.org/wiki/Rallying
	public static function types(): array
	{
		return [
			'Group 1', 'Group 2', 'Group 3', 'Group 4', 'Group N',
			'Group A', 'Group B', 'Four-Wheel', 'Cross-country',
			'Alternative energy', 'Historic', 'Rally Specific', 'Any'
		];
	}

}