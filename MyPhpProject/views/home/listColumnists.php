<div class="columnists">
    <?php if(!isset($_SESSION['username'])):?>
        <p id="pLog">Please, login to see the opinions!</p>
    <?php endif?>
<ul class="listColumnists">
    <?php foreach ( $this->columnists as $columnist) :?>
        <li>
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $columnist['img'] ).'"/>';?>
            <a href="/MyPhpProject/users/listOpinionsByColumnist/<?= $columnist['id'] ?>"><?php echo "{$columnist['name']}" ?></a>
        </li>
    <?php endforeach;?>
</ul>
    <a href="/MyPhpProject/home/listColumnists/<?= $this->page - 1 ?>">Previous</a>
    <a href="/MyPhpProject/home/listColumnists/<?= $this->page + 1 ?>">Next</a>
</div>