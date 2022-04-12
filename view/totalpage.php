<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/header.php';

$sortingKey = isset($_GET['race']) ? $_GET['race'] : 'attSum';

$users = arraySort($listOfUsers, 'attSum', SORT_DESC);
$count = 1;
$winnersId = [];

foreach ($users as $key => $user) {
    if ($count < 4) {
        $winnersId[$count] = $user['id'];
    } else {
        break;
    }

    $count++;
}

$listOfUsers = arraySort($listOfUsers, $sortingKey, SORT_DESC);

$winnersCount = 1;
$winnerColor = 'transparent';

$stringLength = 22;

if ($attemptsCountRequired > 10) {
    $stringLength = 12;
} elseif ($attemptsCountRequired > 8) {
    $stringLength = 14;
} elseif ($attemptsCountRequired > 6) {
    $stringLength = 16;
} elseif ($attemptsCountRequired > 4) {
    $stringLength = 18;
} elseif ($attemptsCountRequired > 2) {
    $stringLength = 20;
}

?>    

<main class="shop-page">  

    <script type="text/javascript">
        document.querySelector('.shop-page').classList.add('fade');
        setTimeout(() => document.querySelector('.shop-page').classList.remove('fade'), 700);
    </script>
    
    <section class="container">

        <div style="padding: 50px;">

            <h1 class="h h--1" style="text-align: center;"><?=$title?></h1>

            <div style="display: flex;">
                <b class="colId">ID</b>
                <b class="colName">Name</b>
                <b class="colName">City</b>
                <b class="colCar">Car</b>
                <?for ($i=1; $i <= $attemptsCountRequired ; $i++): ?>

                    <b class="colRace">
                        <a href="/finalTable/?race=<?='att' . $i ?>">R<?=$i?></a>                            
                    </b>

                <?endfor;?>
                <b class="colRace">
                    <a href="/finalTable/?race=attSum">Total</a>
                </b>
            </div>

            <hr>

            <?foreach ($listOfUsers as $user): ?>

                <?php

                switch ($user['id']) {
                    case $winnersId[1]:
                        $winnerColor = '#fdd700';
                        break;
                    case $winnersId[2]:
                        $winnerColor = '#c0c0c0';
                        break;
                    case $winnersId[3]:
                        $winnerColor = '#b87333';
                        break;
                    
                    default:
                        $winnerColor = 'transparent';
                        break;
                }

                ?>

                <div style="display: flex; background: <?=$winnerColor?>;">
                    <span class="colId"><?=$user['id']?></span>
                    <span class="colName"><?=stringLengthCorrect($user['name'], $stringLength)?></span>
                    <span class="colName"><?=stringLengthCorrect($user['city'], $stringLength)?></span>
                    <span class="colCar"><?=stringLengthCorrect($user['car'], $stringLength)?></span>
                    <?for ($i=1; $i <= $attemptsCountRequired ; $i++): ?> 
                        <span class="colRace"><?=$user['att' . $i]?></span>
                    <?endfor;?>
                    <span class="colRace"><?=$user['attSum']?></span>
                </div> 

                <?php $winnersCount++;?>

                <hr>               
                
            <?endforeach;?>

        </div>

    </section>
 
</main>    
    
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php';

?>