
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Diagnosis Dilemma- Aud_Easy</title>
    
<link rel="icon" href="icon.png" type="image/icon type">
    <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}
header {
  background-color: #042352;
  height:18.3vh;
  color: white;
  display: flex;
  justify-content: center; /* Distribute items evenly along the main axis */
  align-items: center; /* Add padding to create space around the content */
}

.logo img {
  max-height: 18.3vh;
  margin:0 40px;
}

h1 {
  margin: 0;
  font-size:50px;
}

footer {
  background-color:#020f24;
  height: 3vh;
  color: white;
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 10px 0;
}
#content {
  height: 76vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
@media screen and (max-width: 768px) {
    #content {
        height:70vh;
}
  .logo img {
    max-height: 150px;
    margin: 0;
  }
  h1 {
    display: none;
  }
  iframe{
      padding:0;
  }
}
    </style>
</head>
<body>
    <header>
  <div class="logo">
    <img src="logo1.png" alt="Logo 1">
  </div>
  <h1>SEU QUIZ-A-TOMY 2024</h1>
  <div class="logo">
    <img src="logo2.png" alt="Logo 2">
  </div>
</header>
    <div id="content">
        <iframe src="game4/index.html" frameborder="0" style="width: 100%; height: 100%;" allowfullscreen></iframe>
    </div>
    
    <footer>
        © Made by Bhaskar Roy
        </footer>
</body>
</html>
