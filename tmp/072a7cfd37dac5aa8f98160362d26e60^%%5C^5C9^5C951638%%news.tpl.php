<?php /* Smarty version 2.6.26, created on 2012-05-04 08:29:44
         compiled from widget/sidebar/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'widget/sidebar/news.tpl', 2, false),array('function', 'oxgetseourl', 'widget/sidebar/news.tpl', 7, false),array('modifier', 'strip_tags', 'widget/sidebar/news.tpl', 6, false),array('modifier', 'oxtruncate', 'widget/sidebar/news.tpl', 6, false),array('modifier', 'cat', 'widget/sidebar/news.tpl', 7, false),)), $this); ?>
<div id="newsBox" class="box">
    <h3><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_NEWS_HEADER'), $this);?>
</h3>
    <ul class="content">
        <?php $_from = $this->_tpl_vars['oNews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['_sNewsList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['_sNewsList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['_oNewsItem']):
        $this->_foreach['_sNewsList']['iteration']++;
?>
            <li >
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['_oNewsItem']->getLongDesc())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('oxtruncate', true, $_tmp, 100) : smarty_modifier_oxtruncate($_tmp, 100)); ?>
<br>
                <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=news") : smarty_modifier_cat($_tmp, "cl=news"))), $this);?>
#<?php echo $this->_tpl_vars['_oNewsItem']->oxnews__oxid->value; ?>
" class="readMore"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_NEWS_LINKMORE'), $this);?>
</a>
            </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>