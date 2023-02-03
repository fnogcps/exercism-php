<?php

/*
* By adding type hints and enabling strict type checking, code can become
* easier to read, self-documenting and reduce the number of potential bugs.
* By default, type declarations are non-strict, which means they will attempt
* to change the original type to match the type specified by the
* type-declaration.
*
* In other words, if you pass a string to a function requiring a float,
* it will attempt to convert the string value to a float.
*
* To enable strict mode, a single declare directive must be placed at the top
* of the file.
* This means that the strictness of typing is configured on a per-file basis.
* This directive not only affects the type declarations of parameters, but also
* a function's return type.
*
* For more info review the Concept on strict type checking in the PHP track
* <link>.
*
* To disable strict typing, comment out the directive below.
*/

declare(strict_types=1);

function detectAnagrams(string $word, array $anagrams): array
{
    $output_list = [];
    $lower_word = mb_strtolower($word);
    $split_word = mb_str_split($lower_word);
    asort($split_word);

    foreach ($anagrams as $anagram) {
        $lower_anagram = mb_strtolower($anagram);
        $split_anagram = mb_str_split($lower_anagram);

        asort($split_anagram);

        if (array_values($split_word) != array_values($split_anagram)) {
            continue;
        }

        if (count($split_anagram) == count($split_word) && $lower_word != $lower_anagram) {
            $output_list[] = $anagram;
        }
    }

    return $output_list;
}
