function startMicVisualizer() {
  const canvas = document.getElementById("micBars");
  const ctx = canvas.getContext("2d");

  navigator.mediaDevices
    .getUserMedia({ audio: true })
    .then((stream) => {
      const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
      const source = audioCtx.createMediaStreamSource(stream);
      const analyser = audioCtx.createAnalyser();
      analyser.fftSize = 256;
      const dataArray = new Uint8Array(analyser.fftSize);

      source.connect(analyser);

      if (!CanvasRenderingContext2D.prototype.roundRect) {
        CanvasRenderingContext2D.prototype.roundRect = function (
          x,
          y,
          width,
          height,
          radius
        ) {
          this.beginPath();
          this.moveTo(x + radius, y);
          this.lineTo(x + width - radius, y);
          this.quadraticCurveTo(x + width, y, x + width, y + radius);
          this.lineTo(x + width, y + height - radius);
          this.quadraticCurveTo(
            x + width,
            y + height,
            x + width - radius,
            y + height
          );
          this.lineTo(x + radius, y + height);
          this.quadraticCurveTo(x, y + height, x, y + height - radius);
          this.lineTo(x, y + radius);
          this.quadraticCurveTo(x, y, x + radius, y);
          this.closePath();
        };
      }

      function draw() {
        requestAnimationFrame(draw);
        analyser.getByteTimeDomainData(dataArray);

        let sum = 0;
        for (let i = 0; i < dataArray.length; i++) {
          const val = (dataArray[i] - 128) / 128;
          sum += val * val;
        }
        const volume = Math.sqrt(sum / dataArray.length);

        ctx.clearRect(0, 0, canvas.width, canvas.height);

        const barCount = 20;
        const spacing = 5;
        const barWidth = (canvas.width - spacing * (barCount - 1)) / barCount;

        for (let i = 0; i < barCount; i++) {
          const fluctuation = Math.sin(i + performance.now() / 200) * 0.5 + 0.5;
          const height = 20 + volume * 150 * fluctuation;
          const x = i * (barWidth + spacing);
          const y = canvas.height / 2 - height / 2;

          ctx.beginPath();
          ctx.roundRect(x, y, barWidth, height, 5);
          ctx.fillStyle = "#bfa34e";
          ctx.fill();
        }
      }

      draw();
    })
    .catch((err) => {
      alert("Microphone access is required to run this visualizer.");
      console.error(err);
    });
}

const openMicBtn = document.getElementById("openMicPopup");
const micPopup = document.getElementById("micPopup");
const closeMicBtn = document.getElementById("closeMicPopup");

if (openMicBtn && micPopup && closeMicBtn) {
  openMicBtn.addEventListener("click", () => {
    micPopup.classList.remove("hidden");
    startMicVisualizer(); // init visualizer only when popup is opened
  });

  closeMicBtn.addEventListener("click", () => {
    micPopup.classList.add("hidden");

    // Add humorous message once
    const tooltip = document.querySelector(".idea__action");
    if (tooltip && !tooltip.dataset.updated) {
      const followUp = document.createElement("p");
      followUp.textContent =
        "See? That wasn’t so bad. You should talk to yourself more often.";
      followUp.style.fontStyle = "italic";
      followUp.style.lineHeight = "1.5rem";
      followUp.style.color = "#0b6682";
      tooltip.appendChild(followUp);
      tooltip.dataset.updated = "true"; // prevent duplicate insertions
    }
  });
}
init();
