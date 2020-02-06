<?php echo \core\error::display($error); ?>

<form action='' method='post'>

<p>Username<br><input type="text" name="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; }?>"></p>
<p>Password<br><input type="password" name="password" value=""></p>
<p>Email<br><input type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }?>"></p>
<p><input type="submit" name="submit" value="Add User"></p>

</form>