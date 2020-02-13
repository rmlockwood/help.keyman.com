<?php
/**
 * Created by PhpStorm.
 * User: joshua
 * Date: 9/27/2017
 * Time: 11:52 AM
 */

require_once('includes/template.php');

// Required
head([
  'title' =>'Keyman Developer Version History',
  'css' => ['template.css','index.css'],
  'showMenu' => true
]);

require_once("includes/history_utils.php");

display_history("developer");

// Included to trick the side nav into generating a nice name for history.md in the sidebar.
// <h1>Keyman Developer Version History</h1>
?>