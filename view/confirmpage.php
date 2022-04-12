<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/header.php';

?>

<section class="shop-page__order">

    <script type="text/javascript">         

        document.querySelector('.shop-page__order').classList.add('fade');
        setTimeout(() => document.querySelector('.shop-page__order').classList.remove('fade'), 1000);

    </script>	

    <div class="shop-page__wrapper">        

        <section class="shop-page__popup-end">
            <div class="shop-page__wrapper shop-page__wrapper--popup-end">

                <h2 class="h h--1 h--icon shop-page__end-title" style="text-align: center;"><?=$title?></h2>

                <p class="shop-page__end-message"><?=$message?></p>                

                <a href="<?=$btnConfirmLink?>" style="margin-bottom: 15px; width: 100%;">
                    <button class="button" style="width: 100%;"><?=$btnConfirmText?></button>
                </a>
                
            	<a href="<?=$btnCancelLink?>" style="width: 100%">
                    <button class="button" style="background-color: gray; width: 100%;">Cancel</button>
                </a>
                
            </div>
        </section>

    </div>    

</section>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php';

?>