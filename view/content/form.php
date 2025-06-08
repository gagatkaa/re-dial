<h2 class="submit-form__header">#ReDialYourWay Submit Form</h2>
<form class="submit-form">

    <!-- Name Field -->
    <div class="field">
        <label for="name">
            Name/Nickname
            <span title="Tell us who’s on the other end of the line."><i
                    class="fa-solid fa-circle-info info__icon"></i></span>
        </label>
        <input type="text" id="name" name="name" placeholder="Your name or nickname" required />
    </div>
    <!-- When Used -->
    <div class="field">
        <label for="when">
            When did you use it?
            <span title="At what moment did you reach for it?"><i class="fa-solid fa-circle-info info__icon"></i></span>
        </label>
        <select id="when" name="when" required>
            <option value="">Select a moment...</option>
            <option value="morning">In the morning</option>
            <option value="panic">During a panic attack</option>
            <option value="stress">While feeling stressed</option>
            <option value="other">Other</option>
        </select>
    </div>
    <!-- Which Tool -->
    <div class="field">
        <label for="tool-group">
            Which tool did you use?
            <span title="Select the calming tool that supported you.">
                <i class="fa-solid fa-circle-info info__icon"></i>
            </span>
        </label>
        <div class="tool__checkboxes" id="tool-group">
            <label class="checkbox-wrapper">
                <input type="checkbox" name="tool" value="receiver" />
                <span class="custom-checkbox"></span>
                Receiver (Silent Hotline)
            </label>

            <label class="checkbox-wrapper">
                <input type="checkbox" name="tool" value="dial" />
                <span class="custom-checkbox"></span>
                Dial (Breathing Spinner)
            </label>

            <label class="checkbox-wrapper">
                <input type="checkbox" name="tool" value="keypad" />
                <span class="custom-checkbox"></span>
                Keypad (Grounding Prompts)
            </label>
        </div>


    </div>
    <!-- How Did It Help -->
    <div class="field">
        <label for="impact">
            How did it help you?
            <span title="Choose one of the suggestions or type your own."><i
                    class="fa-solid fa-circle-info info__icon"></i></span>
        </label>
        <input list="impactSuggestions" id="impact" name="impact" placeholder="Start typing..." />

        <datalist id="impactSuggestions">
            <option value="Helped me breathe slower and think clearer.">
            <option value="Felt like I had a little safe space for a second.">
            <option value="It distracted my anxious brain just enough to reset.">
            <option value="Weirdly comforting to press buttons and follow the prompt.">
            <option value="Didn’t expect it, but I actually felt calmer after.">
            <option value="It made me smile — and that helped.">
            <option value="My cat judged me, but I felt better.">
            <option value="Grounded me when I felt floaty.">
            <option value="Made me pause and just exist for a bit.">
        </datalist>
    </div>
    <!-- Share Permission -->

    <fieldset>
        <legend>
            Can we share your story?
        </legend>
        <label class="checkbox-wrapper">
            <input type="checkbox" name="tool" value="keypad" />
            <span class="custom-checkbox"></span>
            I agree to have my story featured publicly as part of the ReDial community.
        </label>
    </fieldset>


    <!-- Submit Button -->
    <button type="submit">Submit Your Story</button>
</form>