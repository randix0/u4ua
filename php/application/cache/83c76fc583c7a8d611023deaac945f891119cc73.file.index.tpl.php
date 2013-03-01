<?php /* Smarty version Smarty-3.1.13, created on 2013-03-01 18:33:53
         compiled from "application/views/global/idea/add/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1227191893512f3a7952a864-31608527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83c76fc583c7a8d611023deaac945f891119cc73' => 
    array (
      0 => 'application/views/global/idea/add/index.tpl',
      1 => 1362155629,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1227191893512f3a7952a864-31608527',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f3a795d7c33_00017113',
  'variables' => 
  array (
    'idea' => 0,
    'USER_DATA' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f3a795d7c33_00017113')) {function content_512f3a795d7c33_00017113($_smarty_tpl) {?><section class="b-section b-section-idea">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">Поделись идеей</div>
    </div>
    <div class="b-section-body layout w976px mB25px">
        <form id="ajaxSaveIdea" action="/ajax/saveIdea" method="post">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['idea']->value['id'];?>
" />
            <h3 class="b-section-h3">Добавить видео Youtube:</h3>
            <h4 class="b-section-h4">Адрес видео:</h4>
            <div class="in-text mB25px"><input type="text" name="item[link]" value="<?php if ($_smarty_tpl->tpl_vars['idea']->value['youtube_code']){?>http://www.youtube.com/watch?v=<?php echo $_smarty_tpl->tpl_vars['idea']->value['youtube_code'];?>
<?php }?>" placeholder="http://www.youtube.com/watch?v=YOUTUBE_CODE"></div>
            <h3 class="b-section-h3">Название идеи:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[iname]" value="<?php echo $_smarty_tpl->tpl_vars['idea']->value['iname'];?>
"></div>
            <h3 class="b-section-h3">Кратко об идеи:</h3>
            <div class="in-textarea h100px mB25px"><textarea  name="item[idesc]"><?php echo $_smarty_tpl->tpl_vars['idea']->value['idesc'];?>
</textarea></div>
            <h3 class="b-section-h3">Контакты:</h3>
            <div class="overhide mLRn5px">
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">Имя:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_first_name]" value="<?php if ($_smarty_tpl->tpl_vars['idea']->value['contact_first_name']){?><?php echo $_smarty_tpl->tpl_vars['idea']->value['contact_first_name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['first_name'];?>
<?php }?>"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">Фамилия:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_last_name]" value="<?php if ($_smarty_tpl->tpl_vars['idea']->value['contact_last_name']){?><?php echo $_smarty_tpl->tpl_vars['idea']->value['contact_last_name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['last_name'];?>
<?php }?>"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">E-mail:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_email]" value="<?php if ($_smarty_tpl->tpl_vars['idea']->value['contact_email']){?><?php echo $_smarty_tpl->tpl_vars['idea']->value['contact_email'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['email'];?>
<?php }?>"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">Телефон:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_phone]" placeholder="+380" value="<?php echo $_smarty_tpl->tpl_vars['idea']->value['contact_phone'];?>
"></div>
                </div>
            </div>
        </form>
    <?php if ($_smarty_tpl->tpl_vars['idea']->value['id']){?>
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
                    <a class="b-idea-putFile-choose" onclick="Window.load('/modal/upload/Attachments/<?php echo $_smarty_tpl->tpl_vars['idea']->value['id'];?>
','win-upload','');">Выбрать вручную</a>
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
    <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['idea']->value['id']){?>
            <a class="button" Idea.save();>Сохранить</a>
            <a class="button button_cancel" href="/">Отменить</a>
        <?php }else{ ?>
            <a class="button button_big" Idea.save();>Подать идею</a>
        <?php }?>
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