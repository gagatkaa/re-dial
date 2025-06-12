<section class="intro__content container">
    <div class="intro">
        <header class="intro__header">
            <h2 class="intro__title"><span class="heading-semibold">ReDial</span> your thinking.
                Reconnect with <span class="text-underline">yourself.</span></h2>
        </header>
        <p class="intro__subtitle">It used to ring for someone else - now it’s here to help you feel calm, clear, and
            connected to yourself.</p>
        <a class="CTA__button" href="#aboutus">Show Me How</a>
    </div>
    <img class="intro__image" src="assets/home_phone.gif" alt="Old Landline phone">
</section>
<div class="section__bg">
    <section class="about__section container" id="aboutus">
        <article class="about__content">
            <header class="about__header">
                <h3 class="about__title">Why A Landline Phone?</h3>
            </header>
            <div class="about__text">
                <p>Before smartphones and apps, we reached out to the world through a landline. It was steady,
                    comforting, and part of our daily lives.
                    <span class="bold-text">Now, we're bringing it back. </span>Not to connect with others, but to
                    reconnect with yourself.
                </p>
            </div>
        </article>
        <article class="about__content left-aligned">
            <header class="about__header">
                <h3 class="about__title">How Can It Help?</h3>
            </header>
            <div class="about__text">
                <p>With just one object, you can slow your breath, quiet your mind, and <span class="bold-text">come
                        back to the present</span>.
                    Each feature repurposes a part of the phone to create a soothing, intuitive ritual — perfect for
                    moments when the world feels overwhelming.</p>

            </div>
            <a class="CTA__button" href="#tools">Ready To Dial A Number?</a>
        </article>

    </section>
</div>
<section class="tools__section container" id="tools">
    <header class="tools__header">
        <h3 class="tools__title">Three Ways to Reconnect</h3>
    </header>
    <article class="tools__text">
        <p class="tools__subtitle">We’ve transformed the landline phone into three calming tools. Each one uses a
            different part of the phone — and each one helps in a different way.
        </p>
        <p class="bold-text">Choose one to begin.</p>
    </article>
    <article class="tools__cards">
        <a href="index.php?page=tool1" class="tools__card-link">
            <div class="tools__card">
                <div class="card__frame">
                    <div class="masked-image tool1"></div>
                </div>
                <div class="tools__info">
                    <h4 class="tools__name">Silent Hotline</h4>
                    <p class="tools__description">Talk it out, even if no one is listening.</p>
                </div>
            </div>
        </a>
        <a href="index.php?page=tool2" class="tools__card-link">
            <div class="tools__card inverted-card">
                <div class="tools__info">
                    <h4 class="tools__name">Breath Focus Spinner</h4>
                    <p class="tools__description">Dial down the panic.</p>
                </div>
                <div class="card__frame">
                    <div class="masked-image tool2"></div>
                </div>
            </div>
        </a>
        <a href="index.php?page=tool3" class="tools__card-link">
            <div class="tools__card">
                <div class="card__frame">
                    <div class="masked-image tool3"></div>
                </div>
                <div class="tools__info">
                    <h4 class="tools__name">Grounding Keypad</h4>
                    <p class="tools__description">Press your way to the present.</p>
                </div>
            </div>
        </a>
    </article>
</section>
<div class="section__bg--cards">
    <section class="stories__cards-section container">
        <header class="stories__cards--header">
            <h3>Sneak Peek into Real Stories</h3>
            <p class="stories__cards--text">
                See how others have used ReDial to <span class="bold-text">reconnect and reflect</span>.
            </p>
        </header>
        <div class="stories__cards story__list">
            <?php foreach ($user_stories as $story): ?>
                <div class="review-card">
                    <div class="review-card__user">
                        <i class="fa-solid fa-user"></i>
                        <div class="review-card__name"><?= htmlspecialchars($story['user_name'] ?? '') ?></div>
                    </div>
                    <div class="review-card__date"><?= htmlspecialchars($story['submitted_at'] ?? '') ?></div>
                    <div class="review-card__usage"><?= htmlspecialchars($story['usage_time'] ?? '') ?></div>
                    <div class="review-card__tool"><?= htmlspecialchars($story['tool_used'] ?? '') ?></div>
                    <div class="review-card__data">"<?= nl2br(htmlspecialchars($story['impact'] ?? '')) ?>"</div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="CTA__button centered-button" href="index.php?page=stories">Read More</a>
    </section>
</div>
<div class="popup hidden" id="genericPopup">
    <div class="popup__content">
        <h2>Join the #ReDialYourWay Challenge</h2>
        <div class="popup__text">
            <p>Tried one of our tools with an old landline phone?</p>
            <p class="bold-text">Submit it and get featured!</p>
        </div>
        <div class="popup__button">
            <a class="CTA__button" href="index.php?page=challenge_CTA">Join Now!</a>
        </div>
        <button class="popup__close" id="closePopup" aria-label="Close popup">&times;</button>
    </div>
</div>