<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <form action="<?= site_url('auth/do_login') ?>" method="post">
        <input type="text" name="username" placeholder="Username" required /><br>
        <input type="password" name="password" placeholder="Password" required /><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
