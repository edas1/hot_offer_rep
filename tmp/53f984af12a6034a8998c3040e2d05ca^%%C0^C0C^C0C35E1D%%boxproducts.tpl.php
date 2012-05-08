<?php /* Smarty version 2.6.26, created on 2012-05-08 08:06:23
         compiled from widget/product/boxproducts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/product/boxproducts.tpl', 1, false),array('function', 'oxmultilang', 'widget/product/boxproducts.tpl', 7, false),array('modifier', 'strip_tags', 'widget/product/boxproducts.tpl', 16, false),array('block', 'oxhasrights', 'widget/product/boxproducts.tpl', 30, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>

<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxarticlebox.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( 'ul.js-articleBox' ).oxArticleBox();"), $this);?>

<div class="box" <?php if ($this->_tpl_vars['_boxId']): ?>id="<?php echo $this->_tpl_vars['_boxId']; ?>
"<?php endif; ?>>
    <?php if ($this->_tpl_vars['_sHeaderIdent']): ?>
        <h3 class="clear <?php if ($this->_tpl_vars['_sHeaderCssClass']): ?> <?php echo $this->_tpl_vars['_sHeaderCssClass']; ?>
<?php endif; ?>">
            <?php echo smarty_function_oxmultilang(array('ident' => $this->_tpl_vars['_sHeaderIdent']), $this);?>

            <?php $this->assign('rsslinks', $this->_tpl_vars['oView']->getRssLinks()); ?>
            <?php if ($this->_tpl_vars['rsslinks']['topArticles']): ?>
                <a class="rss js-external" id="rssTopProducts" href="<?php echo $this->_tpl_vars['rsslinks']['topArticles']['link']; ?>
" title="<?php echo $this->_tpl_vars['rsslinks']['topArticles']['title']; ?>
"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('rss.png'); ?>
" alt="<?php echo $this->_tpl_vars['rsslinks']['topArticles']['title']; ?>
"><span class="FXgradOrange corners glowShadow"><?php echo $this->_tpl_vars['rsslinks']['topArticles']['title']; ?>
</span></a>
            <?php endif; ?>
        </h3>
    <?php endif; ?>
    <ul class="js-articleBox featuredList">
    <?php $_from = $this->_tpl_vars['_oBoxProducts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['_sProdList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['_sProdList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['_oBoxProduct']):
        $this->_foreach['_sProdList']['iteration']++;
?>
            <?php $this->assign('_sTitle', ((is_array($_tmp=($this->_tpl_vars['_oBoxProduct']->oxarticles__oxtitle->value)." ".($this->_tpl_vars['_oBoxProduct']->oxarticles__oxvarselect->value))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp))); ?>
            
                <li class="articleImage" <?php if (! ($this->_foreach['_sProdList']['iteration'] <= 1)): ?> style="display:none;" <?php endif; ?>>
                    <a class="articleBoxImage" href="<?php echo $this->_tpl_vars['_oBoxProduct']->getMainLink(); ?>
">
                        <img src="<?php echo $this->_tpl_vars['_oBoxProduct']->getIconUrl(); ?>
" alt="<?php echo $this->_tpl_vars['_sTitle']; ?>
">
                    </a>
                </li>
            

            
                <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
                <li class="articleTitle">
                    <a href="<?php echo $this->_tpl_vars['_oBoxProduct']->getMainLink(); ?>
">
                        <?php echo $this->_tpl_vars['_sTitle']; ?>
<br>
                        <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                            <?php if ($this->_tpl_vars['_oBoxProduct']->getFPrice()): ?>
                                <strong><?php echo $this->_tpl_vars['_oBoxProduct']->getFPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</strong>
                            <?php endif; ?>
                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                    </a>
                </li>
            
    <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>