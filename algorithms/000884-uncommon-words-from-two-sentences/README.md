884\. Uncommon Words from Two Sentences

**Difficulty:** Easy

**Topics:** `Hash Table`, `String`, `Counting`

A **sentence** is a string of single-space separated words where each word consists only of lowercase letters.

A word is **uncommon** if it appears exactly once in one of the sentences, and **does not appear** in the other sentence.

Given two **sentences** `s1` and `s2`, return a list of all the **uncommon words**. You may return the answer in **any order**.

**Example 1:**

- **Input:** s1 = "this apple is sweet", s2 = "this apple is sour"
- **Output:** ["sweet","sour"]
- **Explanation:** The word `"sweet"` appears only in `s1`, while the word `"sour"` appears only in `s2`.

**Example 2:**

- **Input:** s1 = "apple apple", s2 = "banana"
- **Output:** ["banana"]



**Constraints:**

- <code>1 <= s1.length, s2.length <= 200</code>
- `s1` and `s2` consist of lowercase English letters and spaces.
- `s1` and `s2` do not have leading or trailing spaces.
- All the words in `s1` and `s2` are separated by a single space.


**Solution:**

We can follow these steps:

1. **Break the sentences into words**: Split both `s1` and `s2` into individual words.
2. **Count the occurrences of each word**: Use an associative array (hash table) to count how many times each word appears across both sentences.
3. **Filter uncommon words**: Find words that appear exactly once in the combined set of words from both sentences and do not appear in both sentences.

### Approach:
- Use the `explode` function to split the sentences into arrays of words.
- Use an associative array to count the frequency of each word.
- Return the words that have a count of 1.

Let's implement this solution in PHP: **[884. Uncommon Words from Two Sentences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000884-uncommon-words-from-two-sentences/solution.php)**

```php
<?php
/**
 * @param String $s1
 * @param String $s2
 * @return String[]
 */
function uncommonFromSentences($s1, $s2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$s1 = "this apple is sweet";
$s2 = "this apple is sour";
print_r(uncommonFromSentences($s1, $s2)); // Output: ["sweet", "sour"]

$s1 = "apple apple";
$s2 = "banana";
print_r(uncommonFromSentences($s1, $s2)); // Output: ["banana"]
?>
```

### Explanation:

1. **Splitting the sentences**: We use `explode(' ', $s1)` and `explode(' ', $s2)` to split the sentences into arrays of words.
2. **Counting occurrences**: We loop through both arrays of words, incrementing the count of each word in the associative array `$wordCount`.
3. **Filtering uncommon words**: We then check for words that have a count of exactly 1 in the `$wordCount` array and add them to the result array.

### Example Walkthrough:
- For `s1 = "this apple is sweet"` and `s2 = "this apple is sour"`, after counting, the associative array `$wordCount` will look like:
  ```
  Array (
    [this] => 2
    [apple] => 2
    [is] => 2
    [sweet] => 1
    [sour] => 1
  )
  ```
  The words with a count of 1 are `sweet` and `sour`, so the result is `["sweet", "sour"]`.

### Time Complexity:
- **O(n + m)**, where `n` is the number of words in `s1` and `m` is the number of words in `s2`. This is because we iterate through all the words in both sentences once to count the occurrences.

### Space Complexity:
- **O(n + m)**, where `n` and `m` are the number of words in `s1` and `s2`. We store all the words in an associative array to track their counts.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
