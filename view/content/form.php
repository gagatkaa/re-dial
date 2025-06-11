<h2 class="submit-form__header">#ReDialYourWay Submit Form</h2>

<?php
// show the errors
if (!empty($errors)) {
    var_dump($errors);
}
?>

<form method="post" action="index.php?page=form" class="submit-form">
    <input type="hidden" name="action" value="add_story" class="form--add">

    <!-- Name Field -->
    <div class="field">
        <label for="name">
            Name/Nickname
            <span title="Tell us who’s on the other end of the line.">
                <i class="fa-solid fa-circle-info info__icon"></i>
            </span>
        </label>
        <input type="text" id="name" name="user_name" placeholder="Your name or nickname" required class="input" />
        <span class="error"><?php if (!empty($errors['user_name']))
            echo $errors['user_name']; ?></span>
    </div>

    <!-- When Used -->
    <div class="field">
        <label for="when">
            When did you use it?
            <span title="At what moment did you reach for it?">
                <i class="fa-solid fa-circle-info info__icon"></i>
            </span>
        </label>
        <select id="when" name="usage_time" class="input" required>
            <option value="">Select a moment...</option>
            <option value="morning">In the morning</option>
            <option value="panic">During a panic attack</option>
            <option value="stress">While feeling stressed</option>
            <option value="other">Other</option>
        </select>
        <span class="error"><?php if (!empty($errors['usage_time']))
            echo $errors['usage_time']; ?></span>
    </div>

    <!-- Which Tool -->
    <div class="field">
        <label for="tool-group">
            Which tool did you use?
            <span title="Select the calming tool that supported you.">
                <i class="fa-solid fa-circle-info info__icon"></i>
            </span>
        </label>
        <div class="tool__radios" id="tool-group">
            <label class="radio-wrapper">
                <input class="input" type="radio" name="tool_used" value="Silent Hotline" required />
                <span class="custom-radio"></span>
                Receiver (Silent Hotline)
            </label>
            <label class="radio-wrapper">
                <input class="input" type="radio" name="tool_used" value="Breath Focus Spinner" />
                <span class="custom-radio"></span>
                Dial (Breathing Spinner)
            </label>
            <label class="radio-wrapper">
                <input class="input" type="radio" name="tool_used" value="Grounding Keypad" />
                <span class="custom-radio"></span>
                Keypad (Grounding Prompts)
            </label>
        </div>
        <span class="error"><?php if (!empty($errors['tool_used']))
            echo $errors['tool_used']; ?></span>
    </div>

    <!-- How Did It Help -->
    <div class="field">
        <label for="impact">
            How did it help you?
            <span title="Choose one of the suggestions or type your own.">
                <i class="fa-solid fa-circle-info info__icon"></i>
            </span>
        </label>
        <input type="text" id="impact" name="impact" required class="input" placeholder="Start typing..."
            autocomplete="off" />
        <ul class="custom-suggestions" id="suggestionBox"></ul>
        <span class="error"><?php if (!empty($errors['impact']))
            echo $errors['impact']; ?></span>
    </div>

    <!-- Share Permission -->
    <fieldset>
        <legend>Can we share your story?</legend>
        <label class="checkbox-wrapper">
            <input type="checkbox" name="consent_to_share" value="1" />
            <span class="custom-checkbox"></span>
            <p>I agree to have my story featured publicly as part of the ReDial community.</p>
        </label>
    </fieldset>

    <!-- Submit Button -->

    <button type="submit">Submit Your Story</button>

</form>
<div class="popup hidden" id="genericPopup">
    <div class="popup__content">
        <h2>Thanks for dialing in!</h2>
        <div class="popup__text">
            <p>Your story has been received!</p>
            <p>You're now part of the <span class="bold-text">#ReDialYourWay</span> community.</p>
        </div>
        <div class="popup__buttons">
            <a class="CTA__button secondary-button" href="index.php?page=challenge_CTA">Cancel</a>
            <a class="CTA__button" href="index.php?page=stories">User Stories</a>
        </div>
        <button class="popup__close" id="closePopup">&times;</button>
    </div>
</div>