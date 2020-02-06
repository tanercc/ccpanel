<?php echo \core\error::display($error); ?>

<form action='' method='post'>

<p>Username<br><input type="text" name="username" value="<?php echo $data['row'][0]->username; ?>"></p>
<p>Password<br><input type="password" name="password" value=""></p>
<p>Email<br><input type="text" name="email" value="<?php echo $data['row'][0]->email;?>"></p>
<p><input type="submit" name="submit" value="Update"></p>

</form>