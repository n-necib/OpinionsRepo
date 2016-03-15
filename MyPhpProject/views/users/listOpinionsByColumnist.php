<div class="listOp">
    <ul>
        <?php foreach ( $this->opinions as $opinion) :
            $date = substr($opinion['posted_on'], 0, -9);  // returns "abcde"?>
            <li>
                <div>
                    <span><?php echo $date?></span><br>
                    <a href="/MyPhpProject/users/getOpinion/<?= $opinion['id']?>"><?php echo "{$opinion['title']}" ?></a>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
    <a href="/MyPhpProject/users/listOpinionsByColumnist/<?= $this->columnistId ?>/<?= $this->page - 1 ?>">Previous</a>
    <a href="/MyPhpProject/users/listOpinionsByColumnist/<?= $this->columnistId ?>/<?= $this->page + 1 ?>">Next</a>
    <a href="/MyPhpProject/home/listColumnists">Back</a>
</div>