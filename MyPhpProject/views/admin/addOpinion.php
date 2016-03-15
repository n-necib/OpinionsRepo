<div id="addOpinion">
    <form method="POST">
        <label for="title">Title</label><br>
        <input type="text" name="title" id="title"><br>
        <label for="content">Content</label><br>
        <textarea rows="10" cols="50" id="content" name="content"></textarea><br>
        <label for="columnist">Select Columnist:</label><br>
        <select id="columnist" name="columnist"><br>
            <?php foreach ( $this->columnists as $columnist) : ?>
                <option  value="<?= $columnist['id']?>"><?= $columnist['name']?></option>
            <?php endforeach;?>
        </select>
        <input type="submit" name="submit" value="Add" id="AddOp">
    </form>
    <?php if(isset($_SERVER['message'])): ?>
        <div id="message" style="background-color:<?= $_SERVER['color']?>">
            <p><?= $_SERVER['message'] ?></p>
        </div>
    <?php endif ?>
</div>
