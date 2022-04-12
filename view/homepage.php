<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/header.php';

?>    

<main class="page-delivery">

    <script type="text/javascript">
        document.querySelector('.page-delivery').classList.add('fade');
        setTimeout(() => document.querySelector('.page-delivery').classList.remove('fade'), 700);
    </script>

    <h1 class="h h--1" style="text-align: center;">Краткое описание</h1>
    
    <section class="page-description__info">
        
        <header class="page-description__desc" style="margin-bottom: 20px;">
            Помимо этого, сайт содержит еще три основных раздела:            
        </header>

        <ul class="page-description__list">
            <li>
                <b class="page-description__item-title">Участники</b>
                <p class="page-description__item-desc">
                   Здесь мы можем посмотреть список всех гонщиков когда-либо участвующих в соревнованиях, дополнить его, отредактировать. По каждому гонщику можем принять решение о его участии в предстоящих заездах.
                </p>
            </li>

            <li>
                <b class="page-description__item-title">Заезды</b>
                <p class="page-description__item-desc">
                    Здесь можем определить необходимое количество заездов в предстоящих соревнованиях, занести результаты по каждому этапу, откорректировать или обнулить их. В приведенном списке находятся гонщики допущенные к соревнованиям.
                </p>
            </li>

            <li>
                <b class="page-description__item-title">Итоговая таблица</b>
                <p class="page-description__item-desc">
                    Здесь видим итоговый результат по всем гонщикам, участвующим в соревновании. Также можем увидеть победителей по каждому заезду, сортируя результаты гонщиков по соответствуэщей попытке.
                </p>
            </li>
        </ul>        
        
    </section>
</main>    
    
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php';

?>