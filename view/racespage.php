<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/header.php';

$stringLength = 22;

if ($attemptsCountRequired > 10) {
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

            <div style="padding-bottom: 20px;">
                <a href="/race/add">
                    <button class="button" style="background-color: forestgreen; width: 100%; margin-bottom: 10px;">Add Race (R)</button>
                </a>

                <a href="/race/reduce">
                    <button class="button" style="width: 100%">Reduce Race (R)</button>
                </a>
            </div>

            <div style="display: flex;">
                <b class="colId">ID</b>
                <b class="colName">Name</b>
                
                <?for ($i=1; $i <= $attemptsCountRequired ; $i++): ?>

                    <b class="colRace">R<?=$i?></b>

                <?endfor;?>                
            </div>

            <hr>

            <form action="/race/save" method="post">
                
                <?foreach ($listOfUsersWithAttempts as $user): ?>

                    <div style="display: flex;">
                        <span class="colId"><?=$user['id']?></span>
                        <span class="colName"><?=stringLengthCorrect($user['name'], $stringLength)?></span>
                       
                        <?for ($i=1; $i <= $attemptsCountRequired ; $i++): ?>

                            <div class="colRace">
                                <input 
                                    type="number" 
                                    name="<?=$user['id']?>_<?=$i?>"
                                    value="<?=$user['att' . $i]?>"
                                    min = 0
                                    max = 999
                                    required
                                    style = "width: 65%; color: #787B7F; "                                                                  
                                >
                            </div>

                        <?endfor;?>
                        
                    </div>              

                    <hr>                               
                    
                <?endforeach;?>

            <button class="button" type="submit" style="background-color: royalblue; width: 100%">Save changes</button>  

            </form>

            <a href="/race/reset">
                <button class="button" style="margin-top: 10px; width: 100%; background-color: gray;">Reset results to zero</button>
            </a> 

        </div>

    </section>
 
</main>    
    
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php';

?>