<div class="items">
 <?php foreach ($items as $item): ?>
    <article class="item">
      <a class="circle item__circle <?php if (!empty($_SESSION['finishedItems'][$item['id']])) echo ' circle--finished' ?>" href="index.php?page=detail&id=<?php echo $item['id']; ?>">
        <img class="item__icon" src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" width="90" height="95">
      </a>
      <h2 class="item__title"><?php echo $item['title']; ?></h2>
    </article>
   <?php endforeach; ?>
</div>