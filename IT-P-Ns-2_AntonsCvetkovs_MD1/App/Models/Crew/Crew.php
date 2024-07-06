<?php

namespace App\Models\Crew;

use App\Models\Car;

class Crew
{
	// katrai komandai is pilots
	// katrai komandai is otrais pilots
	// katrai komandai is savs numurs
	// katrai komandai is sava masina
	public function __construct
	(
		private readonly Pilot $pilot,
		private readonly CoPilot $co_pilot,
		private readonly int $crew_number,
		private readonly Car $car
	) {}

	public function pilot(): Pilot
	{
		return $this->pilot;
	}

	public function co_pilot(): CoPilot
	{
		return $this->co_pilot;
	}

	public function crew_number(): int
	{
		return $this->crew_number;
	}

	public function car(): Car
	{
		return $this->car;
	}

}