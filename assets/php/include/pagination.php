<!--
<ul class="ws_pagination">
    <li class="pagination_item">
        <a href="?page=1" class="pagination_link">&lt;&lt;</a>
    </li>
    <?php if($page > 1): ?>
        <li class="pagination_item">
            <a href="?page=<?php echo ($page - 1); ?>" class="pagination_link">&lt;</a>
        </li>
    <?php endif; ?>
    <?php if($page < $total_pages): ?>
        <li class="pagination_item">
            <a href="?page=<?php echo ($page + 1); ?>" class="pagination_link">&gt;</a>
        </li>
    <?php endif; ?>
    <li class="pagination_item">
        <a href="?page=<?php echo $total_pages ?>" class="pagination_link">&gt;&gt;</a>
    </li>
</ul>-->
<!--
<li class="pagination_item">
    <a href="?page=<?php echo $p + 1; ?>" class="pagination_link"><?php echo $p + 1; ?></a>
</li>
-->

<ul class="ws_pagination">
    <!-- pg_disable pg_active -->
    <li class="pagination_item">
        <a href="?page=1" class="pagination_link">&lt;&lt;</a>
    </li>
    <?php for($p = 0; $p <= $total_pages; $p++) { ?>
        <li class="pagination_item">
            <?php
            if($_GET['page'] == ($p+1)) {
                $active = "pg_active"; 
            } else {
                $active = '';
            }
            $plus = 1;
            echo '<a href="?page='.($p+1).'" class="pagination_link '.$active.'"> '.($p+1).' </a>'; 
            ?>
        </li>
    <?php } ?>
    <li class="pagination_item">
        <a href="?page=<?php echo $total_pages + 1; ?>" class="pagination_link">&gt;&gt;</a>
    </li>
</ul>