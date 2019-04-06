
<!--
input-name.php

Allows the user to input their name.
Used in signup.php.

Online Virus Check
CS 174: Server-side Web Programming
Professor Fabio Di Troia

Written by Jasmine Mai, Nhat Nguyen, and Albert Ong
Revision 03.04.2019
-->

<label for="username" class="component-title">Username <span>*</span></label>
<input
type="text"
name="username"
placeholder="e.g. BooksLover"
spellcheck="false"
pattern="[0-9a-zA-Z-_]+"
title="The username can contain English letters (capitalized or not), digits, and the characters '_' (underscore) and '-' (dash)"
required>
