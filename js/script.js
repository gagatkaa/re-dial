// Get the DOM elements
const $storiesList = document.querySelector(".story__list"); // The container to list pizzas
const $createForm = document.querySelector(".submit-form"); // The form used to add a new pizza

// Function to handle form submission
const handleSubmitPizzaForm = async (e) => {
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

  // If the pizza was successfully created
  if (parsedResponse.result === "ok") {
    const story = parsedResponse.data; // Destructure pizza info

    // Create DOM elements
    // const $story = document.createElement("li");
    // $story.classList.add("pizza__item");

    // const $image = document.createElement("img");
    // $image.classList.add("item__image");
    // $image.src = `./assets/${pizza.image}`;
    // $image.alt = pizza.name;
    // $pizza.appendChild($image);

    // const $name = document.createElement("h3");
    // $name.textContent = pizza.name;
    // $pizza.appendChild($name);

    // const $description = document.createElement("p");
    // $description.textContent = pizza.description;
    // $pizza.appendChild($description);

    // const $price = document.createElement("p");
    // $price.textContent = `${pizza.price}$`;
    // $pizza.appendChild($price);

    // Add pizza to the top of the list
    $storiesList.prepend($story);
  }

  // Optionally remove loading state here if used
};

// Attach the submit event to the form
const init = () => {
  if ($createForm) {
    $createForm.addEventListener("submit", handleSubmitPizzaForm);
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

document.addEventListener("click", (e) => {
  if (!e.target.closest(".field")) {
    suggestionBox.style.display = "none";
  }
});

init(); // Initialize the script on page load
