<?php
/* Smarty version 3.1.36, created on 2020-04-28 11:20:58
  from '/home/rene/PhpstormProjects/MVC/templates/staging2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ea7f57aaf9081_11810827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dc5454d2f3648add1a653f509e47dc2ce358a37' => 
    array (
      0 => '/home/rene/PhpstormProjects/MVC/templates/staging2.tpl',
      1 => 1588065651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea7f57aaf9081_11810827 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="http://www.xxx.zzz/file.pl" method="get">
    Vorname
    <br><input type="text" name="vor" size=40 maxlength=40>
    <br>Nachname
    <br><input type="text" name="nach" size=40 maxlength=40>
    <br>ID
    <br><input type="text" name="id" size=40 maxlength=40>
    <br>Nachricht
    <br><textarea name="msg" rows=7 cols=30></textarea>
    <br><input type="reset" value=" Zurücksetzen ">
    <input type="submit" value="Daten senden ">
</form><?php }
}
