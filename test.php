<?php
// Initialize arrays to store questions and answers
$questionTexts = [];
$questionNumbers = [];
$answers = [];

$repeatedQuestions = false;
$incorrectAnswers = false;

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
        'correct_answer' => 'b'
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


foreach ($questions as $number => $question) {
    // Check for repeated questions
    if (in_array($question['question'], $questionTexts)) {
        $repeatedQuestions = true;
        $questionNumbers[] = $number;
    } else {
        $questionTexts[] = $question['question'];
    }

    // Check for incorrect answers
    if (!array_key_exists($question['correct_answer'], $question['options'])) {
        $incorrectAnswers = true;
        break;
    }
}

if ($repeatedQuestions) {
    echo "The following question numbers are repeated: " . implode(", ", $questionNumbers) . ".";
} else {
    echo "There are no repeated questions.";
}

if ($incorrectAnswers) {
    echo "There are incorrect answers.";
} else {
    echo "All answers are correct.";
}

?>
