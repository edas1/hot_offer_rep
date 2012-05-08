<?php /* Smarty version 2.6.26, created on 2012-05-08 08:07:06
         compiled from widget/header/topcategories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/header/topcategories.tpl', 1, false),array('function', 'oxstyle', 'widget/header/topcategories.tpl', 3, false),array('function', 'oxmultilang', 'widget/header/topcategories.tpl', 9, false),array('function', 'oxgetseourl', 'widget/header/topcategories.tpl', 74, false),array('modifier', 'count', 'widget/header/topcategories.tpl', 11, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxtopmenu.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('#navigation').oxTopMenu();"), $this);?>

<?php echo smarty_function_oxstyle(array('include' => "css/libs/superfish.css"), $this);?>

<?php $this->assign('homeSelected', 'false'); ?>
<?php if ($this->_tpl_vars['oView']->getClassName() == 'start'): ?>
    <?php $this->assign('homeSelected', 'true'); ?>
<?php endif; ?>
<ul id="navigation" class="sf-menu">
    <li <?php if ($this->_tpl_vars['homeSelected'] == 'true'): ?>class="current"<?php endif; ?>><a <?php if ($this->_tpl_vars['homeSelected'] == 'true'): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['oViewConf']->getHomeLink(); ?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'TOP_CATEGORIES_HOME'), $this);?>
</a></li>

    <?php $this->assign('iAllCatCount', ((is_array($_tmp=$this->_tpl_vars['oxcmp_categories'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))); ?>
    <?php if ($this->_tpl_vars['iAllCatCount'] > $this->_tpl_vars['oView']->getTopNavigationCatCnt()): ?>
        <?php $this->assign('bHasMore', 'true'); ?>
        <?php $this->assign('iCatCnt', '1'); ?>
    <?php else: ?>
        <?php $this->assign('bHasMore', 'false'); ?>
        <?php $this->assign('iCatCnt', '0'); ?>
    <?php endif; ?>

    <?php $_from = $this->_tpl_vars['oxcmp_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['root'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['root']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['catkey'] => $this->_tpl_vars['ocat']):
        $this->_foreach['root']['iteration']++;
?>
      <?php if ($this->_tpl_vars['ocat']->getIsVisible()): ?>
        <?php $_from = $this->_tpl_vars['ocat']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MoreTopCms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MoreTopCms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oTopCont']):
        $this->_foreach['MoreTopCms']['iteration']++;
?>
            <?php $this->assign('iCatCnt', $this->_tpl_vars['iCatCnt']+1); ?>
            <?php $this->assign('iAllCatCount', $this->_tpl_vars['iAllCatCount']+1); ?>
            <?php if (! $this->_tpl_vars['bHasMore'] && ( $this->_tpl_vars['iCatCnt'] >= $this->_tpl_vars['oView']->getTopNavigationCatCnt() )): ?>
                 <?php $this->assign('bHasMore', 'true'); ?>
                 <?php $this->assign('iCatCnt', $this->_tpl_vars['iCatCnt']+1); ?>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['iCatCnt'] <= $this->_tpl_vars['oView']->getTopNavigationCatCnt()): ?>
                <li><a href="<?php echo $this->_tpl_vars['oTopCont']->getLink(); ?>
"><?php echo $this->_tpl_vars['oTopCont']->oxcontents__oxtitle->value; ?>
</a></li>
            <?php else: ?>
                <?php ob_start(); ?>
                    <li><a href="<?php echo $this->_tpl_vars['oTopCont']->getLink(); ?>
"><?php echo $this->_tpl_vars['oTopCont']->oxcontents__oxtitle->value; ?>
</a></li>
                <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('moreLinks', ob_get_contents());ob_end_clean(); ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

        <?php $this->assign('iCatCnt', $this->_tpl_vars['iCatCnt']+1); ?>
        <?php if (! $this->_tpl_vars['bHasMore'] && ( $this->_tpl_vars['iCatCnt'] >= $this->_tpl_vars['oView']->getTopNavigationCatCnt() )): ?>
                 <?php $this->assign('bHasMore', 'true'); ?>
                 <?php $this->assign('iCatCnt', $this->_tpl_vars['iCatCnt']+1); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['iCatCnt'] <= $this->_tpl_vars['oView']->getTopNavigationCatCnt()): ?>
            <li <?php if ($this->_tpl_vars['homeSelected'] == 'false' && $this->_tpl_vars['ocat']->expanded): ?>class="current"<?php endif; ?>>
                <a  <?php if ($this->_tpl_vars['homeSelected'] == 'false' && $this->_tpl_vars['ocat']->expanded): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['ocat']->getLink(); ?>
"><?php echo $this->_tpl_vars['ocat']->oxcategories__oxtitle->value; ?>
<?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['ocat']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['ocat']->getNrOfArticles(); ?>
)<?php endif; ?></a>
                <?php if ($this->_tpl_vars['ocat']->getSubCats()): ?>
                    <ul>
                    <?php $_from = $this->_tpl_vars['ocat']->getSubCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SubCat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SubCat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subcatkey'] => $this->_tpl_vars['osubcat']):
        $this->_foreach['SubCat']['iteration']++;
?>
                        <?php if ($this->_tpl_vars['osubcat']->getIsVisible()): ?>
                            <?php $_from = $this->_tpl_vars['osubcat']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MoreCms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MoreCms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ocont']):
        $this->_foreach['MoreCms']['iteration']++;
?>
                                <li><a href="<?php echo $this->_tpl_vars['ocont']->getLink(); ?>
"><?php echo $this->_tpl_vars['ocont']->oxcontents__oxtitle->value; ?>
</a></li>
                            <?php endforeach; endif; unset($_from); ?>
                            <?php if ($this->_tpl_vars['osubcat']->getIsVisible()): ?>
                                <li <?php if ($this->_tpl_vars['homeSelected'] == 'false' && $this->_tpl_vars['osubcat']->expanded): ?>class="current"<?php endif; ?> ><a <?php if ($this->_tpl_vars['homeSelected'] == 'false' && $this->_tpl_vars['osubcat']->expanded): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['osubcat']->getLink(); ?>
"><?php echo $this->_tpl_vars['osubcat']->oxcategories__oxtitle->value; ?>
 <?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['osubcat']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['osubcat']->getNrOfArticles(); ?>
)<?php endif; ?></a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php else: ?>
            <?php ob_start(); ?>
               <li <?php if ($this->_tpl_vars['homeSelected'] == 'false' && $this->_tpl_vars['ocat']->expanded): ?>class="current"<?php endif; ?>>
                    <a href="<?php echo $this->_tpl_vars['ocat']->getLink(); ?>
"><?php echo $this->_tpl_vars['ocat']->oxcategories__oxtitle->value; ?>
<?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['ocat']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['ocat']->getNrOfArticles(); ?>
)<?php endif; ?></a>
               </li>
            <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('moreLinks', ob_get_contents());ob_end_clean(); ?>
        <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php if ($this->_tpl_vars['iAllCatCount'] > $this->_tpl_vars['oView']->getTopNavigationCatCnt()): ?>
        <li>
            <?php $this->assign('_catMoreUrl', $this->_tpl_vars['oView']->getCatMoreUrl()); ?>
            <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ($this->_tpl_vars['_catMoreUrl'])."&amp;cl=alist"), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'TOP_CATEGORIES_MORE'), $this);?>
</a>
            <ul>
                <?php $_from = $this->_tpl_vars['moreLinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
                   <?php echo $this->_tpl_vars['link']; ?>

                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo smarty_function_oxgetseourl(array('ident' => "index.php?cl=nfq_hotoffers"), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'NFQ_HOTOFFER_TOP_LINK'), $this);?>
</a>
    </li>
</ul>