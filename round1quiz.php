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
$username = "u984161579_quiz_results";
$password = "5@fWzBnK3G|M";
$database = "u984161579_quiz_results";

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
    $duplicate_check_query = "SELECT * FROM quiz_results WHERE email = '$email'";
    $duplicate_check_result = $conn->query($duplicate_check_query);

    if ($duplicate_check_result->num_rows > 0) {
        // Email already exists, show message
        echo "Duplicate entries are not allowed.";
        exit;
    }

    // Email does not exist, continue to display the quiz
} else {
    // Email not present in URL, show error message
    echo "Email ID not provided.";
    exit;
}

$questions = array(
    1 => array(
        'question' => "What is the process by which mRNA is synthesized from a DNA template called?",
        'options' => array(
            'a' => 'Translation',
            'b' => 'Transcription',
            'c' => 'Replication',
            'd' => 'Splicing'
        ),
        'correct_answer' => 'b'
    ),
    2 => array(
        'question' => "Which enzyme catalyzes the conversion of glucose to glucose-6-phosphate during glycolysis?",
        'options' => array(
            'a' => 'Hexokinase',
            'b' => 'Phosphofructokinase-1',
            'c' => 'Pyruvate kinase',
            'd' => 'Glucose-6-phosphatase'
        ),
        'correct_answer' => 'a'
    ),
    3 => array(
        'question' => "During which phase of the menstrual cycle does ovulation typically occur?",
        'options' => array(
            'a' => 'Menstrual phase',
            'b' => 'Follicular phase',
            'c' => 'Luteal phase',
            'd' => 'Proliferative phase'
        ),
        'correct_answer' => 'b'
    ),
    4 => array(
        'question' => "Which hormone is responsible for stimulating the production of red blood cells in the bone marrow?",
        'options' => array(
            'a' => 'Insulin',
            'b' => 'Thyroid hormone',
            'c' => 'Erythropoietin',
            'd' => 'Cortisol'
        ),
        'correct_answer' => 'c'
    ),
    5 => array(
        'question' => "What is the name of the process by which an enzyme's activity is inhibited by the product of a reaction it catalyzes?",
        'options' => array(
            'a' => 'Allosteric regulation',
            'b' => 'Competitive inhibition',
            'c' => 'Feedback inhibition',
            'd' => 'Non-competitive inhibition'
        ),
        'correct_answer' => 'c'
    ),
    6 => array(
        'question' => "Which amino acid is exclusively ketogenic?",
        'options' => array(
            'a' => 'Leucine',
            'b' => 'Lysine',
            'c' => 'Tryptophan',
            'd' => 'Histidine'
        ),
        'correct_answer' => 'a'
    ),
    7 => array(
        'question' => "What is the primary function of the Golgi apparatus in cells?",
        'options' => array(
            'a' => 'Protein synthesis',
            'b' => 'Lipid synthesis',
            'c' => 'Intracellular transport',
            'd' => 'Post-translational modification'
        ),
        'correct_answer' => 'd'
    ),
    8 => array(
        'question' => "Which hormone is primarily responsible for regulating blood calcium levels?",
        'options' => array(
            'a' => 'Insulin',
            'b' => 'Parathyroid hormone (PTH)',
            'c' => 'Calcitonin',
            'd' => 'Glucagon'
        ),
        'correct_answer' => 'b'
    ),
    9 => array(
        'question' => "Which neurotransmitter is primarily responsible for muscle contraction at the neuromuscular junction?",
        'options' => array(
            'a' => 'Dopamine',
            'b' => 'Acetylcholine',
            'c' => 'Serotonin',
            'd' => 'GABA'
        ),
        'correct_answer' => 'b'
    ),
    10 => array(
        'question' => "What is the main function of surfactant in the lungs?",
        'options' => array(
            'a' => 'Regulation of blood pH',
            'b' => 'Protection against pathogens',
            'c' => 'Facilitation of gas exchange',
            'd' => 'Regulation of blood pressure'
        ),
        'correct_answer' => 'c'
    ),
    11 => array(
        'question' => "Which of the following is NOT a function of carbohydrates in the body?",
        'options' => array(
            'a' => 'Energy storage',
            'b' => 'Cell membrane structure',
            'c' => 'Source of dietary fiber',
            'd' => 'Signaling molecules'
        ),
        'correct_answer' => 'b'
    ),
    12 => array(
        'question' => "During which phase of the cardiac cycle does ventricular systole occur?",
        'options' => array(
            'a' => 'Isovolumetric contraction',
            'b' => 'Rapid ejection',
            'c' => 'Isovolumetric relaxation',
            'd' => 'Ventricular filling'
        ),
        'correct_answer' => 'b'
    ),
    13 => array(
        'question' => "Which structure in the eye is responsible for focusing light onto the retina?",
        'options' => array(
            'a' => 'Cornea',
            'b' => 'Lens',
            'c' => 'Iris',
            'd' => 'Retina'
        ),
        'correct_answer' => 'b'
    ),
    14 => array(
        'question' => "What is the primary function of the vestibular system?",
        'options' => array(
            'a' => 'Regulation of balance and spatial orientation',
            'b' => 'Regulation of body temperature',
            'c' => 'Regulation of blood pressure',
            'd' => 'Regulation of sleep-wake cycles'
        ),
        'correct_answer' => 'a'
    ),
    15 => array(
        'question' => "Which enzyme is responsible for catalyzing the rate-limiting step of the citric acid cycle?",
        'options' => array(
            'a' => 'Citrate synthase',
            'b' => 'Isocitrate dehydrogenase',
            'c' => 'α-Ketoglutarate dehydrogenase',
            'd' => 'Succinyl-CoA synthetase'
        ),
        'correct_answer' => 'b'
    ),
    16 => array(
        'question' => "Which hormone is responsible for stimulating milk production in the mammary glands?",
        'options' => array(
            'a' => 'Estrogen',
            'b' => 'Progesterone',
            'c' => 'Prolactin',
            'd' => 'Oxytocin'
        ),
        'correct_answer' => 'c'
    ),
    17 => array(
        'question' => "Which of the following vitamins is fat-soluble?",
        'options' => array(
            'a' => 'Vitamin C',
            'b' => 'Vitamin B12',
            'c' => 'Vitamin K',
            'd' => 'Vitamin B6'
        ),
        'correct_answer' => 'c'
    ),
    18 => array(
        'question' => "Which type of muscle tissue is striated and under voluntary control?",
        'options' => array(
            'a' => 'Smooth muscle',
            'b' => 'Skeletal muscle',
            'c' => 'Cardiac muscle',
            'd' => 'Both smooth and cardiac muscle'
        ),
        'correct_answer' => 'b'
    ),
    19 => array(
        'question' => "What is the function of aldosterone in the body?",
        'options' => array(
            'a' => 'Regulation of blood pressure',
            'b' => 'Regulation of blood glucose levels',
            'c' => 'Regulation of blood calcium levels',
            'd' => 'Regulation of body temperature'
        ),
        'correct_answer' => 'a'
    ),
    20 => array(
        'question' => "Which molecule serves as the primary energy currency of the cell?",
        'options' => array(
            'a' => 'Adenosine triphosphate (ATP)',
            'b' => 'Adenosine monophosphate (AMP)',
            'c' => 'Guanosine triphosphate (GTP)',
            'd' => 'Cyclic adenosine monophosphate (cAMP)'
        ),
        'correct_answer' => 'a'
    ),
    21 => array(
        'question' => "Which of the following is NOT a component of a nucleotide?",
        'options' => array(
            'a' => 'Sugar',
            'b' => 'Phosphate group',
            'c' => 'Nitrogenous base',
            'd' => 'Fatty acid'
        ),
        'correct_answer' => 'd'
    ),
    22 => array(
        'question' => "Which of the following is NOT a function of proteins in the body?",
        'options' => array(
            'a' => 'Enzymatic catalysis',
            'b' => 'Hormone synthesis',
            'c' => 'Energy storage',
            'd' => 'Cell structure and support'
        ),
        'correct_answer' => 'c'
    ),
    23 => array(
        'question' => "Which part of the brain is responsible for regulating sleep-wake cycles and circadian rhythms?",
        'options' => array(
            'a' => 'Hypothalamus',
            'b' => 'Cerebellum',
            'c' => 'Medulla oblongata',
            'd' => 'Pineal gland'
        ),
        'correct_answer' => 'd'
    ),
    24 => array(
        'question' => "Which of the following molecules serves as a precursor for the synthesis of steroid hormones?",
        'options' => array(
            'a' => 'Cholesterol',
            'b' => 'Phospholipids',
            'c' => 'Triglycerides',
            'd' => 'Glycogen'
        ),
        'correct_answer' => 'a'
    ),
    25 => array(
        'question' => "What is the primary function of the lymphatic system?",
        'options' => array(
            'a' => 'Regulation of blood pressure',
            'b' => 'Regulation of body temperature',
            'c' => 'Immune defense',
            'd' => 'Hormone secretion'
        ),
        'correct_answer' => 'c'
    ),
    26 => array(
        'question' => "Which type of bond is responsible for maintaining the secondary structure of proteins?",
        'options' => array(
            'a' => 'Peptide bond',
            'b' => 'Hydrogen bond',
            'c' => 'Disulfide bond',
            'd' => 'Ionic bond'
        ),
        'correct_answer' => 'b'
    ),
    27 => array(
        'question' => "Which of the following is a characteristic feature of Kawasaki disease?",
        'options' => array(
            'a' => 'Strawberry tongue',
            'b' => 'Koplik spots',
            'c' => 'Sandpaper rash',
            'd' => 'Bulls-eye rash'
        ),
        'correct_answer' => 'a'
    ),
    28 => array(
        'question' => "What is the name of the process by which a protein loses its tertiary and quaternary structure due to external stressors?",
        'options' => array(
            'a' => 'Denaturation',
            'b' => 'Hydrolysis',
            'c' => 'Oxidation',
            'd' => 'Isomerization'
        ),
        'correct_answer' => 'a'
    ),
    29 => array(
        'question' => "Which of the following is NOT a function of lipids in the body?",
        'options' => array(
            'a' => 'Energy storage',
            'b' => 'Cell membrane structure',
            'c' => 'Enzyme catalysis',
            'd' => 'Hormone synthesis'
        ),
        'correct_answer' => 'c'
    ),
    30 => array(
        'question' => "Which vitamin is essential for the synthesis of collagen?",
        'options' => array(
            'a' => 'Vitamin A',
            'b' => 'Vitamin B12',
            'c' => 'Vitamin C',
            'd' => 'Vitamin D'
        ),
        'correct_answer' => 'c'
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
    }elseif ($_POST['action'] == 'Submit') {
        // Quiz completed, process answers
        
        echo "<style>
        body{
            margin:0;
            padding:0;
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
    $disabled = 'disabled';
    $boldClass = $answer == $optionKey ? 'bold' : ''; // Add a class for the selected option
    if ($answer == $optionKey) {
        $checked = 'checked';
        $disabled = 'disabled';
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

$insert_query = "INSERT INTO quiz_results (email, score, time_taken) VALUES ('$email', $score, $timeTaken)";
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
  max-height: 240px; /* Adjust the height as needed */
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
    </style>
</head>
<body>
    <header>
  <div class="logo">
    <img src="logo1.png" alt="Logo 1">
  </div>
  <h1>ROUND 1</h1>
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
                <input type="submit" name="action" value="Previous" <?php echo ($_SESSION['currentQuestion'] == 1) ? 'disabled' : ''; ?>>
                <input type="submit" name="action" value="Next">
                <input type="submit" name="action" value="Submit">
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
        <p>&copy Made by Bhaskar Roy</p>
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
