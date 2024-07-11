<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function shortestWord()
    {
        $testCases = [
            "TRUE FRIENDS ARE ME AND YOU",
            "I AM THE LEGENDARY VILLAIN"
        ];

        $results = [];
        foreach ($testCases as $testCase) {
            $result = $this->shortestWordInString($testCase);
            $results[] = "OUTPUT for \"$testCase\": $result";
        }

        dd($results);
    }

    private function shortestWordInString($string)
    {
        // Split the string into words
        $words = explode(' ', $string);

        // Initialize the shortest word with the first word
        $shortestWord = $words[0];

        // Loop through each word to find the shortest one
        foreach ($words as $word) {
            if (strlen($word) < strlen($shortestWord)) {
                $shortestWord = $word;
            }
        }

        return $shortestWord;
    }

    public function countTheIslands()
    {
        $matrix = [
            [1, 1, 1, 1],
            [0, 1, 1, 0],
            [0, 1, 0, 1],
            [1, 1, 0, 0]
        ];

        // Modify the matrix
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                if ($matrix[$i][$j] == 1) {
                    $matrix[$i][$j] = 'X';
                } else if ($matrix[$i][$j] == 0) {
                    $matrix[$i][$j] = '~';
                }
            }
        }

        $htmlTable = '<table border="1" style="border-collapse: collapse; text-align: center;">';
        foreach ($matrix as $row) {
            $htmlTable .= '<tr>';
            foreach ($row as $cell) {
                $htmlTable .= '<td style="padding: 10px;">' . $cell . '</td>';
            }
            $htmlTable .= '</tr>';
        }
        $htmlTable .= '</table>';

        echo $htmlTable;
    }

    public function wordSearch()
    {
        // Given list of words
        $wordList = ["I", "TWO", "FORTY", "THREE", "JEN", "TWO", "tWo", "Two"];
        $targetWord = "TWO";
        $matchingIndices = [];
        foreach ($wordList as $index => $word) {
            if ($word === $targetWord) {
                $matchingIndices[] = "index ".$index;
            }
        }
        dd($matchingIndices);
    }
}
