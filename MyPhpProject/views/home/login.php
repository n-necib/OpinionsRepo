<div id="login" >
    <form  method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password"  name="password" id="password" >
        </div>
        <input type="submit" name="submit" value="Login">
    </form>
    <?php if(isset($_SERVER['message'])): ?>
        <div id="message" style="background-color: <?= $_SERVER['color']?>">
            <p><?= $_SERVER['message'] ?></p>
        </div>
    <?php endif ?>
</div>