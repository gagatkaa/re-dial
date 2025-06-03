// Get the DOM elements
const $pizzaList = document.querySelector(".pizza__list");     // The container to list pizzas
const $createForm = document.querySelector(".pizza__form");    // The form used to add a new pizza

// Function to handle form submission
const handleSubmitPizzaForm = async (e) => {
  e.preventDefault(); // Prevent full page reload

  // Basic HTML5 validation check
  if (!$createForm.checkValidity()) {
    // If invalid, stop here — validate.js handles error display
    return;
  }

  // Send form data using fetch
  const response = await fetch("index.php?page=api-create-pizza", {
    method: "post",
    body: new FormData($createForm), // Automatically gathers all form fields
  });

  // Parse the JSON response
  const parsedResponse = await response.json();

  // Clear the form inputs
  $createForm.reset();

  // If the pizza was successfully created
  if (parsedResponse.result === "ok") {
    const pizza = parsedResponse.data; // Destructure pizza info

    // Create DOM elements
    const $pizza = document.createElement("li");
    $pizza.classList.add("pizza__item");

    const $image = document.createElement("img");
    $image.classList.add("item__image");
    $image.src = `./assets/${pizza.image}`;
    $image.alt = pizza.name;
    $pizza.appendChild($image);

    const $name = document.createElement("h3");
    $name.textContent = pizza.name;
    $pizza.appendChild($name);

    const $description = document.createElement("p");
    $description.textContent = pizza.description;
    $pizza.appendChild($description);

    const $price = document.createElement("p");
    $price.textContent = `${pizza.price}$`;
    $pizza.appendChild($price);

    // Add pizza to the top of the list
    $pizzaList.prepend($pizza);
  }

  // Optionally remove loading state here if used
};

// Attach the submit event to the form
const init = () => {
  if ($createForm) {
    $createForm.addEventListener("submit", handleSubmitPizzaForm);
  }
};

init(); // Initialize the script on page load
