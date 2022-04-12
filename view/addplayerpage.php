<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/header.php';

?>

<section class="shop-page__order">

	<script type="text/javascript">		    

	    document.querySelector('.shop-page__order').classList.add('fade');
	    setTimeout(() => document.querySelector('.shop-page__order').classList.remove('fade'), 1000);

	</script>

    <div class="shop-page__wrapper">

        <h2 class="h h--1" style="text-align: center;"><?=$title?></h2>

        <form action="/players/saveNew" method="post" class="custom-form js-order">

            <fieldset class="custom-form__group">

                <legend class="custom-form__title">Укажите свои данные</legend>

                <p class="custom-form__info">
                    <span class="req">*</span> поля обязательные для заполнения
                </p>

                <div class="custom-form__column" style="flex-wrap: unset;">

                    <label class="custom-form__input-wrapper" for="name" style="width: 100%;">
                        <input id="name" class="custom-form__input" type="text" name="name" required style="width: 100%;">
                        <p class="custom-form__input-label">Фамилия И.<span class="req">*</span></p>
                    </label>

                    <label class="custom-form__input-wrapper" for="city" style="width: 100%;">
                        <input id="city" class="custom-form__input" type="text" name="city" required style="width: 100%;">
                        <p class="custom-form__input-label">Город<span class="req">*</span></p>
                    </label>                    

                    <label class="custom-form__input-wrapper" for="car" style="width: 100%;">
                        <input id="car" class="custom-form__input" type="text" name="car" required style="width: 100%;">
                        <p class="custom-form__input-label">Автомобиль<span class="req">*</span></p>
                    </label>                    

                    <div class="custom-form__input-wrapper" style="width: 100%">
                        <input type="checkbox" name="entry" id="entry" class="custom-form__checkbox">
                        <label for="entry" class="custom-form__checkbox-label custom-form__info" style="display: block;">
                            Готовность к участию в заездах
                        </label>
                    </div> 

                </div>

            </fieldset>                  

            <button 
                class="button" 
                type="submit" 
                name="addNewPlayer" 
                value='yes' 
                style="width: 100%; margin-bottom: 25px; background-color: forestgreen;"
            >
                Add
            </button>         

        </form>  

        <a href="/players">
        	<button class="button" style="width: 100%; background-color: gray;">Cancel</button>
        </a>          
        
    </div>    

</section>

<script type="text/javascript">   

    const labelHidden = (form) => {
        form.addEventListener('focusout', (evt) => {
            const field = evt.target;
            const label = field.nextElementSibling;
            if (field.tagName === 'INPUT' && field.value && label) {
                label.hidden = true;
            } else if (label) {
                label.hidden = false;
            }
        })
    }  	
  
	labelHidden(document.querySelector('.shop-page__order').querySelector('.custom-form'));

</script>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php';

?>