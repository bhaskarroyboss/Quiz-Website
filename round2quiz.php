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

// Database connection details
$host = "localhost";
$username = "u984161579_quiz2_results";
$password = "@Pi?U3*0";
$database = "u984161579_quiz2_results";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email is present in the URL parameters
if (isset($_GET['email'])) {
    $email = $conn->real_escape_string($_GET['email']);

    // Check for duplicate entries
    $duplicate_check_query = "SELECT * FROM quiz2_results WHERE email = '$email'";
    $duplicate_check_result = $conn->query($duplicate_check_query);
    $duplicate_check_query2 = "SELECT score FROM quiz2_results WHERE email = '$email'";
    $duplicate_check_result2 = $conn->query($duplicate_check_query2);

    if ($duplicate_check_result->num_rows == 0) {
        // Email already exists, show message
        echo "Not Qualified For Round 2";
        exit;
    }

if ($duplicate_check_result2->num_rows > 0) {
    $row = $duplicate_check_result2->fetch_assoc();
    $score = $row['score'];
    if ($score !== null) {
        echo "Score has been submitted: $score... Duplicated Entries Not Allowed.";
        exit;
        // Show your message here
    }
} 

    // Email does not exist, continue to display the quiz
} else {
    // Email not present in URL, show error message
    echo "Email ID not provided.";
    exit;
}

