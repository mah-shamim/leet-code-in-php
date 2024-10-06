1813\. Sentence Similarity III

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `String`

You are given two strings `sentence1` and `sentence2`, each representing a **sentence** composed of words. A sentence is a list of **words** that are separated by a **single** space with no leading or trailing spaces. Each word consists of only uppercase and lowercase English characters.

Two sentences `s1` and `s2` are considered **similar** if it is possible to insert an arbitrary sentence (_possibly empty_) inside one of these sentences such that the two sentences become equal. **Note** that the inserted sentence must be separated from existing words by spaces.

For example,

- `s1 = "Hello Jane"` and `s2 = "Hello my name is Jane"` can be made equal by inserting `"my name is"` between `"Hello"` and `"Jane"` in s1.
- `s1 = "Frog cool"` and `s2 = "Frogs are cool"` are not similar, since although there is a sentence `"s are"` inserted into `s1`, it is not separated from `"Frog"` by a space.

Given two sentences `sentence1` and `sentence2`, return **true** if `sentence1` and `sentence2` are **similar**. Otherwise, return **false**.

**Example 1:**

- **Input:** sentence1 = "My name is Haley", sentence2 = "My Haley"
- **Output:** true
- **Explanation:** `sentence2` can be turned to `sentence1` by inserting "name is" between "My" and "Haley".

**Example 2:**

- **Input:** sentence1 = "of", sentence2 = "A lot of words"
- **Output:** false
- **Explanation:** No single sentence can be inserted inside one of the sentences to make it equal to the other.


**Example 3:**

- **Input:** sentence1 = "Eating right now", sentence2 = "Eating"
- **Output:** true
- **Explanation:** `sentence2` can be turned to `sentence1` by inserting "right now" at the end of the sentence.



**Constraints:**

- `1 <= sentence1.length, sentence2.length <= 100`
- `sentence1` and `sentence2` consist of lowercase and uppercase English letters and spaces.
- The words in `sentence1` and `sentence2` are separated by a single space.


**Hint:**
1. One way to look at it is to find one sentence as a concatenation of a prefix and suffix from the other sentence.
2. Get the longest common prefix between them and the longest common suffix.



**Solution:**

We can approach it by comparing the longest common prefix and suffix of both sentences. If the words in the remaining part of one sentence are completely contained within the other sentence (possibly empty), then the sentences can be considered similar.

### Steps:

1. Split both sentences into arrays of words.
2. Use two pointers to compare the longest common prefix from the start of both arrays.
3. Use another two pointers to compare the longest common suffix from the end of both arrays.
4. After comparing the common prefix and suffix, if the remaining words in one of the sentences form an empty array (meaning they have all been matched), then the sentences are considered similar.

Let's implement this solution in PHP: **[1813. Sentence Similarity III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001813-sentence-similarity-iii/solution.php)**

```php
<?php
/**
 * @param String $sentence1
 * @param String $sentence2
 * @return Boolean
 */
function areSentencesSimilar($sentence1, $sentence2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test examples
$sentence1 = "My name is Haley";
$sentence2 = "My Haley";
echo areSentencesSimilar($sentence1, $sentence2) ? 'true' : 'false'; // Output: true

$sentence1 = "of";
$sentence2 = "A lot of words";
echo areSentencesSimilar($sentence1, $sentence2) ? 'true' : 'false'; // Output: false

$sentence1 = "Eating right now";
$sentence2 = "Eating";
echo areSentencesSimilar($sentence1, $sentence2) ? 'true' : 'false'; // Output: true
?>
```

### Explanation:

1. **Splitting sentences into words:** We use `explode()` to split the sentence strings into arrays of words.
2. **Common prefix comparison:** We iterate over both arrays from the start and compare corresponding words. The loop continues as long as the words match.
3. **Common suffix comparison:** We compare the words from the end of both arrays, again using a loop to check for matching words.
4. **Final check:** After processing the common prefix and suffix, we check if the number of words that have been matched (prefix + suffix) covers all the words in the shorter sentence. If so, the sentences can be considered similar.

### Time Complexity:
- The time complexity is **O(n + m)**, where `n` and `m` are the lengths of `sentence1` and `sentence2` respectively. This is because we process the words in both sentences only once while checking the common prefix and suffix.

This solution should work efficiently given the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
