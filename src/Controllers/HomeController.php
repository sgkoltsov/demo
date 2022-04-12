<?php
namespace App\Controllers;

use App\View\View;
use App\User;
use App\Attempt;

class HomeController
{
    public function index()
    {
       return new View('homepage');
    }

    public function players()
    {
        return new View('playerspage', ['title' => 'Список участников', 'listOfUsers' => User::getAllUsers()]);
    }

    public function addNewPlayer()
    {
        return new View('addplayerpage', ['title' => 'Форма добавления нового участника']);    
    }

    public function savePlayer()    
    {
        $newUser = new User(User::getNewUserId(), $_POST['name'], $_POST['city'], $_POST['car'], isset($_POST['entry']));

        User::addNewUser($newUser);

        header('Location: ' . '/players');
    }

    public function changePlayer()
    {
        $user = User::getUserById($_GET['id']);                

        return new View('changeplayerpage', [
            'title' => 'Изменение данных участника',
            'user' => $user,      
        ]);
    }

    public function changePlayerConfirm()
    {    
        User::changeUserData($_POST['id'], $_POST['name'], $_POST['city'], $_POST['car'], isset($_POST['entry']));

        header('Location: ' . '/players');
    }

    public function deletePlayer()
    {
        $user = User::getUserById($_GET['id']);

        return new View('confirmpage', [
            'title' => 'Подтвердите удаление участника',
            'message' => $user['name'] . ', г. ' . $user['city'],
            'btnConfirmLink' => '/players/confirmDelete?id=' . $user['id'],
            'btnConfirmText' => 'Delete',
            'btnCancelLink' => '/players',                        
        ]);
    }

    public function deletePlayerConfirm()
    {
        User::deleteUserById($_GET['id']);
        
        header('Location: ' . '/players');
    }

    public function races()
    { 
        $attemptsCount = Attempt::getAttemptsCount();

        $listOfUsersWithAttempts = User::getEntryUsersWithAttempts($attemptsCount);             

        return new View('racespage', [
            'title' => 'Управление заездами', 
            'listOfUsersWithAttempts' => $listOfUsersWithAttempts,
            'attemptsCountRequired' => $attemptsCount,
        ]);
    }

    public function addRace()
    {
        $attemptsCount = Attempt::getAttemptsCount();

        Attempt::setAttemptsCount(++$attemptsCount);

        header('Location: ' . '/race');
    }

    public function reduceRace()
    {
        $attemptsCount = Attempt::getAttemptsCount();

        Attempt::setAttemptsCount(--$attemptsCount);

        header('Location: ' . '/race');
    }

    public function saveRace()
    {
        Attempt::setAllAttempts($_POST);

        header('Location: ' . '/race');
    }

    public function resetRace()
    {
        return new View('confirmpage', [
            'title' => 'Подтвердите обнуление результатов',
            'message' => 'Результаты всех заездов будут безвозвратно удалены',
            'btnConfirmLink' => '/race/confirmReset',
            'btnConfirmText' => 'Reset',
            'btnCancelLink' => '/race',                        
        ]);        
    }

    public function resetRaceConfirm()
    {
        Attempt::setAllAttempts([]);

        header('Location: ' . '/race');
    }

    public function total()
    {   
        $attemptsCount = Attempt::getAttemptsCount();

        $listOfUsers = User::getEntryUsersWithAttempts($attemptsCount);           

        return new View('totalpage', [
            'title' => 'Турнирная таблица', 
            'listOfUsers' => $listOfUsers,
            'attemptsCountRequired' => $attemptsCount,
        ]);
    }
}
