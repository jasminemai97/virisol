<?php

/* index.php
 *
 * Online Virus Check
 * CS 174: Server-side Web Programming
 * Professor Fabio Di Troia
 *
 * Written by Jasmine Mai, Nhat Nguyen, and Albert Ong
 */

// Creates all of the tables needed. 
require_once "scripts/database/admin-contents.php";
require_once "scripts/database/admin-credentials.php";
require_once "scripts/database/user-contents.php";
require_once "scripts/database/user-credentials.php";

// First page is the signup page
header('Location: ./pages/user-signup/');
exit();

?>
