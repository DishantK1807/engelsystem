<?php

function shift_needed_angeltypes($sid) {
  return sql_select("SELECT DISTINCT `AngelTypes`.* FROM `ShiftEntry` JOIN `AngelTypes` ON `ShiftEntry`.`TID`=`AngelTypes`.`id` WHERE `ShiftEntry`.`SID`='" . sql_escape($sid) . "'  ORDER BY `AngelTypes`.`name`");
}

function needed_angeltype_by_shift($sid, $needed_angeltype_id) {
  return sql_select("
      SELECT `ShiftEntry`.`freeloaded`, `User`.*
      FROM `ShiftEntry`
      JOIN `User` ON `ShiftEntry`.`UID`=`User`.`UID`
      WHERE `ShiftEntry`.`SID`='" . sql_escape($sid) . "'
      AND `ShiftEntry`.`TID`='" . sql_escape($needed_angeltype_id) . "'");
}

?>