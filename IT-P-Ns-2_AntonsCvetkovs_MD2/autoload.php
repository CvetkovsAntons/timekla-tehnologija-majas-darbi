<?php
// si funkcija iet caur viesiem failiem "App" direktorijaa
function autoload(array $files): void
{
	foreach ($files as $filename) {
		if ($filename != "app/Views") {
			if (is_dir($filename)) { // ja ta ir direktroija
				autoload(glob("$filename/*")); // tad rekursivi ejam caur si mapei
			} else if (str_ends_with($filename, '.php')) { // ja tas ir php fails
				require_once $filename; // tad require to
			}
		}
	}
}
// GLOB_ONLYDIR - tikai direktorijas
autoload(glob('*', GLOB_ONLYDIR));
