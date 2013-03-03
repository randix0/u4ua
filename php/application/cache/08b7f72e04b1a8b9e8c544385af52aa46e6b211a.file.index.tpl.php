<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 10:45:42
         compiled from "application/views/global/my/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2115236295512f1840530ab6-52186633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08b7f72e04b1a8b9e8c544385af52aa46e6b211a' => 
    array (
      0 => 'application/views/global/my/index.tpl',
      1 => 1362041136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2115236295512f1840530ab6-52186633',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f184057ddd5_69329832',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f184057ddd5_69329832')) {function content_512f184057ddd5_69329832($_smarty_tpl) {?><section class="b-section b-section-ideas">
    <div class="b-section-body b-ideas layout w1010px">
    <?php echo $_smarty_tpl->getSubTemplate ("global/idea/items/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div class="b-section-footer layout w1010px tCenter">
        <a class="button block" onclick="Ideas.more();">More</a>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        $('.b-ideas').masonry({
            itemSelector: '.b-ideas-item',
            singleMode: true,
            isResizable: false
            //isAnimated: !Modernizr.csstransitions
        });
    });
</script><?php }} ?>