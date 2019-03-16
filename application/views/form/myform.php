<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form/index'); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?=set_value('username')?>" size="50" />

<h5>Password</h5>
<input type="text" name="password" value="<?=set_value('password')?>" size="50" />

<h5>Password Confirm</h5>
<input type="text" name="passconf" value="<?=set_value('passconf')?>" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="<?=set_value('email')?>" size="50" />


<h5>Calenda</h5>
<input type="text" name="email" value="<?=set_value('email')?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>



<?php

$password = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
echo "$password<br>";
echo "<br>";
echo password_verify("rasmuslerdorf", $password);
?>

</body>
</html>
