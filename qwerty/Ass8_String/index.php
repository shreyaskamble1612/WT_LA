<?php
// string_operations.php

function demonstrateStringOperations()
{
   
    $text = "Hello, Welcome to PHP Programming!";

    echo "Original String: " . $text . "\n\n";

    echo "1. String Length: " . strlen($text) . "\n";

    echo "2. Word Count: " . str_word_count($text) . "\n";

    echo "3. Uppercase: " . strtoupper($text) . "\n";

    echo "4. Lowercase: " . strtolower($text) . "\n";

    echo "5. First Character Uppercase: " . ucfirst(strtolower($text)) . "\n";

    echo "6. Each Word Uppercase: " . ucwords(strtolower($text)) . "\n";

    echo "7. Position of 'PHP': " . strpos($text, "PHP") . "\n";

    echo "8. Substring (first 5 chars): " . substr($text, 0, 5) . "\n";

    echo "9. Replace 'PHP' with 'Python': " . str_replace("PHP", "Python", $text) . "\n";

    echo "10. Reversed String: " . strrev($text) . "\n";

    $text_with_spaces = "   Trimmed String   ";
    echo "11. Trimmed String: '" . trim($text_with_spaces) . "'\n";

    $words = explode(" ", $text);
    echo "12. Split String into Array: \n";
    print_r($words);
}

echo "PHP String Operations Demo:\n";
echo "===========================\n";
demonstrateStringOperations();
?>