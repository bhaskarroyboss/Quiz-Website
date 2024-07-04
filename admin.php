<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            margin-top: 50px;
            color: #fff;
            font-size:2em;
        }

        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 1em;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
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
            height:63.9vh;
        }
.logo {
  display: flex;
  align-items: center;
}

.logo img {
  max-height: 200px; /* Adjust the height as needed */
  margin: 0 80px; /* Adjust the margin as needed */
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
    <h2>Admin Page</h2>
    <button id="incrementBtn">Next Question</button>
    <button id="resetBtn">Reset Quiz</button>
    </div>
    <script>
        document.getElementById("incrementBtn").addEventListener("click", function() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "update_value.php?newValue=1", true);
            xhr.send();
        });

        document.getElementById("resetBtn").addEventListener("click", function() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "update_value.php?newValue=0", true);
            xhr.send();
        });
    </script>
</body>
</html>
