<div class="stories__bg">
    <section class="centered-section">
        <header class="stories__header">
            <h2>Real People, Real Calm</h2>
        </header>
        <article class="stories__text">
            <p>These stories come from people who gave our tools a try — using the landline phone to find calm,
                focus,
                or
                comfort in real moments.</p>
            <p>Each one is a small reminder: </p>
            <p class="bold-text">Even simple things can make a big difference.</p>
        </article>
    </section>
</div>
<div class="stories__cards-section container">
    <div class="stories__cards story__list">
        <?php foreach ($user_stories as $story): ?>
            <div class=" review-card">
                <div class="review-card__user">
                    <i class="fa-solid fa-user"></i>
                    <div class="review-card__name"><?= htmlspecialchars($story->user_name) ?></div>
                </div>
                <div class="review-card__date"><?= htmlspecialchars($story->submitted_at) ?></div>
                <div class="review-card__usage"><?= htmlspecialchars($story->usage_time) ?></div>
                <div class="review-card__tool"><?= htmlspecialchars($story->tool_used) ?></div>
                <div class="review-card__data">"<?= nl2br(htmlspecialchars($story->impact)) ?>"</div>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="CTA__button centered-button" href="index.php?page=form">Submit Your Story</a>
</div>