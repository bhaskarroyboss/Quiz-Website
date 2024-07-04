<?php
session_start();
// Set timezone to Tbilisi
date_default_timezone_set('Asia/Tbilisi');

// Database details
$db_host = "localhost";
$db_username = "u984161579_users";
$db_password = "O&JV4a1k";
$db_name = "u984161579_users";

// Create connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user email from URL parameter (replace with actual parameter name)
$userEmail = $_GET["email"]; // Example: ?email=john.doe@example.com

// Query to get user's name based on email
$sql = "SELECT Name FROM users WHERE email_ID='$userEmail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User found, fetch the name
    $row = mysqli_fetch_assoc($result);
    $userName = $row["Name"];
} else {
    // User not found
    $userName = "Guest";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/icon type">
    <title>Participant Page</title>
    <style>
        .container {
            display: none; /* Initially hide the container */
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
          height: 20vh;
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
  max-height: 180px; /* Adjust the height as needed */
  margin: 0 80px; /* Adjust the margin as needed */
}
.container {
    display: none; /* Initially hide the container */
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.user-info {
            height: 5vh;
            background-color: #f1f1f1;
             display: flex;
    justify-content: center;
    align-items: center;
        }
        
header {
    background-color: #042352;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px 0;
    height: 20vh;
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

#content {
    height: 67vh;
    position: relative; /* Added to position the countdown */
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    max-height: 180px; /* Adjust the height as needed */
    margin: 0 80px; /* Adjust the margin as needed */
}

#questionContainer {
    position: absolute; /* Added to position the container */
    top: 50%; /* Center vertically */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%); /* Center the container */
    text-align: center;
}

#question {
    font-size: 2.5em; /* Big font size for the question */
    margin-bottom: 20px;
}

.answer {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    font-size: 1.5em; /* Big font size for answers */
    border-radius: 20px;
    cursor: pointer;
    background-color: #4CAF50; /* Green background */
    color: white;
    transition: all 0.3s ease; /* Added animation transition */
}

.answer:hover {
    background-color: #45a049; /* Darker green on hover */
}

#countdown {
    position: absolute; /* Position countdown */
    top: 50px; /* Distance from top */
    right: 200px; /* Distance from right */
    font-size: 1.5em; /* Big font size for countdown */
    color: red; /* Color for countdown */
    font-weight: bold; /* Added font weight */
    display: none;
}
#hehehe{
    position: absolute; /* Added to position the container */
    top: 50%; /* Center vertically */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%); /* Center the container */
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 20px;
}
#end{
    position: absolute; /* Added to position the container */
    top: 50%; /* Center vertically */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%); /* Center the container */
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 20px;
}
@media screen and (max-width: 768px) {
  #content {height:60.3vh;}
  .logo img {
    max-height: 150px;
    margin: 0;
  }
  #question{
      font-size:1.2em;
  }
  h1 {
    display: none;
  }
}

    </style>
