<?php /* Smarty version 2.6.26, created on 2012-05-04 08:29:39
         compiled from widget/product/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/product/list.tpl', 2, false),array('modifier', 'count', 'widget/product/list.tpl', 19, false),array('modifier', 'cat', 'widget/product/list.tpl', 22, false),)), $this); ?>
<?php if ($this->_tpl_vars['type'] == 'line' || $this->_tpl_vars['type'] == 'infogrid'): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxcenterelementonhover.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '.pictureBox' ).oxCenterElementOnHover();"), $this);?>

<?php endif; ?>

<?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>

<?php if ($this->_tpl_vars['head']): ?>
    <?php if ($this->_tpl_vars['header'] == 'light'): ?>
        <h3 class="lightHead sectionHead"><?php echo $this->_tpl_vars['head']; ?>
</h3>
    <?php else: ?>
        <h2 class="sectionHead clear">
            <span><?php echo $this->_tpl_vars['head']; ?>
</span>
            <?php if ($this->_tpl_vars['rsslink']): ?>
                    <a class="rss js-external" id="<?php echo $this->_tpl_vars['rssId']; ?>
" href="<?php echo $this->_tpl_vars['rsslink']['link']; ?>
" title="<?php echo $this->_tpl_vars['rsslink']['title']; ?>
"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('rss.png'); ?>
" alt="<?php echo $this->_tpl_vars['rsslink']['title']; ?>
"><span class="FXgradOrange corners glowShadow"><?php echo $this->_tpl_vars['rsslink']['title']; ?>
</span></a>
            <?php endif; ?>
        </h2>
    <?php endif; ?>
<?php endif; ?>
<?php if (count($this->_tpl_vars['products']) > 0): ?>
    <ul class="<?php echo $this->_tpl_vars['type']; ?>
View clear" id="<?php echo $this->_tpl_vars['listId']; ?>
">
        <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['productlist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['productlist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['_product']):
        $this->_foreach['productlist']['iteration']++;
?>
            <li class="productData"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp="widget/product/listitem_")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['type'])))) ? $this->_run_mod_handler('cat', true, $_tmp, ".tpl") : smarty_modifier_cat($_tmp, ".tpl")), 'smarty_include_vars' => array('product' => $this->_tpl_vars['_product'],'testid' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['listId'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_') : smarty_modifier_cat($_tmp, '_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_foreach['productlist']['iteration']) : smarty_modifier_cat($_tmp, $this->_foreach['productlist']['iteration'])),'blDisableToCart' => $this->_tpl_vars['blDisableToCart'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></li>
            <?php if (( $this->_tpl_vars['type'] == 'infogrid' && ( ($this->_foreach['productlist']['iteration'] == $this->_foreach['productlist']['total']) ) && ( $this->_foreach['productlist']['iteration'] % 2 != 0 ) )): ?>
                <li class="productData"></li>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
<?php endif; ?>