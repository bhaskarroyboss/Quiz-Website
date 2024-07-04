<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SEU QUIZ-A-TOMY 2024</title>
<link rel="icon" href="icon.png" type="image/icon type">
<style>
body{
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Set the body to be at least the height of the viewport */
}
header{
  background-color: #042352;
  color: white;
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 10px 0;
  height: 25vh;
}
footer {
  background-color: #020f24;
  height: 3vh;
  color: white;
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 10px 0;
}
#content{
    height:64.6vh;
    flex-grow:1;
}
.round {
  background-color: rgba(192,213,227,0.25);
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 20px;
  margin: 20px auto;
  width: 80%;
  height: 40%;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}
.round:hover {
  background-color: rgba(192,213,227,0.5);
}
.subround {
  margin: 20px auto; /* Added margin for space between a and b */
  width: 85%;
  height: 40%;
  display: flex;
  justify-content: space-evenly;
}

.subround div {
  box-sizing: border-box;
  display: flex;
  justify-content: center; /* Center horizontally */
  align-items: center; /* Center vertically */
}

.subround .a{
  width: 48%;
  height: 100%;
  background-color: rgba(192,213,227,0.25);
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.subround .b {
  width: 48%;
  height: 100%;
  display: flex;
  flex-direction: column; /* Stack c and d vertically */
  justify-content: space-between; /* Add space between c and d */
}

.subround .c,
.subround .d {
  width: 100%;
  height: 47%;
  background-color: rgba(192,213,227,0.25);
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}
.a:hover {
  background-color: rgba(192,213,227,0.5);
}
.c:hover {
  background-color: rgba(192,213,227,0.5);
}
.d:hover {
  background-color: rgba(192,213,227,0.5);
}
.logo {
  display: flex;
  align-items: center;
}

.logo img {
  max-height: 200px; /* Adjust the height as needed */
  margin: 0 80px; /* Adjust the margin as needed */
}
h1{
    font-size:45px;
}
@media screen and (max-width: 768px) {
  #content {}
  .logo img {
    max-height: 150px;
    margin: 0;
  }
  h1 {
    display: none;
  }
}
#background-video {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  z-index: -1; 
}
h3{
    font-size:1.2em;
}
h2{
    font-weight:bold;
    font-size:2em;
}
</style>
</head>
<body>
    <video id="background-video" autoplay loop muted>
  <source src="v1.mp4" type="video/mp4">
</video>
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
    <div class="round" onclick="redirectToRound1()">
      <h2>Enter Quiz Lobby</h>
    </div>
    <div class="subround">
      <div class="a" onclick="redirectToResults()"> <h3>Results</h3></div>
      <div class="b">
        <div class="c" onclick="redirectToPhotos()"><h3>Photos</h3></div>
        <div class="d" onclick="redirectToAudience()"><h3>Audience</h3></div>
      </div>
    </div>
</div>

<footer>&copy Made by Bhaskar Roy</footer>
<script>
function redirectToRound1() {
  window.location.href = "https://quiz.seu-literaryclub.online/round1.php";
}
function redirectToResults() {
  window.location.href = "https://quiz.seu-literaryclub.online/results.php";
}
function redirectToPhotos() {
  window.location.href = "https://1drv.ms/f/s!AiZFQLx6l1yWrkpyZtKNdjYAf6Ds?e=gJ7rHX";
}
function redirectToAudience() {
  window.location.href = "https://quiz.seu-literaryclub.online/Audience.php";
}
</script>
</body>
</html>
