<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/header.php';

$stringLength = 18;

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
                <b class="colRace">Entry</b>
                <b class="colName" style="padding-left: 30px;">Change</b>
                <b class="colName" style="padding-left: 30px;">Delete</b>              
            </div>

            <hr>

            <?foreach ($listOfUsers as $key => $user): ?>
                

                <div style="display: flex; background: <?=$winnerColor?>;">
                    <span class="colId"><?=$user['id']?></span>
                    <span class="colName"><?=stringLengthCorrect($user['name'], $stringLength)?></span>
                    <span class="colName"><?=stringLengthCorrect($user['city'], $stringLength)?></span>
                    <span class="colCar"><?=stringLengthCorrect($user['car'], $stringLength)?></span>
                    <span class="colRace"><?=isset($user['entry']) && $user['entry'] ? 'yes' : 'no'?></span>
                    <a class="colName" href="/players/change?id=<?=$user['id']?>">
                        <button class="button"
                                style="
                                    width: 125px; 
                                    height: 25px; 
                                    /*transform: translateX(-60px); */
                                    font: 19px/25px 'Roboto', sans-serif;
                                    /*padding: 0 30px;*/
                                    background-color: royalblue;
                                ">
                            Change
                        </button>
                    </a>
                    <a class="colName" href="/players/delete?id=<?=$user['id']?>">
                        <button class="button"
                                style="
                                    width: 125px; 
                                    height: 25px; 
                                    /*transform: translateX(-30px); */
                                    font: 19px/25px 'Roboto', sans-serif;
                                    /*padding: 0 30px;                                    */
                                ">
                            Delete
                        </button>
                    </a>
                    
                </div>                

                <hr>               
                
            <?endforeach;?>

            <a href="/players/addNew">
                <button class="button" style="width: 100%; background-color: forestgreen;">Add</button>
            </a>

        </div>

    </section>
 
</main>    
    
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php';

?>