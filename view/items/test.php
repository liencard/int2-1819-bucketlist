
<a class="back" href="index.php">back to list</a>

<div class="test__wrapper">
    <section class="personality-test">
        <h2 class="test__title">Take your personality test</h2>
        <p class="test__description">By taking this personality test we can make sure your given parameters are tuned to your needs.</p>

        <div class="questions">
            <?php foreach ($questions as $question): ?>
                <div class="question">
                    <input type="hidden" name="question_id" value="<?php echo $question['id'];?>" />
                    <h3 class="question__title">Question <?php echo $question['number']; ?></h3>
                    <p class="question__question"><?php echo $question['question']; ?></p>

                    <input type="range" min="0" max="10" value="5" class="slider question__slider">
                    <div class="question__ranking">
                        <p class="question__rank">disagree</p>
                        <p class="question__rank">agree</p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <?php if (!empty($_SESSION['info'])): ?>
            <div class="box-info"><?php echo $_SESSION['info']; ?></div>
        <?php endif; ?>
        <button class="btn btn-save" type="submit" name="action" value="save">Save answers</button>
    </section>
</div>
