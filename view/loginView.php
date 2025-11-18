<html>

<head>
    <title>GRAVITAS TECHNOLOGY</title>
    <link rel="stylesheet" href="./view/css/login.css">
</head>

<body>
    <div class="login-form">
        <div id="head">GRAVITAS TECHNOLOGY</div>
        <?php $error = $data ? $data['error'] : '';
        if ($error != '') { ?>
            <div class='error'><?php echo $data['error'] ?></div>
        <?php } ?>
        <form name="f1" action="?controller=user&action=login"  method="POST">
            <div id="head">User name</div>
            <input type="text" id="user" name="user" placeholder="User name" required>
            <div id="head">Password</div>
            <input type="password" id="pass" name="pass" placeholder="Password" required>
            <div id="submit"><button type="submit">login</button></div>
        </form>
       </body>

</html>