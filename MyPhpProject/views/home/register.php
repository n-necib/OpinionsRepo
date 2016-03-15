<div id="register" >
    <form  method="POST">
        <div>
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label><br>
            <input type="password"  name="password" id="password" >
        </div>
       <div>
           <label for="confirm-pass">Confirm Password:</label>
           <input type="password"  name="confirm-pass" id="confirm-pass" >
       </div>

        <input type="submit" name="submit" value="Register">
    </form>

    <?php if(isset($_SERVER['message'])): ?>
        <div id="message" style="background-color:<?= $_SERVER['color']?>">
            <p><?= $_SERVER['message'] ?></p>
        </div>
    <?php endif ?>
</div>