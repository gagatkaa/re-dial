if (window.location.href.includes("page=tool3")) {
  const prompts = {
    1: "Look around. What’s something chill your eyeballs enjoy right now?",
    2: "What’s a sound you hear? (Yes, fridge humming counts. So does your cat judging you.)",
    3: "Touch something nearby. Now describe it like you’re on a cooking show.",
    4: "Sniff the air. What’s the weirdest or nicest smell floating around?",
    5: "Think of a snack that makes your soul go ‘mmm.’ Type it. Cravings welcome.",
    6: "Who or what makes you feel like a cozy burrito of safety?",
    7: "Spot something nearby that would survive a zombie apocalypse. Describe it.",
    8: "Pick a color you see. Now give it a weird name like ‘soothing pickle fog’ and tell us how it feels.",
    9: "Type three random things you’re grateful for. Yes, your pillow counts.",
  };

  const promptDisplay = document.getElementById("keypadPrompt");
  const responseField = document.getElementById("keypadResponse");
  const calmMessage = document.getElementById("calmMessage");
  const doneBtn = document.getElementById("doneBtn");
  const shuffleBtn = document.getElementById("pauseBtn");

  document.querySelectorAll(".keypad__button").forEach((button) => {
    button.addEventListener("click", () => {
      const key = button.dataset.key;
      const promptText = prompts[key];
      promptDisplay.textContent = promptText;
      responseField.value = "";
      calmMessage.classList.add("hidden"); // Hide message if user switches prompt
    });
  });

  if (shuffleBtn) {
    shuffleBtn.addEventListener("click", () => {
      const keys = Object.keys(prompts);
      const randomKey = keys[Math.floor(Math.random() * keys.length)];
      promptDisplay.textContent = prompts[randomKey];
      responseField.value = "";
      calmMessage.classList.add("hidden");
    });
  }

  if (doneBtn) {
    doneBtn.addEventListener("click", () => {
      calmMessage.classList.remove("hidden");
      calmMessage.textContent =
        "Well done. You're doing better than you think. These moments always pass.";
    });
  }
}
