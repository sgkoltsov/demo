<?php

namespace App;

class Attempt
{
	public $id;
	public $result;

	function __construct($id, $result)
	{
		$this->id = $id;
		$this->result = $result;		
	}

	public static function getAttemptsCount()
	{
		if (file_exists(FILE_ATTEMPTS_COUNT)) {
			$file = fopen(FILE_ATTEMPTS_COUNT, 'r');
		    $content = json_decode(fread($file, filesize(FILE_ATTEMPTS_COUNT)), true);
		    fclose($file);
		} else {
			$content = ['attemptsCount' => 4];
		}

	    return $content['attemptsCount'];
	}

	public static function setAttemptsCount($attemptsCount)
	{
		if ($attemptsCount > 12) {
			$attemptsCount = 12;
		} elseif ($attemptsCount < 1) {
			$attemptsCount = 1;
		}

		$file = fopen(FILE_ATTEMPTS_COUNT, 'w');
		fwrite($file, json_encode(['attemptsCount' => $attemptsCount]));
		fclose($file);
	}

	public static function getAllAttempts(): array
	{
		$attemptsList = [];

		if (file_exists(FILE_OF_ATTEMPTS)) {
			$file = fopen(FILE_OF_ATTEMPTS, 'r');
		    $attemptsList = json_decode(fread($file, filesize(FILE_OF_ATTEMPTS)), true);
		    fclose($file);
		}

	    return $attemptsList;
	}

	public static function setAllAttempts($attemptsList)
	{
		$arrayOfAttempts = [];

		$count = 1;

		foreach ($attemptsList as $key => $value) {
			$attempt = [				
				'id' => intval(explode('_', $key)[0]),
				'result' => intval($value),								
			];

			$arrayOfAttempts[] = $attempt;
			$count++;
		}

		$file = fopen(FILE_OF_ATTEMPTS, 'w');
		fwrite($file, json_encode($arrayOfAttempts));
		fclose($file);
	}

}