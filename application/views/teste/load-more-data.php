<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div id="postList">
    <?php if (!empty($posts)) {
        foreach ($posts as $post) { ?>
            <div class="list-item">
                <h2><?php echo $post['idcrm']; ?></h2>
                <p><?php echo $post['empresa']; ?></p>
            </div>
        <?php } ?>
    <?php if ($postNum > $postLimit) { ?>
            <div class="load-more" lastID="<?php echo $post['idcrm']; ?>" style="display: none;">
                Loading more posts...
            </div>
    <?php } else { ?>
            <div class="load-more" lastID="0">
                That's All!
            </div>
        <?php } ?>    
<?php } else { ?>    
        <div class="load-more" lastID="0">
            That's All!
        </div>    
<?php } ?>
</div>