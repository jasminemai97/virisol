<?php

echo <<<_END
<label for="password" class="component-title">Password <span>*</span></label>
<input type="password" name="password" placeholder="Must be at least 6 characters" minlength="6" maxlength="100" required>
_END;

?>