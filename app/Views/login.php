<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Luxury Motors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #222; }
        .login-container { max-width: 400px; margin: 80px auto; background: #fff; border-radius: 10px; box-shadow: 0 0 20px #0002; padding: 2rem; }
        .logo { display: block; margin: 0 auto 1.5rem; }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="/assets/images/logos/logo.png" alt="Luxury Motors" class="logo" height="60">
        <h3 class="text-center mb-4">Admin Login</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"> <?= esc($error) ?> </div>
        <?php endif; ?>
        <form method="post" action="/admin/login">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
