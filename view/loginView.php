<html>

<head>
    <title>GRAVITAS TECHNOLOGY</title>
    <link rel="stylesheet" href="./view/css/login.css">
    <link rel="stylesheet" href="./view/css/failurePopUp.css">
</head>

<body>
    <div class="login-form">
        <div id="head">GRAVITAS TECHNOLOGY</div>
        <?php if (!empty($data['error'])): ?>
            
        <form name="f1" action="?controller=user&action=login"  method="POST">
            <div id="head">User name</div>
            <input type="text" id="user" name="user" placeholder="User name" required>
            <div id="head">Password</div>
            <input type="password" id="pass" name="pass" placeholder="Password" required>
            <div id="submit"><button type="submit">login</button></div>
        </form>
    </div>
    <?php include __DIR__ . "/failurePopUp.html"; ?>
    <script src="./view/failurePopup.js"></script>
    
    <?php if (isset($data['error']) && $data['error'] !== ''): ?>
<script>
    window.onload = function () {
        showModal("<?php echo addslashes($data['error']); ?>");
    };
</script>
<?php endif; ?>

    <?php endif; ?>

    </body>
</html>


