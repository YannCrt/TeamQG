<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom Video Player</title>
  <!-- Video.js CSS -->
  <link href="../style/homevideo.css" rel="stylesheet" />
</head>

<div class="custom-video__container"> 
  <video id="my-video" class="video-js" controls preload="auto" width="640" height="264" data-setup="{}">
    <source src="../assets/homevideo.mp4" type="video/mp4">
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>
</div>

<!-- Video.js JavaScript -->
<script src="https://vjs.zencdn.net/7.11.4/video.js"></script>

</html>