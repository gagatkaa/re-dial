<section class="tool__content container">
    <article class="tool">
        <div class="tool__info">
            <header class="tool__header">
                <h2>Silent Hotline</h2>
                <p class="tool__subtitle">Talk it out, even if no one’s listening.</p>
            </header>
            <div class="tool__description">
                <p class="tool__instructions">
                    <span class="tool__howto-label">How to make it:</span></br>
                    Keep the receiver from an old phone. That’s it. Or just simulate the act with any object that fits
                    in your hand.



                </p>
                <p class="tool__instructions">
                    <span class="tool__howto-label">How it helps:</span></br>
                    Talking out loud can be a powerful way to process emotions, especially during panic or stress. It
                    creates a <span class="bold-text">safe, judgment-free </span> moment of expression, like calling a
                    version of yourself who always
                    listens.


                </p>
            </div>
            <div class="tool__action">
                <span class="tool__tooltip">
                    <i class="fa-solid fa-arrow-right-long"></i> Press here to <span class="bold-text">"record"</span> a
                    test message
                    to yourself.<br>
                    <span class="bold-text">No pressure </span>— it’s not saved, tracked, or judged. Just you, your
                    voice, and a vintage receiver
                </span>
                <a class="CTA__button--round" id="openMicPopup">
                    <i class="fa-solid fa-microphone fa-beat fa-2x"></i>
                </a>
            </div>
        </div>
        <img class="tool__image" src="assets/tool1.svg" alt="Silent Hotline">
    </article>
    <div class="navigation__button">
        <a href="index.php?page=tool2" class="arrow-button-svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="230" height="47" viewBox="0 0 230 47" fill="none">
                <path
                    d="M0 5C0 2.23858 2.23858 0 5 0H191.756C193.556 0 195.323 0.485852 196.87 1.40629L226.779 19.2032C230.036 21.1416 230.036 25.8584 226.779 27.7969L196.87 45.5937C195.323 46.5141 193.556 47 191.756 47H5C2.23858 47 0 44.7614 0 42V5Z"
                    fill="#BFA34E" />
            </svg>
            <span class="arrow-label">Breath Focus Spinner</span>
        </a>
    </div>
    <div class="popup hidden" id="micPopup">
        <div class="popup__content">
            <button class="popup__close" id="closeMicPopup">&times;</button>
            <h2>Send a Self Message</h2>
            <canvas id="micBars" width="400" height="120"></canvas>
            <div class="popup__text">
                <p class="bold-text">Talk to yourself — no pressure.</p>
                <p>Nothing’s recorded or saved. Just you, your voice, and the visual response.</p>
            </div>
        </div>
    </div>


</section>