$questions = array(
    1 => array(
        'question' => "What strange condition causes individuals to involuntarily hiccup for weeks, months, or even years?",
        'options' => array(
            'a' => 'Hyperhidrosis',
            'b' => 'Epistaxis',
            'c' => 'Singultus'
        ),
        'correct_answer' => 'c'
    ),
    2 => array(
        'question' => "Which rare syndrome causes individuals to grow excessive amounts of hair all over their bodies, resembling werewolves?",
        'options' => array(
            'a' => 'Acromegaly',
            'b' => 'Hypertrichosis',
            'c' => 'Porphyria'
        ),
        'correct_answer' => 'b'
    ),
    3 => array(
        'question' => "What odd phenomenon occurs when individuals experience a sudden, involuntary muscle jerk as they are falling asleep?",
        'options' => array(
            'a' => 'Cataplexy',
            'b' => 'Hypnagogic jerk',
            'c' => 'Somnambulism'
        ),
        'correct_answer' => 'b'
    ),
    4 => array(
        'question' => "Which bizarre condition causes individuals to have an insatiable desire to eat non-food items like dirt, chalk, or hair?",
        'options' => array(
            'a' => 'Pica',
            'b' => 'Trichotillomania',
            'c' => 'Dermatillomania'
        ),
        'correct_answer' => 'a'
    ),
    5 => array(
        'question' => "What unusual disorder results in individuals experiencing the sensation of hearing loud noises like explosions or crashes when they yawn or swallow?",
        'options' => array(
            'a' => 'Tinnitus',
            'b' => 'Hyperacusis',
            'c' => 'Exploding Head Syndrome'
        ),
        'correct_answer' => 'c'
    ),
    6 => array(
        'question' => "Which peculiar condition leads individuals to believe that they are already dead, despite evidence to the contrary?",
        'options' => array(
            'a' => 'Cotard\'s syndrome',
            'b' => 'Kleptomaniac syndrome',
            'c' => 'Stockholm syndrome'
        ),
        'correct_answer' => 'a'
    ),
    7 => array(
        'question' => "What bizarre syndrome results in individuals believing that they are able to remember events that never actually occurred?",
        'options' => array(
            'a' => 'False memory syndrome',
            'b' => 'Confabulation',
            'c' => 'Déjà vu'
        ),
        'correct_answer' => 'a'
    ),
    8 => array(
        'question' => "Which strange syndrome causes individuals to experience episodes of sudden, uncontrollable laughter or crying, often in inappropriate situations?",
        'options' => array(
            'a' => 'Tourette syndrome',
            'b' => 'Cataplexy',
            'c' => 'Pseudobulbar affect'
        ),
        'correct_answer' => 'c'
    ),
    9 => array(
        'question' => "What unusual phenomenon occurs when individuals experience a temporary paralysis upon waking up or falling asleep, feeling unable to move or speak?",
        'options' => array(
            'a' => 'Sleep paralysis',
            'b' => 'Night terrors',
            'c' => 'Narcolepsy'
        ),
        'correct_answer' => 'a'
    ),
    10 => array(
        'question' => "Which rare neurological disorder causes individuals to involuntarily blur out inappropriate or offensive remarks, often without awareness or control?",
        'options' => array(
            'a' => 'Tourette syndrome',
            'b' => 'Coprolalia',
            'c' => 'Synesthesia'
        ),
        'correct_answer' => 'a'
    ),
    11 => array(
        'question' => "What unusual condition causes individuals to suddenly fall asleep at inappropriate times, such as during a conversation or while eating?",
        'options' => array(
            'a' => 'Insomnia',
            'b' => 'Narcolepsy',
            'c' => 'Sleep apnea'
        ),
        'correct_answer' => 'b'
    ),
    12 => array(
        'question' => "What rare syndrome results in individuals having an intense fear that they are losing their mind or going insane?",
        'options' => array(
            'a' => 'Agoraphobia',
            'b' => 'Dementophobia',
            'c' => 'Claustrophobia'
        ),
        'correct_answer' => 'b'
    ),
    13 => array(
        'question' => "What bizarre condition causes individuals to feel as though their limbs or body parts do not belong to them, leading to distress or confusion?",
        'options' => array(
            'a' => 'Cotard\'s syndrome',
            'b' => 'Body dysmorphia',
            'c' => 'Alien limb syndrome'
        ),
        'correct_answer' => 'c'
    ),
    14 => array(
        'question' => "Which weird phenomenon occurs when individuals experience a sudden, temporary loss of muscle control triggered by strong emotions like laughter or surprise?",
        'options' => array(
            'a' => 'Cataplexy',
            'b' => 'Syncope',
            'c' => 'Akathisia'
        ),
        'correct_answer' => 'a'
    ),
    15 => array(
        'question' => "What strange disorder causes individuals to believe that they are infested with insects, despite no evidence of such infestation?",
        'options' => array(
            'a' => 'Delusional parasitosis',
            'b' => 'Munchausen syndrome',
            'c' => 'Hypochondria'
        ),
        'correct_answer' => 'a'
    ),
    16 => array(
        'question' => "Which unusual condition causes individuals to experience episodes of temporary blindness upon exposure to emotionally distressing situations?",
        'options' => array(
            'a' => 'Anton-Babinski syndrome',
            'b' => 'Conversion disorder',
            'c' => 'Hemianopsia'
        ),
        'correct_answer' => 'b'
    ),
    17 => array(
        'question' => "What peculiar condition causes individuals to perceive letters, numbers, or sounds as colors, tastes, or sensations?",
        'options' => array(
            'a' => 'Synesthesia',
            'b' => 'Dyslexia',
            'c' => 'Prosopagnosia'
        ),
        'correct_answer' => 'a'
    ),
    18 => array(
        'question' => "Which rare condition results in individuals being unable to perceive more than one object at a time, often appearing as if objects disappear?",
        'options' => array(
            'a' => 'Blindsight',
            'b' => 'Hemispatial neglect',
            'c' => 'Simultanagnosia'
        ),
        'correct_answer' => 'c'
    ),
    19 => array(
        'question' => "What strange syndrome causes individuals to experience a persistent feeling of déjà vu, believing that they have already experienced current events?",
        'options' => array(
            'a' => 'Jamais vu',
            'b' => 'Capgras syndrome',
            'c' => 'Déjà vu'
        ),
        'correct_answer' => 'c'
    ),
    20 => array(
        'question' => "Which odd condition causes individuals to experience episodes of temporary amnesia, forgetting their identity, surroundings, or recent events?",
        'options' => array(
            'a' => 'Retrograde amnesia',
            'b' => 'Anterograde amnesia',
            'c' => 'Transient global amnesia'
        ),
        'correct_answer' => 'c'
    ),
    21 => array(
        'question' => "What unusual disorder causes individuals to have a compulsion to steal objects, even when there is no financial need or personal desire for the items?",
        'options' => array(
            'a' => 'Kleptomania',
            'b' => 'Pyromania',
            'c' => 'Trichotillomania'
        ),
        'correct_answer' => 'a'
    ),
    22 => array(
        'question' => "Which peculiar condition causes individuals to experience persistent and distressing sensations of itching in the absence of any physical cause?",
        'options' => array(
            'a' => 'Pruritus',
            'b' => 'Formication',
            'c' => 'Dysesthesia'
        ),
        'correct_answer' => 'b'
    ),
    23 => array(
        'question' => "What unusual syndrome causes individuals to experience their own thoughts as if they are coming from an external source?",
        'options' => array(
            'a' => 'Schizophrenia',
            'b' => 'Thought insertion',
            'c' => 'Thought echo'
        ),
        'correct_answer' => 'b'
    ),
    24 => array(
        'question' => "Which strange phenomenon occurs when individuals experience vivid and frightening hallucinations upon waking or falling asleep?",
        'options' => array(
            'a' => 'Hypnagogic hallucinations',
            'b' => 'Hypnopompic hallucinations',
            'c' => 'Sleep paralysis'
        ),
        'correct_answer' => 'a'
    ),
    25 => array(
        'question' => "What rare syndrome causes individuals to believe that a close family member or friend has been replaced by an identical imposter?",
        'options' => array(
            'a' => 'Capgras syndrome',
            'b' => 'Fregoli delusion',
            'c' => 'Prosopagnosia'
        ),
        'correct_answer' => 'a'
    ),
    26 => array(
        'question' => "Which unusual condition causes individuals to experience episodes of uncontrollable swearing or the utterance of inappropriate remarks?",
        'options' => array(
            'a' => 'Echolalia',
            'b' => 'Palilalia',
            'c' => 'Coprolalia'
        ),
        'correct_answer' => 'c'
    ),
    27 => array(
        'question' => "What rare disorder results in individuals having an irresistible urge to pull out their own hair, leading to noticeable hair loss?",
        'options' => array(
            'a' => 'Trichotillomania',
            'b' => 'Dermatillomania',
            'c' => 'Onychophagia'
        ),
        'correct_answer' => 'a'
    ),
    28 => array(
        'question' => "Which odd phenomenon causes individuals to experience the sensation of bugs crawling on or under their skin, often associated with substance abuse?",
        'options' => array(
            'a' => 'Formication',
            'b' => 'Pruritus',
            'c' => 'Dysesthesia'
        ),
        'correct_answer' => 'a'
    ),
    29 => array(
        'question' => "What bizarre condition causes individuals to suddenly fall asleep during the day, often in the middle of activities, without warning?",
        'options' => array(
            'a' => 'Narcolepsy',
            'b' => 'Insomnia',
            'c' => 'Sleep apnea'
        ),
        'correct_answer' => 'a'
    ),
    30 => array(
        'question' => "Which rare syndrome causes individuals to have an intense fear that they are losing their mind or going insane?",
        'options' => array(
            'a' => 'Dementophobia',
            'b' => 'Claustrophobia',
            'c' => 'Agoraphobia'
        ),
        'correct_answer' => 'a'
    )
);



