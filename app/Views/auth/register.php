<?= view('templates/header', ['title' => 'Register | Luxury Motors']) ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="card-title text-center mb-4">Register</h2>
                    
                    <?php if (session()->has('message')): ?>
                        <div class="alert alert-success"><?= session('message') ?></div>
                    <?php endif; ?>
                    
                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger">
                            <?php foreach (session('errors') as $error): ?>
                                <p class="mb-1"><?= $error ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="/register" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number (Optional)</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?= old('phone') ?>">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                    
                    <div class="mt-3 text-center">
                        <a href="/login">Already have an account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>