<?php

namespace App\Models\Crew;

use App\Models\Crew\Base\CrewMember;

class CoPilot extends CrewMember
{
	public function role(): string
	{
		return 'co-pilot';
	}

}