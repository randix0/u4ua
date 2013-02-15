<section class="b-section b-section-idea">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">Поделись идеей</div>
    </div>
    <div class="b-section-body layout w976px mB25px">
        <form id="ajaxSaveIdea" action="/ajax/saveIdea" method="post">
            <h3 class="b-section-h3">Добавить видео Youtube:</h3>
            <h4 class="b-section-h4">Адрес видео:</h4>
            <div class="in-text mB25px"><input type="text" name="item[link]" placeholder="http://www.youtube.com/watch?v=YOUTUBE_CODE"></div>
            <h3 class="b-section-h3">Название идеи:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[iname]"></div>
            <h3 class="b-section-h3">Кратко об идеи:</h3>
            <div class="in-textarea h100px mB25px"><textarea  name="item[idesc]"></textarea></div>
            <h3 class="b-section-h3">Контакты:</h3>
            <div class="overhide mLRn5px">
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">Имя:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[cantact_first_name]" value="{$USER_DATA.first_name}"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">Фамилия:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[cantact_last_name]" value="{$USER_DATA.last_name}"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">E-mail:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[cantact_email]" value="{$USER_DATA.email}"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">Телефон:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[cantact_phone]" placeholder="+380"></div>
                </div>
            </div>
            <div class="mB25px">
                <a class="button" onclick="Idea.save();">Добавить</a>
                <a class="button button_cancel" href="">Отменить</a>
            </div>
        </form>
        <h3 class="b-section-h3">Дополнительные материалы:</h3>
        <div class="overhide">
            <div class="left w210px mR10px">
                <a class="b-idea-getPdf" href="">Бизнес-план проекта</a>
            </div>
            <div class="left w210px mR10px">
                <a class="b-idea-getDoc" href="">Схема проекта</a>
            </div>
            <div class="left w210px mR10px">
                <div class="b-idea-putFile">
                    <div class="b-idea-putFile-desc">Перетяни сюда файл</div>
                    <a class="b-idea-putFile-choose">Выбрать вручную</a>
                </div>
            </div>
        </div>
        <h3 class="b-section-h3">Команда:</h3>
        <div class="b-idea-team">
            <div class="b-idea-team-item">
                <a class="b-idea-team-item-avatar" href=""></a>
                <a class="b-idea-team-item-iname" href="">Василий Пупкин</a>
                <div class="b-idea-team-item-idesc">Программист</div>
            </div>
            <div class="b-idea-team-item">
                <a class="b-idea-team-item-avatar" href=""></a>
                <a class="b-idea-team-item-iname" href="">Василий Пупкин</a>
                <div class="b-idea-team-item-idesc">Программист</div>
            </div>
            <div class="b-idea-team-item">
                <a class="b-idea-team-item-avatar" href=""></a>
                <a class="b-idea-team-item-iname" href="">Василий Пупкин</a>
                <div class="b-idea-team-item-idesc">Программист</div>
            </div>
            <a class="b-idea-addPerson left" href="">Добавить участника</a>
        </div>
        <a class="button button_big" href="">Подать идею</a>
    </div>



</section>

<script type="text/javascript">
    {literal}
        Idea = {
            save: function(){
                $.ajax({
                    url: '/ajax/saveIdea',
                    type: 'POST',
                    data: $('#ajaxSaveIdea').serialize(),
                    dataType: 'json',
                    success: function(data){
                        if (data.status == 'success'){
                            console.log('Idea.save: success!');
                            if (data.goto)
                                window.location = data.goto;
                        } else {
                            console.log('Idea.save: error!');
                        }
                    }
                });
            }
        };
    {/literal}
</script>