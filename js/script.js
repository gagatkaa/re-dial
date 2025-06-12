const $storiesList = document.querySelector(".story__list");
const $createForm = document.querySelector(".submit-form");

const handleInsertStoryForm = async (e) => {
  e.preventDefault();

  if (!$createForm.checkValidity()) {
    return;
  }

  const response = await fetch("index.php?page=api-add-story", {
    method: "post",
    body: new FormData($createForm),
  });

  const parsedResponse = await response.json();

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

    popup.classList.remove("hidden");
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
  if (!e.target.closest(".field") && suggestionBox) {
    suggestionBox.style.display = "none";
  }
});

const popup = document.getElementById("genericPopup");
const closeBtn = document.getElementById("closePopup");

const isHomePage =
  window.location.href.includes("page=home") ||
  window.location.href.endsWith("index.php");

if (isHomePage && popup) {
  setTimeout(() => {
    popup.classList.remove("hidden");
  }, 15000);
}

if (closeBtn && popup) {
  closeBtn.addEventListener("click", () => {
    popup.classList.add("hidden");
  });
}

init();
