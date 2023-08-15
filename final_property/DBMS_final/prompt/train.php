<?php

// Set up OpenAI API credentials
$api_key = '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';

// Fetch comments from the database
$connect = new PDO('mysql:host=localhost;dbname=dbms_final', 'root', '');
$post_id = $_GET["post_id"];
$query = "
SELECT * FROM course_comment as com
JOIN `member` as m ON m.mId=com.comment_sender_name
WHERE parent_comment_id = '0' AND `post_id` =$post_id
ORDER BY comment_id DESC
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

// Collect comments in an array
$comments = array();
foreach ($result as $row) {
    $comments[] = $row["comment"];
}

// Concatenate comments into a single string
$input_text = implode("\n", $comments);

// Concatenate comments into a single string
$input_text = implode("\n", $comments);

// API request
$data = array(
    'prompt' => $input_text,
    'max_tokens' => 30,
    'temperature' => 0.1,
    'n' => 1,
    'stop' => null,
    'temperature' => 0.18,
    'top_p' => 0.3,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.7
);
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\nAuthorization: Bearer $api_key\r\n",
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents('https://api.openai.com/v1/engines/davinci/completions', false, $context);
$response = json_decode($result, true);

// Extract the generated short note from the response
$short_note = $response['choices'][0]['text'];

// Print the short note
// echo $short_note;

?>
<h3><?=$short_note?></h3>
