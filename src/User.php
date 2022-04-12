<?php

namespace App;

class User
{
	public $id;
	public $name;
	public $city;
	public $car;
	public $entry;

	
	function __construct($id, $name, $city, $car, $entry = false)
	{
		$this->id = $id;
		$this->name = $name;
		$this->city = $city;
		$this->car =$car;
		$this->entry =$entry;
	}

	public static function getAllUsers(): array
	{
		$listOfUsers = [];

		if (file_exists(FILE_OF_USERS)) {

			$file = fopen(FILE_OF_USERS, 'r');
		    $content = fread($file, filesize(FILE_OF_USERS));
		    fclose($file);

		    $listOfUsers = json_decode($content, true);

		    foreach ($listOfUsers as $key => $user) {
		    	if (! isset($user['entry'])) {
		    		$listOfUsers[$key]['entry'] = true;
		    	}
		    }
		}		

	    return $listOfUsers;
	}

	public static function getEntryUsers()
	{
		$listOfUsers = self::getAllUsers();

		$listOfEntryUsers = [];

		foreach ($listOfUsers as $user) {
			if ($user['entry']) {
				$listOfEntryUsers[] = $user;
			}
		}

		return $listOfEntryUsers;
	}

	public static function saveAllUsers($listOfUsers)
	{
		$file = fopen(FILE_OF_USERS, 'w');
		fwrite($file, json_encode($listOfUsers));
		fclose($file);
	}

	public static function getNewUserId()
	{
		$listOfUsers = self::getAllUsers();

		if (!empty($listOfUsers)) {
          	
        	for ($id = 1 ; $id <= count($listOfUsers) ; $id++) {

            	$freeId = true;  

            	foreach ($listOfUsers as $user) {
                	if ($id == $user['id']) {
                    	$freeId = false;
                      	break;
                    }  
                }  
                if ($freeId) {
                    return $id;
                }  
            } 			
		}

		return count($listOfUsers) + 1;
	}

	public static function addNewUser(User $user)
	{
		$listOfUsers = self::getAllUsers();
		$listOfUsers[] = $user;
		self::saveAllUsers($listOfUsers);
	}

	public static function getUserById($id)
	{
		foreach (self::getAllUsers() as $user) {
			if ($user['id'] == $id) {
				return $user;
			}
		}
	}

	public static function changeUserData($id, $name, $city, $car, $entry)
	{
		$listOfUsers = self::getAllUsers();
		
		foreach ($listOfUsers as $key => $user) {
			if ($user['id'] == $id) {
				$listOfUsers[$key]['name'] = $name;
				$listOfUsers[$key]['city'] = $city;
				$listOfUsers[$key]['car'] = $car;
				$listOfUsers[$key]['entry'] = $entry;
				break;
			}
		}
		
		self::saveAllUsers($listOfUsers);	
	}

	public static function deleteUserById($id)
	{
		$listOfUsers = self::getAllUsers();
		
		foreach ($listOfUsers as $key => $user) {
			if ($user['id'] == $id) {
				unset($listOfUsers[$key]);
				break;
			}
		}
		
		self::saveAllUsers($listOfUsers);
	}

	public static function getEntryUsersWithAttempts($attemptsCount)
	{
		$listOfEntryUsers = self::getEntryUsers();

		$listOfAttempts = Attempt::getAllAttempts();

		$attemptsCountRequired = $attemptsCount;

        foreach ($listOfEntryUsers as $key =>$user) {         

            $attemptsCount = 1;
            $attemptsAllSum = 0; 
            
            foreach ($listOfAttempts as $attempt) {
                
                if ($user['id'] === $attempt['id']) {
                    $listOfEntryUsers[$key]['att' . $attemptsCount] = $attempt['result'];
                    $attemptsCount++;
                    $attemptsAllSum += $attempt['result'];
                }
            }

            $listOfEntryUsers[$key]['attSum'] = $attemptsAllSum;
            $attemptsCountCurrent = --$attemptsCount;

            if ($attemptsCountCurrent < $attemptsCountRequired) {
            	for ($i = $attemptsCountCurrent + 1 ; $i <= $attemptsCountRequired ; $i++) { 
            		$listOfEntryUsers[$key]['att' . $i] = 0;
            	}
            } elseif ($attemptsCountCurrent > $attemptsCountRequired) {
            	for ($i = $attemptsCountCurrent ; $i > $attemptsCountRequired ; $i--) { 
            		$listOfEntryUsers[$key]['attSum'] -= $listOfEntryUsers[$key]['att' . $i];
            		unset($listOfEntryUsers[$key]['att' . $i]);
            	}
            }
        }

        return $listOfEntryUsers;
	}
}