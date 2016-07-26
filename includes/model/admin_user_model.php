<?php

function select_user_by_group($uid) {
  return sql_select("SELECT * FROM `UserGroups` WHERE `uid`='" . sql_escape($uid) . "' ORDER BY `group_id` LIMIT 1");
}

function select_groups($id, $highest_group) {
  return sql_select("SELECT * FROM `Groups` LEFT OUTER JOIN `UserGroups` ON (`UserGroups`.`group_id` = `Groups`.`UID` AND `UserGroups`.`uid` = '" . sql_escape($id) . "') WHERE `Groups`.`UID` >= '" . sql_escape($highest_group) . "' ORDER BY `Groups`.`Name`");
}

function select_group_by_user($uid) {
  return sql_select("SELECT * FROM `UserGroups` WHERE `uid`='" . sql_escape($uid) . "' ORDER BY `group_id`");
}

function delete_group($id) {
  return sql_query("DELETE FROM `UserGroups` WHERE `uid`='" . sql_escape($id) . "'");
}
function insert_to_groups($id, $group) {
  return sql_query("INSERT INTO `UserGroups` SET `uid`='" . sql_escape($id) . "', `group_id`='" . sql_escape($group) . "'");
}

function update_group($eNick, $eName, $eVorname, $eTelefon, $eHandy, $eAlter, $eDect, $eemail, $email_shiftinfo, $ejabber, $eSize, $eGekommen, $eAktiv, $force_active, $eTshirt, $Hometown, $id) {
  $SQL = "UPDATE `User` SET
        `Nick` = '" . sql_escape($eNick) . "',
        `Name` = '" . sql_escape($eName) . "',
        `Vorname` = '" . sql_escape($eVorname) . "',
        `Telefon` = '" . sql_escape($eTelefon) . "',
        `Handy` = '" . sql_escape($eHandy) . "',
        `Alter` = '" . sql_escape($eAlter) . "',
        `DECT` = '" . sql_escape($eDECT) . "',
        `email` = '" . sql_escape($eemail) . "',
        `email_shiftinfo` = " . sql_bool(isset($_REQUEST['email_shiftinfo'])) . ",
        `jabber` = '" . sql_escape($ejabber) . "',
        `Size` = '" . sql_escape($eSize) . "',
        `Gekommen`= '" . sql_escape($eGekommen) . "',
        `Aktiv`= '" . sql_escape($eAktiv) . "',
        `force_active`= " . sql_escape($force_active) . ",
        `Tshirt` = '" . sql_escape($eTshirt) . "',
        `Hometown` = '" . sql_escape($Hometown) . "'
        WHERE `UID` = '" . sql_escape($id) . "'
        LIMIT 1";
  return sql_query($SQL);
}

?>