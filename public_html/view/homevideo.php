<div class="custom-video__container">
    <video class="custom-video__video" width="100%" height="auto" loop playsinline>
      <source src="<?php echo "../assets/homevideo.mp4";?>"  type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <div class="custom-video__control">▶</div>
</div>
<script> 
window.addEventListener('load',loadVideo,true);
      // Adding functinality to video play and pause button
      const video = document.getElementsByClassName("custom-video__video");
      let i;
      for (i = 0; i < video.length; i++) {
        video[i].addEventListener("click", function () {
          const controls = this.nextElementSibling;
          if (controls.innerHTML === "▶") {
            controls.innerHTML = "| |";
            this.play();
          } else {
            controls.innerHTML = "▶";
            this.pause();
          }
        });
        video[i].addEventListener("mouseout", function () {
          const controls = this.nextElementSibling;
          if (!this.paused) {
            controls.style.display = "none";
          }
        });
        video[i].addEventListener("mouseover", function () {
          const controls = this.nextElementSibling;
          controls.style.display = "flex";
        });
        video[i].addEventListener(
          "ended",
          function () {
            const controls = this.nextElementSibling;
            controls.style.display = "flex";
            controls.innerHTML = "▶";
          },
          false
        );
      }
</script>