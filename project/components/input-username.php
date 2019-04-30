<?php

// Sorry, your username must be between 6 and 30 characters long.
// Sorry, only letters (a-z), numbers (0-9), and periods (.) are allowed.

echo <<<_END
<label for="username" class="component-title">Username <span>*</span></label>
<input
  type="text"
  name="username"
  placeholder="e.g. BooksLover"
  spellcheck="false"
  pattern="[0-9a-zA-Z-_]+"
  title="The username can contain English letters (capitalized or not), digits, and the characters '_' (underscore) and '-' (dash)"
  required
>
_END;

?>
