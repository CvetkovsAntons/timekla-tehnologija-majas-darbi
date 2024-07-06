<?php

namespace App\Models\Crew;

use App\Models\Crew\Base\CrewMember;

class Pilot extends CrewMember
{
	public function role(): string
	{
		return 'pilot';
	}

}