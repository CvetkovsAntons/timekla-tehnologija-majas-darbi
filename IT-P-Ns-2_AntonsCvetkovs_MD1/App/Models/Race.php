<?php

namespace App\Models;

use App\Models\Crew\Crew;

class Race
{
	// katram braucienam ir komanda, kas piedalas ta
	// katrs brauciens notiek kada atrumposmaa
	// katram braucienam ir sakuma laiks
	// katram braucienam ir nobeiguma laiks
	public function __construct
	(
		private readonly Crew $crew,
		private readonly Track $track,
		private readonly int $start_time,
		private readonly int $finish_time
	) {}

	public function crew(): Crew
	{
		return $this->crew;
	}

	public function track(): Track
	{
		return $this->track;
	}

	public function start_time(bool $format = false): string|int
	{
		return $format ? $this->format_time($this->start_time) : $this->start_time;
	}

	public function finish_time(bool $format = false): string|int
	{
		return $format ? $this->format_time($this->finish_time) : $this->finish_time;
	}
	// total_time funkcija atgriez starpibu starp beigam un sakuma laikiem
	public function total_time(bool $format = false): string|int
	{
		$time = $this->finish_time - $this->start_time;
		return $format ? $this->format_time($time) : $time;
	}

	private function format_time(int $time): string
	{
		return date('H:i:s', $time);
	}

}