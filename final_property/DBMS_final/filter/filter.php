<?php
function filterCommentsByConnection($comments, $targetBook, $targetAuthor, $targetCategory, $targetLanguage, $targetRating) {
    // Filter out comments that don't meet any of the specified conditions
    $filteredComments = array();

    foreach ($comments as $comment) {
        // Check if the comment meets any of the conditions
        if (
            strpos($comment, $targetBook) !== false ||
            strpos($comment, $targetAuthor) !== false ||
            strpos($comment, $targetCategory) !== false ||
            strpos($comment, $targetLanguage) !== false ||
            strpos($comment, $targetRating) !== false
        ) {
            $filteredComments[] = $comment;
        }
    }

    return $filteredComments;
}

// Example usage
$comments = array(
    "I loved the book 'Harry Potter and the Sorcerer's Stone' by J.K. Rowling!",
    "This book is not related to anything.",
    "The character development in 'Pride and Prejudice' by Jane Austen is remarkable.",
    "I haven't read the book, but the movie adaptation was great.",
    "The book 'To Kill a Mockingbird' by Harper Lee addresses important social issues.",
    "The author J.K. Rowling is one of my favorites.",
    "This is a thrilling mystery novel in the 'Crime' category.",
    "I enjoyed the book in its original language.",
    "The book has received a 5-star rating from me."
);

$targetBook = "Harry Potter and the Sorcerer's Stone";
$targetAuthor = "J.K. Rowling";
$targetCategory = "Crime";
$targetLanguage = "original language";
$targetRating = "5-star";

$filteredComments = filterCommentsByConnection($comments, $targetBook, $targetAuthor, $targetCategory, $targetLanguage, $targetRating);

// Print the filtered comments
foreach ($filteredComments as $comment) {
    echo $comment . "<br>";
}
