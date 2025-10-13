2273\. Find Resultant Array After Removing Anagrams

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `String`, `Sorting`, `Weekly Contest 293`

You are given a **0-indexed** string array `words`, where `words[i]` consists of lowercase English letters.

In one operation, select any index `i` such that `0 < i < words.length` and `words[i - 1]` and `words[i]` are **anagrams**, and **delete** `words[i]` from `words`. Keep performing this operation as long as you can select an index that satisfies the conditions.

Return _`words` after performing all operations_. It can be shown that selecting the indices for each operation in **any** arbitrary order will lead to the same result.

An **Anagram** is a word or phrase formed by rearranging the letters of a different word or phrase using all the original letters exactly once. For example, `"dacb"` is an anagram of `"abdc"`.

**Example 1:**

- **Input:** words = ["abba","baba","bbaa","cd","cd"]
- **Output:** ["abba","cd"]
- **Explanation:** One of the ways we can obtain the resultant array is by using the following operations:
  - Since words[2] = "bbaa" and words[1] = "baba" are anagrams, we choose index 2 and delete words[2].
    - Now words = ["abba","baba","cd","cd"].
  - Since words[1] = "baba" and words[0] = "abba" are anagrams, we choose index 1 and delete words[1].
    - Now words = ["abba","cd","cd"].
  - Since words[2] = "cd" and words[1] = "cd" are anagrams, we choose index 2 and delete words[2].
    - Now words = ["abba","cd"].
  - We can no longer perform any operations, so ["abba","cd"] is the final answer.

**Example 2:**

- **Input:** words = ["a","b","c","d","e"]
- **Output:** ["a","b","c","d","e"]
- **Explanation:** No two adjacent strings in words are anagrams of each other, so no operations are performed.

**Constraints:**

- `1 <= words.length <= 100`
- `1 <= words[i].length <= 10`
- `words[i]` consists of lowercase English letters.



**Hint:**
1. Instead of removing each repeating anagram, try to find all the strings in words which will not be present in the final answer.
2. For every index i, find the largest index j < i such that `words[j]` will be present in the final answer.
3. Check if `words[i]` and `words[j]` are anagrams. If they are, then it can be confirmed that `words[i]` will not be present in the final answer.



**Similar Questions:**
1. [49. Group Anagrams](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000049-group-anagrams)
2. [242. Valid Anagram](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000242-valid-anagram)






**Solution:**

We need to remove words that are anagrams of their immediate predecessor, repeatedly until no more such operations can be performed.

The key insight is that I can process the array in a single pass, only keeping words that are NOT anagrams of the previously kept word.

**Approach:**
1. Start with the first word (it always stays)
2. For each subsequent word, compare it with the last word in our result
3. If they are anagrams, skip the current word
4. If they are not anagrams, add the current word to result
5. This works because the order of operations doesn't matter - we'll end up with the same result regardless

Let's implement this solution in PHP: **[2273. Find Resultant Array After Removing Anagrams](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002273-find-resultant-array-after-removing-anagrams/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @return String[]
 */
function removeAnagrams($words) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1:
$words1 = array("abba", "baba", "bbaa", "cd", "cd");
echo "Input: ";
print_r($words1);
echo "Output: ";
print_r(removeAnagrams($words1));
// Expected: ["abba", "cd"]

echo "\n";

// Example 2:
$words2 = array("a", "b", "c", "d", "e");
echo "Input: ";
print_r($words2);
echo "Output: ";
print_r(removeAnagrams($words2));
// Expected: ["a", "b", "c", "d", "e"]
?>
```

### Explanation:

1. **Initialization**: We start with an empty result array and immediately add the first word from the input.

2. **Processing**: For each subsequent word, we check if it's an anagram of the last word in our result array.

3. **Anagram Check**: We convert strings to character arrays, sort them, and compare. If the sorted versions are identical, the words are anagrams.

4. **Building Result**: Only non-anagram words are added to the result array.

5. **Edge Cases**:
   - Single word arrays return as-is
   - Arrays with no anagrams return unchanged
   - The algorithm handles the removal process in optimal O(n * m log m) time where n is number of words and m is word length

The solution efficiently handles the removal process in a single pass, making it both time and space efficient.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**