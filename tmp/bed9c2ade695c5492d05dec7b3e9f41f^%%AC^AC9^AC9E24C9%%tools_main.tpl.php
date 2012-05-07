<?php /* Smarty version 2.6.26, created on 2012-05-07 11:38:17
         compiled from tools_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'tools_main.tpl', 1, false),array('function', 'oxmultilang', 'tools_main.tpl', 38, false),array('function', 'oxinputhelp', 'tools_main.tpl', 42, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='TOOLS_MAIN_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['readonly']): ?>
    <?php $this->assign('readonly', 'readonly disabled'); ?>
<?php else: ?>
    <?php $this->assign('readonly', ""); ?>
<?php endif; ?>
<form name="transfer" id="transfer" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

    <input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="oxidCopy" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="cl" value="tools_main">
</form>

<form name="myedit" id="myedit" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

    <input type="hidden" name="cl" value="tools_main">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="voxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="oxparentid" value="<?php echo $this->_tpl_vars['oxparentid']; ?>
">
    <input type="hidden" name="editval[oxarticles__oxid]" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
</form>

<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr>
    <td valign="top" class="edittext">
        <form name="myedit" id="myedit" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post" target="list" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['iMaxUploadFileSize']; ?>
">
        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

        <input type="hidden" name="cl" value="tools_list">
        <input type="hidden" name="fnc" value="performsql">

        <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <colgroup><col width="20%"><col width="80%"></colgroup>
        
            <tr>
                <td class="edittext" valign="top">
                    <?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_MAIN_UPDATESQL'), $this);?>
&nbsp;&nbsp;&nbsp;
                </td>
                <td class="edittext">
                    <textarea class="confinput" style="width: 100%; height: 120px" name="updatesql" <?php echo $this->_tpl_vars['readonly']; ?>
></textarea>
                    <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_TOOLS_MAIN_UPDATESQL'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                    <?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_MAIN_SQLDUMB'), $this);?>
 (<?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_MAX_FILE_UPLOAD'), $this);?>
 <?php echo $this->_tpl_vars['sMaxFormattedFileSize']; ?>
)&nbsp;&nbsp;&nbsp;
                </td>
                <td class="edittext"><br>
                    <input type="file" style="width: 370" class="edittext" name="myfile[SQL1@usqlfile]" <?php echo $this->_tpl_vars['readonly']; ?>
>
                    <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_TOOLS_MAIN_SQLDUMB'), $this);?>

                </td>
            </tr>
        
        <tr>
            <td class="edittext">
            </td>
            <td class="edittext"><br>
            <input type="submit" class="edittext" name="save" value="<?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_MAIN_START'), $this);?>
" <?php if (! $this->_tpl_vars['blIsMallAdmin']): ?>disabled<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>
            </td>
        </tr>
        </table>
        </form>

    <?php if ($this->_tpl_vars['showViewUpdate']): ?>
      <hr>
      <form name="regerateviews" id="regerateviews" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post" target="list">
        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

        <input type="hidden" name="cl" value="tools_list">
        <input type="hidden" name="fnc" value="updateViews">
        <br><?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_MAIN_UPDATEVIEWSINFO'), $this);?>
<br><br>
        <input class="confinput" type="Submit" value="<?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_MAIN_UPDATEVIEWSNOW'), $this);?>
" onClick="return confirm('<?php echo smarty_function_oxmultilang(array('ident' => 'TOOLS_MAIN_UPDATEVIEWSCONFIRM'), $this);?>
')" <?php echo $this->_tpl_vars['readonly']; ?>
>
      </form>
    <?php endif; ?>

    </td>
    <td valign="top" class="edittext" align="left">
    <br>
        <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td class="edittext">
            </td>
        </tr>
        </table>

    </td>
    </tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "bottomnaviitem.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "bottomitem.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>