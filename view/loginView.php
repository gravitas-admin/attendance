<html>
<head>
    <title>GRAVITAS TECHNOLOGY</title>
    <link rel="stylesheet" href="./view/css/login.css">
    <link rel="stylesheet" href="./view/css/failurePopUp.css">
</head>

<body>

<div class="login-form">
    <div id="head">GRAVITAS TECHNOLOGY</div>

    <!-- ✅ LOGIN FORM ALWAYS VISIBLE -->
    <form name="f1" action="?controller=user&action=login" method="POST">
        <div class="label">User name</div>
        <input type="text" name="user" placeholder="User name" required>

        <div class="label">Password</div>
        <input type="password" name="pass" placeholder="Password" required>

        <div id="submit">
            <button type="submit">Login</button>
        </div>
    </form>
</div>

<!-- ✅ POPUP HTML -->
<?php include __DIR__ . "/failurePopUp.html"; ?>

<!-- ✅ POPUP JS -->
<script src="./view/failurePopup.js"></script>

<!-- ✅ SHOW POPUP ONLY WHEN ERROR EXISTS -->
<?php if (!empty($data['error'])): ?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    showModal("<?php echo addslashes($data['error']); ?>");
});
</script>
<?php endif; ?>

</body>
</html>
