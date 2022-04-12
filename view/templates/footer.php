
    <footer class="page-footer">

        <nav class="page-footer__menu">

                <ul class="main-menu main-menu--footer">

                    <?foreach (arraySort($mainMenu['main']) as $value): ?>
                            
                        <li>
                            <a class="main-menu__item" href="<?=$value['path']?>">
                                <?=$value['title']?>                                                            
                            </a>    
                        </li>
                    
                    <?endforeach;?>
              </ul>
        </nav>
    </footer>

</body>

</html>
