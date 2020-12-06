<?php declare(strict_types=1);
/** @var \PaginationPack\Service\Pagination $paginator */
if($paginator->getNumberPages() > 0):
    $url = $_SERVER['REQUEST_URI'];

    $lastSlashPos = strrpos($url, '/');

    $baseUrl = substr($url, 0, -strlen(substr($url, $lastSlashPos))) . '/';
?>
    <div class="tabsMenu pagination">
        <?php
        for($current = $paginator->getFirstShownPage(); $current <= $paginator->getLastShownPage(); ++$current):
            if($current == $paginator->getPage()): ?>
                <span class="active"><?=$current?></span>
            <?php else: ?>
                <a href="<?=$baseUrl?><?=$current?><?=(!empty($_SERVER['QUERY_STRING']))?'?'.$_SERVER['QUERY_STRING']: ''?>"><?=$current?></a>
            <?php endif;
        endfor; ?>
        <?php $lastPage = $paginator->getLastPage();
        if($paginator->getLastShownPage() < $lastPage): ?>
            <span>...</span>
            <a href="<?=$baseUrl?><?=$lastPage?><?=(!empty($_SERVER['QUERY_STRING']))?'?'.$_SERVER['QUERY_STRING']: ''?>"><?=$lastPage?></a>
        <?php endif; ?>
    </div>
<?php endif; ?>