1455\. Check If a Word Occurs As a Prefix of Any Word in a Sentence

**Difficulty:** Easy

**Topics:** `Two Pointers`, `String`, `String Matching`

Given a `sentence` that consists of some words separated by a **single space**, and a `searchWord`, check if `searchWord` is a prefix of any word in `sentence`.

Return the index of the word in `sentence` (**1-indexed**) where `searchWord` is a prefix of this word. If `searchWord` is a prefix of more than one word, return the index of the first word (**minimum index**). If there is no such word return `-1`.

A **prefix** of a string `s` is any leading contiguous substring of `s`.

**Example 1:**

- **Input:** sentence = "i love eating burger", searchWord = "burg"
- **Output:** 4
- **Explanation:** "burg" is prefix of "burger" which is the 4th word in the sentence.

**Example 2:**

- **Input:** sentence = "this problem is an easy problem", searchWord = "pro"
- **Output:** 2
- **Explanation:** "pro" is prefix of "problem" which is the 2nd and the 6th word in the sentence, but we return 2 as it's the minimal index.


**Example 3:**

- **Input:** sentence = "i am tired", searchWord = "you"
- **Output:** -1
- **Explanation:** "you" is not a prefix of any word in the sentence.



**Constraints:**

- `1 <= sentence.length <= 100`
- `1 <= searchWord.length <= 10`
- `sentence` consists of lowercase English letters and spaces.
- `searchWord` consists of lowercase English letters.


**Hint:**
1. First extract the words of the sentence.
2. Check for each word if searchWord occurs at index 0, if so return the index of this word (1-indexed)
3. If searchWord doesn't exist as a prefix of any word return the default value (-1).



**Solution:**

We can break down the task into the following steps:

1. Split the `sentence` into individual words.
2. Iterate through the words and check if the `searchWord` is a prefix of each word.
3. If a word starts with `searchWord`, return the 1-indexed position of the word.
4. If no word matches, return `-1`.

Let's implement this solution in PHP: **[1455. Check If a Word Occurs As a Prefix of Any Word in a Sentence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001455-check-if-a-word-occurs-as-a-prefix-of-any-word-in-a-sentence/solution.php)**

```php
<?php
/**
 * @param String $sentence
 * @param String $searchWord
 * @return Integer
 */
function isPrefixOfWord($sentence, $searchWord) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage:
echo isPrefixOfWord("i love eating burger", "burg");  // Output: 4
echo isPrefixOfWord("this problem is an easy problem", "pro");  // Output: 2
echo isPrefixOfWord("i am tired", "you");  // Output: -1
?>
```

### Explanation:

1. **Splitting the Sentence into Words**:  
   We use `explode(" ", $sentence)` to split the sentence into an array of words.

2. **Iterating Over Words**:  
   Use a `foreach` loop to iterate through each word in the sentence. The `$index` variable keeps track of the position of the word (0-indexed).

3. **Checking for Prefix**:  
   Use `strpos($word, $searchWord) === 0` to check if the `searchWord` occurs at the start of the current word.

4. **Returning the Result**:  
   If a match is found, return the 1-based index of the word by adding 1 to `$index`. If no match is found after the loop, return `-1`.

### Example Outputs:
- For the input `sentence = "i love eating burger"` and `searchWord = "burg"`, the output is `4` because `"burger"` is the 4th word.
- For the input `sentence = "this problem is an easy problem"` and `searchWord = "pro"`, the output is `2` because `"problem"` is the 2nd word.
- For the input `sentence = "i am tired"` and `searchWord = "you"`, the output is `-1` because no word starts with `"you"`.

### Time Complexity:
- Splitting the sentence into words takes O(n), where `n` is the length of the sentence.
- Checking each word for a prefix takes O(m), where `m` is the length of the `searchWord`.
- Thus, the overall time complexity is O(n * m), which is efficient for the input size constraints.

This solution satisfies the constraints and is efficient for the given input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
