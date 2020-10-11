
<a class="back" href="index.php">back to list</a>

<?php if (!empty($_SESSION['info'])): ?>
    <div class="info-message"><?php echo $_SESSION['info']; ?></div>
<?php endif; ?>

<div class="specifications">
    <?php 
    $teller = 0;
    foreach ($specifications as $specification): ?>
        <section class="specification">
            <button class="circle specification__circle <?php echo "circle" . $teller; ?>">
                <p class="specification__text <?php echo "circle-text" . $teller; ?>"><?php echo $specification['description']; ?></p>
            </button>
            <h3 class="specification__label"><?php echo $specification['specification']; ?></h3>
        </section>
    <?php 
    $teller++;
    endforeach; ?>
</div>


<form method="post" class="btn-place" action="index.php?page=detail&amp;id=<?php echo $item['id'];?>">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" >
    <?php if (!empty($_SESSION['finishedItems'][$item['id']])): ?>
      <button class="btn btn-remove" type="submit" name="action" value="remove">Remove</button>
    <?php else: ?>
      <button class="btn btn-add" type="submit" name="action" value="add">Finished</button>
    <?php endif;?>
</form>