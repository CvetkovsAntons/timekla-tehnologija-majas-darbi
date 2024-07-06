<?php

namespace App\Models\Crew\Base;

abstract class CrewMember
{
	// katram komandbiedram if vards un uzvards
	public function __construct
	(
		protected readonly string $name,
		protected readonly string $surname,
	) {}

	public function name(): string
	{
		return $this->name;
	}

	public function surname(): string
	{
		return $this->surname;
	}

	public function full_name(): string
	{
		return "$this->name $this->surname";
	}

	abstract public function role(): string;

}