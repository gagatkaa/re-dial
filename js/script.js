const $storiesList = document.querySelector(".story__list");
const $createForm = document.querySelector(".submit-form");

const handleInsertStoryForm = async (e) => {
  e.preventDefault(); // Prevent full page reload

  // Basic HTML5 validation check
  if (!$createForm.checkValidity()) {
    // If invalid, stop here — validate.js handles error display
    return;
  }

  // Send form data using fetch
  const response = await fetch("index.php?page=api-add-story", {
    method: "post",
    body: new FormData($createForm), // Automatically gathers all form fields
  });

  // Parse the JSON response
  const parsedResponse = await response.json();

  // Clear the form inputs
  $createForm.reset();

  if (parsedResponse.result === "ok") {
    const story = parsedResponse.data;

    const $story = document.createElement("div");
    $story.classList.add("review-card");

    const $name = document.createElement("div");
    $name.classList.add("review-card__name");
    $name.textContent = story.user_name;

    const $tool = document.createElement("div");
    $tool.classList.add("review-card__tool");
    $tool.textContent = story.tool_used;

    const $impact = document.createElement("div");
    $impact.classList.add("review-card__impact");
    $impact.textContent = story.impact;

    $story.appendChild($name);
    $story.appendChild($tool);
    $story.appendChild($impact);

    if ($storiesList) {
      $storiesList.prepend($story);
    }
  }
};

const init = () => {
  if ($createForm) {
    $createForm.addEventListener("submit", handleInsertStoryForm);
  }
};

const suggestions = [
  "Helped me breathe slower and think clearer.",
  "Felt like I had a little safe space for a second.",
  "It distracted my anxious brain just enough to reset.",
  "Weirdly comforting to press buttons and follow the prompt.",
  "Didn’t expect it, but I actually felt calmer after.",
  "It made me smile — and that helped.",
  "My cat judged me, but I felt better.",
  "Grounded me when I felt floaty.",
  "Made me pause and just exist for a bit.",
];

const input = document.getElementById("impact");
const suggestionBox = document.getElementById("suggestionBox");

if (input) {
  input.addEventListener("input", () => {
    const value = input.value.toLowerCase();
    suggestionBox.innerHTML = "";

    if (value) {
      const filtered = suggestions.filter((text) =>
        text.toLowerCase().includes(value)
      );

      filtered.forEach((text) => {
        const li = document.createElement("li");
        li.textContent = text;
        li.onclick = () => {
          input.value = text;
          suggestionBox.style.display = "none";
        };
        suggestionBox.appendChild(li);
      });

      suggestionBox.style.display = filtered.length ? "block" : "none";
    } else {
      suggestionBox.style.display = "none";
    }
  });
}

document.addEventListener("click", (e) => {
  if (!e.target.closest(".field")) {
    suggestionBox.style.display = "none";
  }
});

const popup = document.getElementById("challengePopup");
const closeBtn = document.getElementById("closePopup");

// Only show on home page
const isHomePage =
  window.location.href.includes("page=home") ||
  window.location.href.endsWith("index.php");

if (isHomePage) {
  setTimeout(() => {
    popup.classList.remove("hidden");
  }, 5000); // show after 5 seconds
}

closeBtn.addEventListener("click", () => {
  popup.classList.add("hidden");
});

init();
