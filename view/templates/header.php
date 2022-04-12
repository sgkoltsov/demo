<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/core.php';

?>

<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="utf-8">
    <title>Standings Racing</title>       
    <link rel="stylesheet" href="../../view/templates/css/style.css">  

</head>

<body>
    
    <header class="page-header">

        <nav class="page-header__menu">
            <ul class="main-menu main-menu--header">

                <?foreach (arraySort($mainMenu['main']) as $value): ?>
                    
                        <li>
                            <a class="main-menu__item" href="<?=$value['path']?>">
                                <?=$value['title']?>                                                            
                            </a>    
                        </li>
                
                <?endforeach;?>                               

            </ul>
        </nav>
      
    </header>
