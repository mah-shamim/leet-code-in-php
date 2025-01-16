1255\. Maximum Score Words Formed by Letters

**Difficulty:** Hard

**Topics:** `Array`, `String`, `Dynamic Programming`, `Backtracking`, `Bit Manipulation`, `Bitmask`

Given a list of `words`, list of  single `letters` (might be repeating) and `score` of every character.

Return the maximum score of **any** valid set of words formed by using the given letters (`words[i]` cannot be used two or more times).

It is not necessary to use all characters in `letters` and each letter can only be used once. Score of letters `'a'`, `'b'`, `'c'`, `...` ,`'z'` is given by `score[0]`, `score[1]`, `...` , `score[25]` respectively.

**Example 1:**

- **Input:** words = ["dog","cat","dad","good"], letters = ["a","a","c","d","d","d","g","o","o"], score = [1,0,9,5,0,0,3,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0]
- **Output:** 23
- **Explanation:** \
  Score  a=1, c=9, d=5, g=3, o=2\
  Given letters, we can form the words "dad" (5+1+5) and "good" (3+2+2+5) with a score of 23.\
  Words "dad" and "dog" only get a score of 21.

**Example 2:**

- **Input:** words = ["xxxz","ax","bx","cx"], letters = ["z","a","b","c","x","x","x"], score = [4,4,4,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,5,0,10]
- **Output:** 27
- **Explanation:** \
  Score  a=4, b=4, c=4, x=5, z=10\
  Given letters, we can form the words "ax" (4+5), "bx" (4+5) and "cx" (4+5) with a score of 27.\
  Word "xxxz" only get a score of 25.

**Example 3:**

- **Input:** words = ["leetcode"], letters = ["l","e","t","c","o","d"], score = [0,0,1,1,1,0,0,0,0,0,0,1,0,0,1,0,0,0,0,1,0,0,0,0,0,0]
- **Output:** 0
- **Explanation:** \
  Letter "e" can only be used once. 

**Constraints:**

- <code>1 <= words.length <= 14</code>
- <code>1 <= words[i].length <= 15</code>
- <code>1 <= letters.length <= 100</code>
- <code>letters[i].length == 1</code>
- <code>score.length == 26</code>
- <code>0 <= score[i] <= 10</code>
- `words[i]`, `letters[i]` contains only lower case English letters.


**Hint:**
1. Note that `words.length` is small. This means you can iterate over every subset of words (2<sup>N</sup>).



**Solution:**

The problem is about maximizing the score of valid words formed using a given set of letters. The words can only be used once, and each letter in the list can be used at most as many times as it appears in the list. The score for each word is determined by the sum of the scores of its individual characters. We aim to find the maximum score obtainable from any combination of valid words formed.

### Key Points

1. **Words and Letters**: You are given a list of words and a set of available letters.
2. **Score Mapping**: Each letter has an associated score between 0 and 10 (inclusive). The score of each word is the sum of the scores of its characters.
3. **Valid Word Formation**: Each word must be formed using the available letters, without exceeding the letter counts in the list.
4. **Maximizing the Score**: We need to compute the maximum score by selecting any combination of words that can be formed from the given letters.

### Approach

- **Bitmasking**: Since the number of words is small (<=14), we can iterate over all subsets of words using bitmasking. Each subset corresponds to a combination of words. There are _**2^n**_ subsets, where _**n**_ is the number of words.

- **Counting Letters**: For each subset of words, we need to check if we can form those words with the available letters. We can maintain a frequency count of letters in the list and ensure that we don't exceed the available count for any letter.

- **Score Calculation**: For each valid combination of words, calculate the total score by summing the scores of the characters in those words.

### Plan

1. **Count Available Letters**: Create a frequency count for the available letters in the list.
2. **Iterate Over All Word Subsets**: For each subset of words, calculate the letter frequency required and check if it’s valid.
3. **Calculate Score**: If the subset is valid, compute the score for the words in that subset.
4. **Track Maximum Score**: Keep track of the maximum score encountered.

Let's implement this solution in PHP: **[1255. Maximum Score Words Formed by Letters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001255-maximum-score-words-formed-by-letters/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @param String[] $letters
 * @param Integer[] $score
 * @return Integer
 */
function maxScoreWords($words, $letters, $score) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$words = ["dog","cat","dad","good"];
$letters = ["a","a","c","d","d","d","g","o","o"];
$score = [1,0,9,5,0,0,3,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0];
echo maxScoreWords($words, $letters, $score) . "\n"; // Output: 23

$words = ["xxxz","ax","bx","cx"];
$letters = ["z","a","b","c","x","x","x"];
$score = [4,4,4,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,5,0,10];
echo maxScoreWords($words, $letters, $score) . "\n"; // Output: 27

$words = ["leetcode"];
$letters = ["l","e","t","c","o","d"];
$score = [0,0,1,1,1,0,0,0,0,0,0,1,0,0,1,0,0,0,0,1,0,0,0,0,0,0];
echo maxScoreWords($words, $letters, $score) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Letter Count**: For each word, we calculate how many times each letter appears. We need to ensure that the combined letter counts for any subset of words don't exceed the available counts from the letter list.

2. **Subset Generation**: We generate subsets of words using bitmasking. For each subset, we check if it's possible to form the words in that subset with the available letters. If it's possible, we calculate the score and update the maximum score if necessary.

3. **Score Calculation**: For each valid subset, the score is calculated by adding the scores of individual letters in the words of that subset.

### Example Walkthrough

**Example 1:**
- **Input**:
  ```php
  words = ["dog","cat","dad","good"]
  letters = ["a","a","c","d","d","d","g","o","o"]
  score = [1,0,9,5,0,0,3,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0]
  ```

- **Step 1**: Count the occurrences of letters:
  ```php
  letterCounts = [2, 0, 1, 3, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] // for a to z
  ```

- **Step 2**: Generate subsets of words and check if they can be formed with the available letters:
  - For subset `["dad", "good"]`, we calculate the letter counts needed:
    ```php
    wordCounts = [2, 0, 1, 3, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    ```
    This is valid because the letter counts do not exceed the available letters.

- **Step 3**: Calculate the score for this valid subset:
  ```php
  score = 5 + 1 + 5 + 3 + 2 + 2 + 5 = 23
  ```
- **Step 4**: Update the maximum score. The final result is `23`.

### Time Complexity

- **Generating subsets**: There are _**2<sup>n</sup>**_ subsets, where _**n**_ is the number of words.
- **Checking each subset**: For each subset, we need to calculate the letter counts, which takes _**O(w)**_ time, where _**w**_ is the maximum length of a word.
- **Total Complexity**: The total time complexity is _**O(2<sup>n</sup> × w)**_, which is feasible given _**n ≤ 14**_.

### Output for Example 1

```php
maxScoreWords(["dog", "cat", "dad", "good"], ["a", "a", "c", "d", "d", "d", "g", "o", "o"], [1,0,9,5,0,0,3,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0])
```

**Output**:
```
23
```

This approach efficiently computes the maximum score of any valid combination of words using bitmasking and dynamic checking of letter counts. The use of subsets ensures that we examine all possible combinations of words, while the letter counting ensures we only consider valid word formations.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
