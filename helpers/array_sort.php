<?php

function arraySort(array $array, $key = 'sort', $sort = SORT_ASC): array
{	
	usort($array, function ($element1, $element2) use($key) {

		if ($element1[$key] === $element2[$key]) {
			return 0;
		}
		return ($element1[$key] < $element2[$key]) ? -1 : 1;
	});

	if ($sort == SORT_ASC) {
		return $array;
	} elseif ($sort == SORT_DESC) {
		return array_reverse($array);
	}
}