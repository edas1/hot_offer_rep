<?php /* Smarty version 2.6.26, created on 2012-05-07 16:48:12
         compiled from user_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'user_main.tpl', 1, false),array('modifier', 'lower', 'user_main.tpl', 97, false),array('modifier', 'regex_replace', 'user_main.tpl', 204, false),array('function', 'oxmultilang', 'user_main.tpl', 47, false),array('function', 'oxinputhelp', 'user_main.tpl', 56, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='GENERAL_ADMIN_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
<!--
function chkInsert()
{
    if( document.myedit.elements["editval[oxuser__oxusername]"].value == "")
     {    alert("Bitte eMail Adresse eingeben!");
           document.myedit.elements["editval[oxuser__oxusername]"].focus();
           return false;
    }
    return true;

}

//-->
</script>

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
    <input type="hidden" name="cl" value="user_main">
</form>

<form name="myedit" id="myedit" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post" onSubmit="return chkInsert()">
<?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

<input type="hidden" name="cl" value="user_main">
<input type="hidden" name="fnc" value="">
<input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
<input type="hidden" name="editval[oxuser__oxid]" value="<?php echo $this->_tpl_vars['oxid']; ?>
">

<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr>
    <td valign="top" class="edittext">

        <table cellspacing="0" cellpadding="0" border="0">
        
            <?php if ($this->_tpl_vars['sSaveError']): ?>
                <tr>
                    <td></td>
                    <td class="errorbox"><?php echo smarty_function_oxmultilang(array('ident' => $this->_tpl_vars['sSaveError']), $this);?>
</td>
                </tr>
            <?php endif; ?>
            <tr>
                <td class="edittext" width="90">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_ACTIVE'), $this);?>

                </td>
                <td class="edittext">
                <input class="edittext" type="checkbox" name="editval[oxuser__oxactive]" value='1' <?php if ($this->_tpl_vars['edit']->oxuser__oxactive->value == 1): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_ACTIVE'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'USER_MAIN_RIGHTS'), $this);?>

                </td>
                <td class="edittext">
                    <select name="editval[oxuser__oxrights]" class="editinput" <?php echo $this->_tpl_vars['readonly']; ?>
>
                    <?php $_from = $this->_tpl_vars['rights']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shopitem']):
?>
                    <option value="<?php echo $this->_tpl_vars['shopitem']->id; ?>
" <?php if ($this->_tpl_vars['shopitem']->selected): ?>SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['shopitem']->name; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_USER_MAIN_RIGHTS'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'USER_MAIN_EMAILLOGIN'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="25" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxusername->fldmax_length; ?>
" name="editval[oxuser__oxusername]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxusername->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_USER_MAIN_EMAILLOGIN'), $this);?>

                </td>
            </tr>

            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'USER_MAIN_CUSTOMERSNR'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="15" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxcustnr->fldmax_length; ?>
" name="editval[oxuser__oxcustnr]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxcustnr->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_USER_MAIN_CUSTOMERSNR'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_BILLSAL'), $this);?>

                </td>
                <td class="edittext">
                  <select name="editval[oxuser__oxsal]" class="editinput" <?php echo $this->_tpl_vars['readonly']; ?>
>
                    <option value="MR"  <?php if (((is_array($_tmp=$this->_tpl_vars['edit']->oxuser__oxsal->value)) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)) == 'mr'): ?>SELECTED<?php endif; ?>><?php echo smarty_function_oxmultilang(array('ident' => 'MR'), $this);?>
</option>
                    <option value="MRS" <?php if (((is_array($_tmp=$this->_tpl_vars['edit']->oxuser__oxsal->value)) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)) == 'mrs'): ?>SELECTED<?php endif; ?>><?php echo smarty_function_oxmultilang(array('ident' => 'MRS'), $this);?>
</option>
                  </select>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_BILLSAL'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'USER_MAIN_NAME'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="10" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxfname->fldmax_length; ?>
" name="editval[oxuser__oxfname]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxfname->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <input type="text" class="editinput" size="20" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxlname->fldmax_length; ?>
" name="editval[oxuser__oxlname]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxlname->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_USER_MAIN_NAME'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_COMPANY'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="37" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxcompany->fldmax_length; ?>
" name="editval[oxuser__oxcompany]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxcompany->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_COMPANY'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'USER_MAIN_STRNR'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="28" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxstreet->fldmax_length; ?>
" name="editval[oxuser__oxstreet]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxstreet->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
> <input type="text" class="editinput" size="5" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxstreetnr->fldmax_length; ?>
" name="editval[oxuser__oxstreetnr]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxstreetnr->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_USER_MAIN_STRNR'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_ZIPCITY'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="5" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxzip->fldmax_length; ?>
" name="editval[oxuser__oxzip]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxzip->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <input type="text" class="editinput" size="25" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxcity->fldmax_length; ?>
" name="editval[oxuser__oxcity]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxcity->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_ZIPCITY'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_USTID'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="15" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxustid->fldmax_length; ?>
" name="editval[oxuser__oxustid]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxustid->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_USTID'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_EXTRAINFO'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="37" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxaddinfo->fldmax_length; ?>
" name="editval[oxuser__oxaddinfo]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxaddinfo->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_EXTRAINFO'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_STATE'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="15" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxstateid->fldmax_length; ?>
" name="editval[oxuser__oxstateid]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxstateid->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_STATE'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_COUNTRY'), $this);?>

                </td>
                <td class="edittext">
                 <select class="editinput" name="editval[oxuser__oxcountryid]" <?php echo $this->_tpl_vars['readonly']; ?>
>
                   <?php $_from = $this->_tpl_vars['countrylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oCountry']):
?>
                   <option value="<?php echo $this->_tpl_vars['oCountry']->oxcountry__oxid->value; ?>
" <?php if ($this->_tpl_vars['oCountry']->oxcountry__oxid->value == $this->_tpl_vars['edit']->oxuser__oxcountryid->value): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['oCountry']->oxcountry__oxtitle->value; ?>
</option>
                   <?php endforeach; endif; unset($_from); ?>
                 </select>
                 <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_COUNTRY'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_TELEPHONE'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="20" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxfon->fldmax_length; ?>
" name="editval[oxuser__oxfon]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxfon->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_TELEPHONE'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_FAX'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="20" maxlength="<?php echo $this->_tpl_vars['edit']->oxuser__oxfax->fldmax_length; ?>
" name="editval[oxuser__oxfax]" value="<?php echo $this->_tpl_vars['edit']->oxuser__oxfax->value; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_FAX'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_BIRTHDATE'), $this);?>

                </td>
                <td class="edittext">
                  <input type="text" class="editinput" size="3" maxlength="2" name="editval[oxuser__oxbirthdate][day]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['edit']->oxuser__oxbirthdate->value)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^([0-9]{4})[-]([0-9]{1,2})[-]/", "") : smarty_modifier_regex_replace($_tmp, "/^([0-9]{4})[-]([0-9]{1,2})[-]/", "")); ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                  <input type="text" class="editinput" size="3" maxlength="2" name="editval[oxuser__oxbirthdate][month]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['edit']->oxuser__oxbirthdate->value)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^([0-9]{4})[-]/", "") : smarty_modifier_regex_replace($_tmp, "/^([0-9]{4})[-]/", "")))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[-]([0-9]{1,2})$/", "") : smarty_modifier_regex_replace($_tmp, "/[-]([0-9]{1,2})$/", "")); ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                  <input type="text" class="editinput" size="8" maxlength="4" name="editval[oxuser__oxbirthdate][year]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['edit']->oxuser__oxbirthdate->value)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[-]([0-9]{1,2})[-]([0-9]{1,2})$/", "") : smarty_modifier_regex_replace($_tmp, "/[-]([0-9]{1,2})[-]([0-9]{1,2})$/", "")); ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                  <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_BIRTHDATE'), $this);?>

                </td>
            </tr>
            <?php if ($this->_tpl_vars['oxid'] != "-1"): ?>
            <tr>
                <td class="edittext"><br>
                <?php echo smarty_function_oxmultilang(array('ident' => 'USER_MAIN_HASPASSWORD'), $this);?>

                </td>
                <td class="edittext"><br>
                <?php if ($this->_tpl_vars['edit']->oxuser__oxpassword->value): ?><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_YES'), $this);?>
<?php else: ?><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_NO'), $this);?>
<?php endif; ?>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_USER_MAIN_HASPASSWORD'), $this);?>

                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td class="edittext"><br>
                <?php echo smarty_function_oxmultilang(array('ident' => 'USER_MAIN_NEWPASSWORD'), $this);?>

                </td>
                <td class="edittext"><br>
                <input type="password" class="editinput" size="15" name="newPassword" value="" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_USER_MAIN_NEWPASSWORD'), $this);?>

                </td>
            </tr>

        
        <tr>
            <td class="edittext">
            </td>
            <td class="edittext"><br>
            <input type="submit" class="edittext" name="save" value="<?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_SAVE'), $this);?>
" onClick="Javascript:document.myedit.fnc.value='save'"" <?php echo $this->_tpl_vars['readonly']; ?>
>
            </td>
        </tr>
        </table>
    </td>
    <!-- Anfang rechte Seite -->
    <td valign="top" class="edittext vr" align="left" width="50%">
    <?php if ($this->_tpl_vars['oxid'] != "-1"): ?>
       <input <?php echo $this->_tpl_vars['readonly']; ?>
 type="button" value="<?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_ASSIGNGROUPS'), $this);?>
" class="edittext" onclick="JavaScript:showDialog('&cl=user_main&aoc=1&oxid=<?php echo $this->_tpl_vars['oxid']; ?>
');">
    <?php endif; ?>
    </td>
    </tr>
</table>

</form>

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