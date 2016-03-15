<div class="opinion">
    <div>
        <h3><?php echo "{$this->opinion['title']}" ?></h3>
        <p><?php echo "{$this->opinion['content']}" ?></p>
        <a href="/MyPhpProject/users/listOpinionsByColumnist/<?= $this->opinion['columnist_id'] ?>">Back</a>
    </div>
</div>
