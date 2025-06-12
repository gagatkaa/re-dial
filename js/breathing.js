if (window.location.href.includes("page=tool2")) {
  const dial = document.querySelector(".rotary-dial");
  const playBtn = document.getElementById("playBtn");
  const restartBtn = document.getElementById("restartBtn");
  const stopBtn = document.getElementById("stopBtn");
  const message = document.getElementById("breathingMessage");

  if (dial && playBtn && restartBtn && stopBtn && message) {
    let isBreathing = false;
    let currentStep = 0;
    let timeouts = [];
    const angles = [90, 180, 270];

    function clearAllTimeouts() {
      timeouts.forEach(clearTimeout);
      timeouts = [];
    }

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

      timeouts.push(
        setTimeout(() => {
          showMessage("Hold");

          timeouts.push(
            setTimeout(() => {
              dial.style.transition = "transform 4s ease-out";
              dial.style.transform = "rotate(0deg)";
              showMessage("Exhale");

              timeouts.push(
                setTimeout(() => {
                  currentStep++;
                  breatheRotate();
                }, 4000)
              );
            }, 1500)
          );
        }, 2000)
      );
    }

    playBtn.addEventListener("click", () => {
      if (!isBreathing) {
        isBreathing = true;
        breatheRotate();
      }
    });

    restartBtn.addEventListener("click", () => {
      clearAllTimeouts();
      isBreathing = false;
      currentStep = 0;
      dial.style.transition = "transform 0.3s ease-out";
      dial.style.transform = "rotate(0deg)";
      showMessage("Restarting...");

      setTimeout(() => {
        isBreathing = true;
        breatheRotate();
      }, 1000);
    });

    stopBtn.addEventListener("click", () => {
      clearAllTimeouts();
      isBreathing = false;
      dial.style.transition = "transform 0.3s ease-out";
      dial.style.transform = "rotate(0deg)";
      showMessage("");
    });
  } else {
    console.warn("Breathing UI elements not found");
  }
}
