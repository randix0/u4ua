<?php /* Smarty version Smarty-3.1.13, created on 2013-02-15 18:55:37
         compiled from "application/views/global/idea/add/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1411060411511e47f59ff188-56546798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83c76fc583c7a8d611023deaac945f891119cc73' => 
    array (
      0 => 'application/views/global/idea/add/index.tpl',
      1 => 1360946556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1411060411511e47f59ff188-56546798',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511e47f5a63bd6_18344980',
  'variables' => 
  array (
    'USER_DATA' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511e47f5a63bd6_18344980')) {function content_511e47f5a63bd6_18344980($_smarty_tpl) {?><section class="b-section b-section-idea">
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
                    <div class="in-text mB25px"><input type="text" name="item[cantact_first_name]" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['first_name'];?>
"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">Фамилия:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[cantact_last_name]" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['last_name'];?>
"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">E-mail:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[cantact_email]" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['email'];?>
"></div>
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
    
</script><?php }} ?>