// Set the quiz duration in seconds
$quizDuration = 1800; 

if (!isset($_SESSION['currentQuestion'])) {
    $_SESSION['currentQuestion'] = 1;
    $_SESSION['startTime'] = time();
}

// Calculate remaining time
$elapsedTime = time() - $_SESSION['startTime'];
$remainingTime = max(0, $quizDuration - $elapsedTime);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['answer'])) {
        $answer = $_POST['answer'];
        $_SESSION['answers'][$_SESSION['currentQuestion']] = $answer;
    }

    if ($_POST['action'] == 'Next' && $_SESSION['currentQuestion'] < count($questions)) {
        $_SESSION['currentQuestion']++;
    } elseif ($_POST['action'] == 'Previous' && $_SESSION['currentQuestion'] > 1) {
        $_SESSION['currentQuestion']--;
    } elseif ($_POST['action'] == 'SetQuestion' && isset($_POST['questionNumber'])) {
        $_SESSION['answers'][$_SESSION['currentQuestion']] = isset($_POST['answer']) ? $_POST['answer'] : '';
        $_SESSION['currentQuestion'] = $_POST['questionNumber'];
    } elseif ($_POST['action'] == 'Submit') {
        // Quiz completed, process answers
        
echo "<head><link rel='icon' href='icon.png' type='image/icon type'><title>Round2-$userName</title></head>";
echo "<style>
body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
    h1, h2 {
        text-align: center;
    }
    .result {
        background-color: #f9f9f9;
        padding: 10px;
        margin-bottom: 20px;
    }
    .question {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .question p {
        margin: 5px 0;
    }
    .option {
        margin-left: 20px;
    }
    .option input[type='radio'] {
        pointer-events: none;
    }
    .score {
        text-align: right;
    }
    .time {
        text-align: left;
    }
    .bold{
        font-weight: bold;
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
.logo {
  display: flex;
  align-items: center;
}
.userinfo{
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo img {
  max-height: 200px; /* Adjust the height as needed */
  margin: 0 80px; /* Adjust the margin as needed */
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

</style>";
echo "<header>";
echo "<div class='logo'>";
echo "<img src='logo1.png' alt='Logo 1'>";
echo "</div>";
echo "<h1>Quiz Completed!</h1>";
echo "<div class='logo'>";
echo "<img src='logo2.png' alt='Logo 2'>";
echo "</div>";
echo "</header>";
echo "<div class='userinfo'>";
echo "<p>Welcome, $userName</p>";
echo "</div>";

echo "<div class='result'>";
echo "<h2>Answers:</h2>";
$score = 0;
$alphabet = 'a';
foreach ($_SESSION['answers'] as $questionNumber => $answer) {
    $correctAnswer = $questions[$questionNumber]['correct_answer'];
    echo "<div class='question' style='background-color: ";
    if ($answer == $correctAnswer) {
        echo "rgba(0,255,0,0.7)"; // Correct answer
        $score++;
    } else {
        echo "rgba(255,0,0,0.7)"; // Incorrect answer
    }
    echo ";'>";
    echo "<p><strong>Question $questionNumber:</strong> {$questions[$questionNumber]['question']}</p>";
    echo "<form>";
    foreach ($questions[$questionNumber]['options'] as $optionKey => $option) {
    $checked = $answer == $optionKey ? 'checked' : '';
     $disabled = $answer == $optionKey ? '' : 'disabled';
    $boldClass = $answer == $optionKey ? 'bold' : ''; // Add a class for the selected option
    if ($answer == $optionKey) {
        $checked = 'checked';
    }
    echo "<label class='$boldClass'><input type='radio' name='question_$questionNumber' value='$optionKey' $checked $disabled> $option</label><br>";
}
    echo "</form>";
    echo "<p><strong>Your Answer:</strong> {$questions[$questionNumber]['options'][$answer]} ";
    if ($answer == $correctAnswer) {
        echo "(Correct)";
    } else {
        echo "(Incorrect, Correct Answer: {$questions[$questionNumber]['options'][$correctAnswer]})";
    }
    echo "</p></div>";
}
echo "</div>";

$elapsedTime = time() - $_SESSION['startTime'];
$minutes = floor($elapsedTime / 60);
$seconds = $elapsedTime % 60;
echo "<div class='score'><h2>Score: $score</h2></div>";
echo "<div class='time'><h2>Time Taken: $minutes minutes $seconds seconds</h2></div>";

$timeTaken = $elapsedTime; // Convert time taken to milliseconds

$insert_query = "UPDATE quiz2_results SET score=$score, time_taken=$timeTaken WHERE email='$email'";

if ($conn->query($insert_query) === TRUE) {
    echo "<p>Score and time recorded successfully.</p>";
} else {
    echo "<p>Error inserting score and time taken: " . $conn->error . "</p>";
}

echo "<footer>&copy; Made by Bhaskar Roy</footer>";
// Unset session variables
unset($_SESSION['currentQuestion']);
unset($_SESSION['answers']);
unset($_SESSION['startTime']);
session_destroy();
exit; // Stop further execution

    }
}

// Display current question
$currentQuestionNumber = $_SESSION['currentQuestion'];
$currentQuestionData = $questions[$currentQuestionNumber];
$currentQuestion = $currentQuestionData['question'];
$currentOptions = $currentQuestionData['options'];
$answer = isset($_SESSION['answers'][$currentQuestionNumber]) ? $_SESSION['answers'][$currentQuestionNumber] : '';
?>
<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Quiz Page</title>
    <style>
        h1,h2,p{
            margin:0;
            padding:0;
        }
        #abc{
            margin-bottom:20px;
        }
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        .user-info {
            height: 5%;
            background-color: #f1f1f1;
             display: flex;
    justify-content: center;
    align-items: center;
        }
        .content {
            height: 60%;
            display: flex;
            flex-direction: row;
            flex-grow:1;
        }
        .question {
            position:relative;
            font-size: 1em;
            width: 80%;
            background-color: #ddd;
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align to the top */
            align-items: center;
        }
        .question h2 {
            margin: 0 0 10px 0; /* Add spacing below the heading */
            font-size:1.5em;
        }
        .question p {
            margin-bottom: 10px; /* Add space below each option */
            font-size:1.3em;
        }
        .navigator {
            width: 20%;
            background-color: #ccc;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align to the top */
            align-items: flex-start; /* Align to the left */
            padding: 10px;
        }
        .navigator ul {
            list-style-type: none; /* Remove bullets */
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap; /* Wrap items to new line */
            justify-content: flex-start; /* Align to the left */
        }
        .navigator li {
            margin-right: 5px; /* Add space between items */
            margin-bottom: 5px;
        }
        .navigator a {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 20px;
            text-align: center;
            border: 1px solid #999;
            text-decoration: none;
            color: #666;
            transition: background-color 0.3s; /* Add transition effect */
        }
        .navigator a:hover {
            background-color: #66ccff; /* Change background color on hover */
            color: white;
        }
        .navigator a.selected {
            background-color: #66ccff;
            color: white;
        }
        .navigator a.answered {
            background-color: #33cc33; /* Green color for answered questions */
            color: white;
        }
        #timer {
            position:absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background */
            padding: 5px 10px;
            border-radius: 5px;
        }
       @media screen and (max-width: 768px) {
            .question {
                font-size: 1em;
                padding: 10px;
            }
            .navigator a {
                width: 20px;
                height: 20px;
                line-height: 10px;
                font-size: .8em;
            }
            .navigator {
                padding: 5px;
                font-size: .3em;
            }
        }
        header{
  background-color: #042352;
  color: white;
   display: flex;
    justify-content: center;
    align-items: center;
  padding: 10px 0;
  height: 27%;
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
.logo {
  display: flex;
  align-items: center;
}

.logo img {
  max-height: 200px; /* Adjust the height as needed */
  margin: 0 80px; /* Adjust the margin as needed */
}
.buttons-container {
            display: flex;
            justify-content: center;
            gap: 50px;
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
  .buttons-container {
                flex-direction: column;
                gap: 18px;
            }
            button {
                font-size: 14px;
                padding: 8px 16px;
            }
  
}
    </style>
    <link rel="icon" href="icon.png" type="image/icon type">
</head>
<body>
    <header>
  <div class="logo">
    <img src="logo1.png" alt="Logo 1">
  </div>
  <h1>ROUND 2</h1>
  <div class="logo">
    <img src="logo2.png" alt="Logo 2">
  </div>
</header>
    <div class="user-info">
        <p>Welcome, <?php echo $userName; ?></p>
    </div>
    <div class="content">
        <div class="question">
            <div id="timer"><span id="timer"></span></div>
            
            <h2 id="abc">Question <?php echo $currentQuestionNumber; ?></h2>
            
            <form method="POST" id="quizForm">
                <p><?php echo $currentQuestion; ?></p>
                <?php foreach ($currentOptions as $optionKey => $optionValue): ?>
                    <input type="radio" id="<?php echo $optionKey; ?>" name="answer" value="<?php echo $optionKey; ?>" <?php echo ($answer == $optionKey) ? 'checked' : ''; ?>>
                    <label for="<?php echo $optionKey; ?>"><?php echo $optionValue; ?></label><br>
                <?php endforeach; ?>
                <br> <!-- Add space between options and buttons -->
                <div class="buttons-container">
                <input type="submit" name="action" value="Previous" <?php echo ($_SESSION['currentQuestion'] == 1) ? 'disabled' : ''; ?>>
                <input type="submit" name="action" value="Next">
                <input type="submit" name="action" value="Submit">
                </div>
            </form>
        </div>
        <div class="navigator">
            <h2 id="abc">Question Navigator:</h2>
            <ul>
                <?php foreach ($questions as $questionNumber => $questionData): ?>
                    <?php
                    $answeredClass = isset($_SESSION['answers'][$questionNumber]) && $_SESSION['answers'][$questionNumber] != '' ? 'answered' : '';
                    ?>
                    <li><a href="#" onclick="saveAnswer(); setQuestion(<?php echo $questionNumber; ?>); return false;" <?php echo ($_SESSION['currentQuestion'] == $questionNumber) ? 'class="selected ' . $answeredClass . '"' : 'class="' . $answeredClass . '"'; ?>><?php echo $questionNumber; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <form id="setQuestionForm" method="post" style="display: none;">
                <input type="hidden" id="questionNumber" name="questionNumber">
                <input type="hidden" name="action" value="SetQuestion">
                <input type="hidden" id="answer" name="answer">
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; Made by Bhaskar Roy</p>
    </footer>
    <script>
        function saveAnswer() {
            var selectedAnswer = document.querySelector('input[name="answer"]:checked');
            if (selectedAnswer !== null) {
                document.getElementById('answer').value = selectedAnswer.value;
            }
        }

        function setQuestion(questionNumber) {
            document.getElementById('questionNumber').value = questionNumber;
            document.getElementById('setQuestionForm').submit();
        }
        var remainingTime = <?php echo $remainingTime; ?>;
        function updateTimer() {
            var minutes = Math.floor(remainingTime / 60);
            var seconds = remainingTime % 60;
            document.getElementById('timer').innerText = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
            remainingTime--;
            if (remainingTime < 0) {
                clearInterval(timerInterval);
                document.getElementById('timer').innerText = '00:00';
                document.querySelector('input[name="action"][value="Submit"]').click();
            }
        }
        var timerInterval = setInterval(updateTimer, 1000);
    </script>
</body>
</html>
