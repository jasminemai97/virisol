
<!--
input-password.php

Allows the user to input their password.
Used in both login.php and signup.php. 

Online Virus Check
CS 174: Server-side Web Programming
Professor Fabio Di Troia

Written by Jasmine Mai, Nhat Nguyen, and Albert Ong
Revision 03.04.2019
-->

<!-- https://support.google.com/a/answer/139399?hl=en -->
<!-- <p>Your password can't start or end with a blank space</p> -->
<label for="password" class="component-title">Password <span>*</span></label>
<input type="password" name="password" placeholder="Must be at least 6 characters" minlength="6" maxlength="100" required>