</head>
<body>
    <header>
      <div class="logo">
        <img src="logo1.png" alt="Logo 1">
      </div>
      <h1>Round 3</h1>
      <div class="logo">
        <img src="logo2.png" alt="Logo 2">
      </div>
    </header>
    <div class="user-info">
        <p>Welcome, <?php echo $userName; ?></p>
    </div>
    <div id="content">
        <div id="hehehe">Wait for QuizMaster...</div>
        <div id="end"></div>
    <div class="container" id="questionContainer">
        <div id="question">Question:</div>
        <div>
            <div class="answer" onclick="submitAnswer(true)">True</div>
            <div class="answer" onclick="submitAnswer(false)">False</div>
        </div>
    </div>
    <div id="countdown">Timer: </div>
    </div>
    <footer>&copy Made by Bhaskar Roy</footer>
    <script>
        var oldValue = -1; // Initialize oldValue with a value that will not match any index of the array
        var questions = [
    "Can you catch a sexually transmitted infection (STI) from a toilet seat?",
    "Does eating chocolate cause acne?",
    "Is fasting for a few days a good way to detox your body?",
    "Can going outside with wet hair make you sick?",
    "Should you put butter on burns?",
    "Should you tilt your head back to stop a nosebleed?",
    "Will eating ice cream when you have a sore throat make it worse?",
    "Can a pregnant woman's body repair its own heart?",
    "Will reading too much damage your eyesight?",
    "Can the placebo effect produce real physiological changes?",
    "Can you be allergic to water?",
    "Should everyone drink eight glasses of water a day?",
    "Can hair turn gray overnight due to stress?",
    "Are vaccines only for children?",
    "Can the human body produce its own alcohol?",
    "Should you not swim after eating?",
    "Can you sweat out toxins?",
    "Can wearing a hat cause baldness?",
    "Can you get drunk by absorbing alcohol through your skin?",
    "Are hand dryers more sanitary than paper towels?",
    "Can you catch a cold from venturing into cold weather?",
    "Can you live with only half a brain?",
    "Should you drink milk to build strong bones?",
    "Are babies born without kneecaps?",
    "Can you cure hiccups by holding your breath?",
    "Can a hot toddy cure a cold?",
    "Is all stress bad for you?",
    "Can a person have two different sets of DNA?",
    "Can you catch HIV from kissing?",
    "Can you be 'lactose intolerant' only temporarily?"
];
        var answers = [
    false, // Can you catch a sexually transmitted infection (STI) from a toilet seat?
    false, // Does eating chocolate cause acne?
    false, // Is fasting for a few days a good way to detox your body?
    false, // Can going outside with wet hair make you sick?
    false, // Should you put butter on burns?
    false, // Should you tilt your head back to stop a nosebleed?
    false, // Will eating ice cream when you have a sore throat make it worse?
    true,  // Can a pregnant woman's body repair its own heart?
    false, // Will reading too much damage your eyesight?
    true,  // Can the placebo effect produce real physiological changes?
    true,  // Can you be allergic to water?
    false, // Should everyone drink eight glasses of water a day?
    true,  // Can hair turn gray overnight due to stress?
    false, // Are vaccines only for children?
    true,  // Can the human body produce its own alcohol?
    false, // Should you not swim after eating?
    false, // Can you sweat out toxins?
    false, // Can wearing a hat cause baldness?
    true,  // Can you get drunk by absorbing alcohol through your skin?
    false, // Are hand dryers more sanitary than paper towels?
    false, // Can you catch a cold from venturing into cold weather?
    true,  // Can you live with only half a brain?
    true,  // Should you drink milk to build strong bones?
    true,  // Are babies born without kneecaps?
    true,  // Can you cure hiccups by holding your breath?
    false, // Can a hot toddy cure a cold?
    false, // Is all stress bad for you?
    true,  // Can a person have two different sets of DNA?
    false, // Can you catch HIV from kissing?
    true   // Can you be 'lactose intolerant' only temporarily?
];

        var answeredArray = []; // Array to store answered questions
        var countdownInterval;
        var submitcount=0;
        var questionStartTime; // Variable to store the start time of each question
        var questionEndTime; // Variable to store the end time of each question
        var totalQuizTime = 0; // Variable to store the total time taken for the quiz

        function updateQuestion(value) {
            var questionIndex = parseInt(value);
            if (questionIndex !== oldValue) {
                if (questionIndex >= 0 && questionIndex < questions.length) {
                    questionStartTime = Date.now();
                    document.getElementById("hehehe").style.display = "none";
                    document.getElementById("question").innerText = "Q"+(questionIndex+1) +"."+" "+ questions[questionIndex];
                    document.getElementById("questionContainer").style.display = "block"; // Show the container
                    startCountdown();
                    oldValue = questionIndex; // Update oldValue after showing the new question
                }
                if(questionIndex >= questions.length && submitcount === 0){
                    sendScore();
                    submitcount = 1;
                    
                }
            }
        }

        function startCountdown() {
            document.getElementById("countdown").style.display = "block";
            var countdownElement = document.getElementById("countdown");
            var countdownValue = 40; // 5 seconds countdown
            countdownElement.innerText = "Timer: " + countdownValue;
            clearInterval(countdownInterval);
            countdownInterval = setInterval(function() {
                countdownValue--;
                countdownElement.innerText = "Timer: " + countdownValue;
                if (countdownValue === 0) {
                    clearInterval(countdownInterval);
                    submitAnswer(null);
                    document.getElementById("countdown").style.display = "none";
                    document.getElementById("hehehe").style.display = "block";
                    document.getElementById("questionContainer").style.display = "none";
                }
            }, 1000);
        }
        
        function startCountdown2() {
            document.getElementById("end").style.display = "block";
            var countdownElement = document.getElementById("end");
            var countdownValue = 10; // 5 seconds countdown
            countdownElement.innerText = "RoundEnded.. Redirecting to Leaderboard in " + countdownValue+ "seconds...";
            clearInterval(countdownInterval);
            countdownInterval = setInterval(function() {
                countdownValue--;
                countdownElement.innerText = "RoundEnded.. Redirecting to Leaderboard in " + countdownValue+ "seconds...";
                if (countdownValue === 0) {
                    window.location.href = "https://quiz.seu-literaryclub.online/leaderboard3.php";
                }
            }, 1000);
        }

        function getValue() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        updateQuestion(xhr.responseText);
                    }
                }
            };
            xhr.open("GET", "get_value.php", true);
            xhr.send();
        }

        function submitAnswer(answer) {
            questionEndTime = Date.now(); // Record the end time of the question
             // Add the time taken for this question to the total time

            if (answeredArray[oldValue] === undefined) {
                if (answer != null) { // Check if the question has been answered
                    var timeTaken = (questionEndTime - questionStartTime) / 1000;
                    totalQuizTime += timeTaken;
                    answeredArray[oldValue] = answer; // Store answer corresponding to the index of the question
                    console.log("Answered Array:", answeredArray);
                    document.getElementById("questionContainer").style.display = "none";
                    document.getElementById("hehehe").style.display = "block";
                } else {
                    answeredArray[oldValue] = null;
                    var timeTaken = (questionEndTime - questionStartTime) / 1000;
                    totalQuizTime += timeTaken;
                    
                } 
                    
            } else {
                console.log("You have already answered this question."); // Inform the user that the question has already been answered
            }
            if (oldValue === 29) { // Check if it's the last question
                        clearInterval(countdownInterval); // Stop the countdown
                        document.getElementById("questionContainer").style.display = "none"; // Hide the container after the last question
                        sendScore(); // Call the scoring function if it's the last question
                        submitcount++;
                    }
        }

        function scoreQuiz() {
            var correctAnswers = 0;
            for (var i = 0; i < answeredArray.length; i++) {
                if (answeredArray[i] === answers[i]) {
                    correctAnswers++;
                }
            }
            console.log("Number of correct answers:", correctAnswers);
            return correctAnswers;
        }

function sendScore() {
    document.getElementById("questionContainer").style.display = "none";
    document.getElementById("hehehe").style.display = "none";
    document.getElementById("countdown").style.display = "none";
    document.getElementById("end").style.display = "block";
    var name = "<?php echo $userName; ?>";
    var score = scoreQuiz(); // Implement your score calculation logic here
    var time = totalQuizTime;
    var data = {
        name: name,
        score: score,
        time: time
    };

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log("Score saved successfully.");
            } else {
                console.error("Failed to save score.");
            }
        }
    };
    xhr.open("POST", "r3db.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify(data));
    startCountdown2();
}


        // Poll for new value every second
        setInterval(getValue, 1000);
    </script>
</body>
</html>
