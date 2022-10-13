<?php include 'start.html'; ?>

<div class="login">
    <h2>Have an account?</h2>

    <form action="/login.php" method="post">
        <?php if (isset($_GET['message'])) : ?>
            <p class="error-message"><?= $_GET['message']; ?></p>
        <?php endif; ?>

        <div class="login-content">
            <div class="input-username">
                <input type="text" name="username" id="username" placeholder="Username">
            </div>

            <div class="input-password">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <div class="button">
                <button type="submit">Log in</button>
            </div>
        </div>
    </form>
</div>
<?php include 'end.html' ?>