966\. Vowel Spellchecker

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Weekly Contest 117`

Given a `wordlist`, we want to implement a spellchecker that converts a query word into a correct word.

For a given `query` word, the spell checker handles two categories of spelling mistakes:

- Capitalization: If the query matches a word in the wordlist (**case-insensitive**), then the query word is returned with the same case as the case in the wordlist.
  - Example: `wordlist = ["yellow"]`, `query = "YellOw"`: `correct = "yellow"`
  - Example: `wordlist = ["Yellow"]`, `query = "yellow"`: `correct = "Yellow"`
  - Example: `wordlist = ["yellow"]`, `query = "yellow"`: `correct = "yellow"`
- Vowel Errors: If after replacing the vowels (`'a'`, `'e'`, `'i'`, `'o'`, `'u'`) of the query word with any vowel individually, it matches a word in the wordlist (**case-insensitive**), then the query word is returned with the same case as the match in the wordlist.
  - Example: `wordlist = ["YellOw"]`, `query = "yollow"`: `correct = "YellOw"`
  - Example: `wordlist = ["YellOw"]`, `query = "yeellow"`: `correct = ""` (no match)
  - Example: `wordlist = ["YellOw"]`, `query = "yllw":` `correct = ""` (no match)

In addition, the spell checker operates under the following precedence rules:

- When the query exactly matches a word in the wordlist (case-sensitive), you should return the same word back.
- When the query matches a word up to capitlization, you should return the first such match in the wordlist.
- When the query matches a word up to vowel errors, you should return the first such match in the wordlist.
- If the query has no matches in the wordlist, you should return the empty string.

Given some `queries`, return a list of words `answer`, where `answer[i]` is the correct word for `query = queries[i]`.

**Example 1:**

- **Input:** wordlist = ["KiTe","kite","hare","Hare"], queries = ["kite","Kite","KiTe","Hare","HARE","Hear","hear","keti","keet","keto"]
- **Output:** ["kite","KiTe","KiTe","Hare","hare","","","KiTe","","KiTe"]

**Example 2:**

- **Input:** wordlist = ["yellow"], queries = ["YellOw"]
- **Output:** ["yellow"]

**Constraints:**

- `1 <= wordlist.length, queries.length <= 5000`
- `1 <= wordlist[i].length, queries[i].length <= 7`
- `wordlist[i]` and `queries[i]` consist only of only English letters.







**Solution:**

We need to implement a spell checker that handles two types of spelling mistakes: capitalization errors and vowel errors. The solution involves checking the query word against the wordlist in a specific order of precedence: exact match, case-insensitive match, and then vowel-insensitive match.

### Approach
1. **Exact Match Check**: First, check if the query word exists exactly (case-sensitive) in the wordlist. If found, return the word as is.
2. **Case-Insensitive Check**: If no exact match is found, convert the query word to lowercase and check if it matches any word in the wordlist case-insensitively. The first such match from the wordlist is returned.
3. **Vowel-Insensitive Check**: If no case-insensitive match is found, convert the query word to lowercase and replace all vowels with a placeholder (e.g., '*'). Check if this transformed string matches any word in the wordlist similarly transformed. The first such match from the wordlist is returned.
4. **No Match**: If none of the above checks succeed, return an empty string.

Let's implement this solution in PHP: **[966. Vowel Spellchecker](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000966-vowel-spellchecker/solution.php)**

```php
<?php
/**
 * @param String[] $wordlist
 * @param String[] $queries
 * @return String[]
 */
function spellchecker($wordlist, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $s
 * @return array|string|string[]
 */
function devowel($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$wordlist = ["KiTe","kite","hare","Hare"];
$queries = ["kite","Kite","KiTe","Hare","HARE","Hear","hear","keti","keet","keto"];
print_r(spellchecker($wordlist, $queries));
// Expected: ["kite","KiTe","KiTe","Hare","hare","","","KiTe","","KiTe"]

$wordlist2 = ["yellow"];
$queries2 = ["YellOw"];
print_r(spellchecker($wordlist2, $queries2));
// Expected: ["yellow"]
?>
```

### Explanation:

1. **Initialization**: We initialize three maps:
    - `$exactMap` to store exact words from the wordlist.
    - `$caseMap` to store the first occurrence of each case-insensitive version of words.
    - `$vowelMap` to store the first occurrence of each vowel-insensitive version of words.
2. **Processing Wordlist**: For each word in the wordlist:
    - Add the word to `$exactMap`.
    - Convert the word to lowercase and store it in `$caseMap` if not already present.
    - Convert the word to a vowel-insensitive form (lowercase with vowels replaced by '*') and store it in `$vowelMap` if not already present.
3. **Processing Queries**: For each query:
    - Check for an exact match in `$exactMap`.
    - If not found, check for a case-insensitive match in `$caseMap`.
    - If still not found, check for a vowel-insensitive match in `$vowelMap`.
    - If no match is found, return an empty string.
4. **Helper Function**: The `devowel` function replaces all vowels in a string with '*', used for both processing the wordlist and queries.

This approach efficiently checks for matches in the order of precedence specified, ensuring correct handling of capitalization and vowel errors while leveraging hash maps for optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**