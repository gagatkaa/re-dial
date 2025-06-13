<section class="tool__content container">
    <article class="tool section-gap">
        <div class="tool__info tool__info--tool3">
            <header class="tool__header">
                <h2>Grounding Keypad Tool</h2>
                <p class="tool__subtitle">Press your way to the present.</p>
            </header>
            <div class="tool__description">
                <p class="tool__instructions">
                    <span class="tool__howto-label">How to make it:</span><br>
                    Gently remove the keypad from an old landline phone. Keep it as-is or place it on a surface where
                    you can easily interact with it. Each button becomes a grounding prompt linked to your senses.

                </p>
                <p class="tool__instructions">
                    <span class="tool__howto-label">How it helps:</span><br>
                    When dissociation or overwhelm sets in, pressing the buttons gives structure and focus. One key at a
                    time, you’re <span class="bold-text">guided back to the present</span>. Reconnecting with your body,
                    your breath, and your
                    surroundings.

                </p>
            </div>
        </div>
        <div class="keypad">
            <div class="keypad__wrapper">
                <div class="keypad__box">
                    <div class="keypad__buttons">
                        <?php for ($i = 1; $i <= 9; $i++): ?>
                            <button class="keypad__button" data-key="<?= $i ?>"><?= $i ?></button>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="control__buttons">
                    <button class="CTA__button--round" id="pauseBtn" aria-label="Pause and shuffle prompt"><i
                            class="fa-solid fa-shuffle fa-2x"></i></button>
                </div>
            </div>

            <div class="keypad__prompt-area">
                <p id="keypadPrompt" class="keypad__prompt">Press a number. Get a prompt. Type what comes to mind.</p>
                <textarea id="keypadResponse" class="keypad__textarea" rows="4"
                    placeholder="Your response..."></textarea>
                <a class="CTA__button" id="doneBtn">Done</a>
                <p id="calmMessage" class="calm-message hidden"></p>
            </div>

        </div>


    </article>
    <div class="navigation__buttons">
        <a href="index.php?page=tool2" class="arrow-button-svg  secondary-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="214" height="47" viewBox="0 0 214 47" fill="none">
                <path
                    d="M214 5C214 2.23858 211.761 0 209 0H35.7143C33.8068 0 31.9391 0.545564 30.3315 1.57233L2.59746 19.2862C-0.480677 21.2522 -0.480671 25.7478 2.59747 27.7138L30.3315 45.4277C31.9391 46.4544 33.8068 47 35.7143 47H209C211.761 47 214 44.7614 214 42V5Z"
                    fill="#C3AF71" />
            </svg>
            <span class="arrow-label">Breath Focus Spinner</span>
        </a>

    </div>
</section>
<div class="popup hidden" id="genericPopup">
    <div class="popup__content">
        <h2>How did you like our Calming Tools?</h2>
        <div class="popup__text">
            <p>Let us and other users know. Submit now and get featured</p>
            <p class="bold-text">Join the #ReDialYourWay Challenge!</p>
        </div>
        <div class="popup__button">
            <a class="CTA__button" href="index.php?page=challenge_CTA">Submit Now</a>
        </div>
        <button class="popup__close" id="closePopup" aria-label="Close popup">&times;</button>
    </div>
</div>