<?php /* Smarty version 2.6.26, created on 2012-05-08 08:08:46
         compiled from page/details/inc/zoompopup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/details/inc/zoompopup.tpl', 7, false),array('function', 'oxscript', 'page/details/inc/zoompopup.tpl', 30, false),array('modifier', 'strip_tags', 'page/details/inc/zoompopup.tpl', 11, false),array('modifier', 'default', 'page/details/inc/zoompopup.tpl', 11, false),array('modifier', 'count', 'page/details/inc/zoompopup.tpl', 13, false),)), $this); ?>
<?php if ($this->_tpl_vars['oView']->showZoomPics()): ?>
    <?php $this->assign('aZoomPics', $this->_tpl_vars['oView']->getZoomPics()); ?>
    <?php $this->assign('iZoomPic', $this->_tpl_vars['oView']->getActZoomPic()); ?>
    <div id="zoomModal" class="popupBox corners FXgradGreyLight glowShadow">
        <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('x.png'); ?>
" alt="" class="closePop">
        <div class="zoomHead">
            <?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_ZOOMPOP'), $this);?>

            <a href="#zoom"><span></span></a>
        </div>
        <div class="zoomed">
            <img src="<?php echo $this->_tpl_vars['aZoomPics'][$this->_tpl_vars['iZoomPic']]['file']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxtitle->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <?php echo ((is_array($_tmp=@$this->_tpl_vars['oPictureProduct']->oxarticles__oxvarselect->value)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" id="zoomImg">
        </div>
        <?php if (count($this->_tpl_vars['aZoomPics']) > 1): ?>
        <div class="otherPictures" id="moreZoomPicsContainer">
            <div class="shadowLine"></div>
            <ul class="zoomPager clear">
            <?php $_from = $this->_tpl_vars['aZoomPics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iPicNr'] => $this->_tpl_vars['_zoomPic']):
?>
                <?php $this->assign('_sZoomPic', $this->_tpl_vars['aZoomPics'][$this->_tpl_vars['iPicNr']]['file']); ?>
                <li>
                    <a class="ox-zoompic ox-picnr-<?php echo $this->_tpl_vars['iPicNr']; ?>
 <?php if ($this->_tpl_vars['iPicNr'] == $this->_tpl_vars['iZoomPic']): ?>selected<?php endif; ?>" href="<?php echo $this->_tpl_vars['_sZoomPic']; ?>
">
                        <span class="marker"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('marker.png'); ?>
" alt=""></span>
                        <?php echo $this->_tpl_vars['_zoomPic']['id']; ?>

                    </a>
                </li>
            <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxzoompictures.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$('#moreZoomPicsContainer').oxZoomPictures();"), $this);?>

<?php endif; ?>