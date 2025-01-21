<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Tour - Creative Canvas Gallery</title>
  <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    header {
      z-index: 10;
      position: relative;
      background-color: #4CAF50;
      color: white;
      padding: 1em;
      text-align: center;
    }

    header h1 {
      margin: 0;
    }

    #tour-container {
      width: 100%;
      height: calc(100vh - 60px);
      position: relative;
    }
  </style>
</head>
<body>
  <header>
    <h1>Creative Canvas Virtual Tour</h1>
  </header>

  <div id="tour-container">
    <a-scene>
      <a-sky src="gallery-360.jpg" rotation="0 -130 0"></a-sky>
      <a-text value="Explore the Creative Canvas Gallery" position="0 1.5 -3" color="#fff"></a-text>
    </a-scene>
  </div>
</body>
</html>
