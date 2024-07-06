<?php

namespace App\Models;

class Track
{
	// katram atrumposmam ir nosaukums, garums un sarezgiba
	public function __construct
	(
		private readonly string $name,
		private readonly float $length,
		private readonly int $difficulty,
	) {}

	public function name(): string
	{
		return $this->name;
	}

	public function length(): float
	{
		return $this->length;
	}

	public function difficulty(): int
	{
		return $this->difficulty;
	}

}