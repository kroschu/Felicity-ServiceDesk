<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2011 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file:
// Purpose of file:
// ----------------------------------------------------------------------


define('GLPI_ROOT', '..');
include (GLPI_ROOT . "/inc/includes.php");

$email = new UserEmail();

if (isset($_REQUEST["delete"])) {
   $email->check($_REQUEST["id"], 'w');
   $email->delete($_REQUEST);

   Event::log($email->getField('users_id'), "users", 4, "setup",
              $_SESSION["glpiname"]." ".$LANG['log'][36]);
   Html::back();

} else if (isset($_REQUEST["update"])) {
   $email->check($_REQUEST["id"], 'w');
   $email->update($_REQUEST);

   Event::log($email->getField('users_id'), "users", 4, "setup",
              $_SESSION["glpiname"]." ".$LANG['log'][36]);
   Html::back();

}

displayErrorAndDie('Lost');

?>
