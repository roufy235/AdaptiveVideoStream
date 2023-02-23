<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/4.3.4/controls.min.css" integrity="sha512-6CAOpe+kF1fCTzRcZlS1iak5PY3M5lT+Ato5R3GJ0GXtoRTY6UOyGUNNG1va+mws+XDs1w3a6+iXQtw6n/Ef+w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--    <script src="https://cdn.jsdelivr.net/npm/shaka-player@4.3.4/dist/shaka-player.compiled.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/4.3.4/shaka-player.ui.min.js" integrity="sha512-H1Uh+j2O2keuNSLx8kh9CMSmbWJ6F+D21Rl/0t3Iw1qrzQRnRDCQ+HIF8uzNEmwHYnh6TVXV3W/sYr6BlD8qXg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--    <script defer src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js"></script>-->
    <script src="myapp.js"></script>
</head>
<body>
<!-- The data-shaka-player-container tag will make the UI library place the controls in this div.
         The data-shaka-player-cast-receiver-id tag allows you to provide a Cast Application ID that
           the cast button will cast to; the value provided here is the sample cast receiver. -->
<div data-shaka-player-container style="max-width:60em" data-shaka-player-cast-receiver-id="8D8C71A7d">
    <!-- The data-shaka-player tag will make the UI library use this video element.
         If no video is provided, the UI will automatically make one inside the container div. -->
    <video autoplay data-shaka-player id="video" style="width:100%;height:100%"></video>
</body>
</html>
