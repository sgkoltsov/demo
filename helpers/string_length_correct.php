<?php

function stringLengthCorrect($string, $length)
{	
	if (mb_strlen($string) > $length) {

		return mb_substr($string, 0, $length) . '...';
	}

	return $string;
}