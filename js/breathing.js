const dial = document.querySelector(".rotary-dial");
const playBtn = document.getElementById("playBtn");
const pauseBtn = document.getElementById("pauseBtn");
const stopBtn = document.getElementById("stopBtn");
const message = document.getElementById("breathingMessage");

let isBreathing = false;
let currentStep = 0;
const angles = [90, 180, 270];

function showMessage(text) {
  message.textContent = text;
  message.style.opacity = 1;
}

function breatheRotate() {
  if (!isBreathing) return;

  const angle = angles[currentStep % angles.length];
  dial.style.transition = "transform 2s ease-in-out";
  dial.style.transform = `rotate(${angle}deg)`;
  showMessage("Inhale");

  // Inhale → Hold
  setTimeout(() => {
    showMessage("Hold");

    // Start exhale (back to 0)
    setTimeout(() => {
      dial.style.transition = "transform 4s ease-out";
      dial.style.transform = `rotate(0deg)`;
      showMessage("Exhale");

      // After exhale complete → next cycle
      setTimeout(() => {
        currentStep++;
        breatheRotate();
      }, 4000); // match exhale duration
    }, 1500); // Hold duration
  }, 2000); // Inhale duration
}

playBtn.addEventListener("click", () => {
  if (!isBreathing) {
    isBreathing = true;
    breatheRotate();
  }
});

pauseBtn.addEventListener("click", () => {
  isBreathing = false;
});

stopBtn.addEventListener("click", () => {
  isBreathing = false;
  dial.style.transition = "transform 1s ease-out";
  dial.style.transform = "rotate(0deg)";
  showMessage("");
});
