3306\. Count of Substrings Containing Every Vowel and K Consonants II

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Sliding Window`

You are given a string word and a **non-negative** integer k.

Return _the total number of Substring[^1] of `word` that contain every vowel (`'a'`, `'e'`, `'i'`, `'o'`, and `'u'`) **at least** once and **exactly** `k` consonants_.

**Example 1:**

- **Input:** word = "aeioqq", k = 1
- **Output:** 0
- **Explanation:** There is no substring with every vowel.

**Example 2:**

- **Input:** word = "aeiou", k = 0
- **Output:** 1
- **Explanation:** The only substring with every vowel and zero consonants is `word[0..4]`, which is `"aeiou"`.


**Example 3:**

- **Input:** word = "ieaouqqieaouqq", k = 1
- **Output:** 3
- **Explanation:** The substrings with every vowel and one consonant are:
  - `word[0..5]`, which is `"ieaouq"`.
  - `word[6..11]`, which is `"qieaou"`.
  - `word[7..12]`, which is `"ieaouq"`.


**Example 4:**

- **Input:** word ="iqeaouqi", k = 2
- **Output:** 3




**Constraints:**

- <code>5 <= word.length <= 2 * 10<sup>5</sup></code>
- `word` consists only of lowercase English letters.
- `0 <= k <= word.length - 5`


**Hint:**
1. We can use sliding window and binary search.
2. For each index `r`, find the maximum `l` such that both conditions are satisfied using binary search.

[^1]: **Substring** : `A **substring** is a contiguous **non-empty** sequence of characters within a string.`

**Solution:**

The problem requires us to count the number of substrings within a given string `word` that contain **all vowels (`a, e, i, o, u`) at least once** and exactly `k` consonants. We use a **sliding window** approach to efficiently solve this problem within the given constraints.

## **Key Points**
- A substring must contain all **five vowels (`a, e, i, o, u`)** at least once.
- It must have **exactly `k` consonants**.
- The length of `word` is **large** (up to `200,000` characters), so an efficient solution is necessary.
- The solution uses **sliding window** and **two-pointer** techniques to optimize the counting process.

## **Approach**
We use the idea of: _**Substrings with exactly k consonants = Substrings with at most k - Substrings with at most (k-1)**_
This allows us to count substrings with **exactly `k` consonants** efficiently.

### **Plan**
1. Implement **`substringsWithAtMost(word, k)`**:
   - Use **two pointers (`left`, `right`)** to maintain a window.
   - Track the last-seen positions of each vowel.
   - Expand the window while maintaining the condition: `consonants ≤ k`.
   - Count valid substrings when all vowels are present.

2. Implement **`countOfSubstrings(word, k)`**:
   - Calculate the result as: _**substringsWithAtMost(word, k) - substringsWithAtMost(word, k-1)**_

3. Define **`isVowel($char)`**:
   - Check if a character is one of `"aeiou"`.

Let's implement this solution in PHP: **[3306. Count of Substrings Containing Every Vowel and K Consonants II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003306-count-of-substrings-containing-every-vowel-and-k-consonants-ii/solution.php)**

```php
<?php
/**
 * @param String $word
 * @param Integer $k
 * @return Integer
 */
function countOfSubstrings($word, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $word
 * @param $k
 * @return int|mixed
 */
function substringsWithAtMost($word, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $char
 * @return bool
 */
function isVowel($char) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Cases
echo countOfSubstrings("aeioqq", 1) . "\n"; // Output: 0
echo countOfSubstrings("aeiou", 0) . "\n"; // Output: 1
echo countOfSubstrings("ieaouqqieaouqq", 1) . "\n"; // Output: 3
echo countOfSubstrings("iqeaouqi", 2) . "\n"; // Output: 3
?>
```

### Explanation:

### **Function: `substringsWithAtMost($word, $k)`**
- **Tracks last seen positions** of vowels using an associative array.
- Uses **two pointers (`left`, `right`)** to define a valid window.
- **Expands `right`** while ensuring the window contains at most `k` consonants.
- **Shrinks `left`** when consonants exceed `k`.
- If all **five vowels are present**, we count valid substrings.

### **Function: `countOfSubstrings($word, $k)`**
- Uses **inclusion-exclusion** to count **exact `k` consonant substrings**.

### **Function: `isVowel($char)`**
- Simple function to check if a character is a vowel.

## **Example Walkthrough**
### **Example 1**
**Input:**
```php
word = "aeioqq", k = 1
```
**Steps:**
- The only substring containing all vowels is `"aeio"`, but it has `0` consonants.
- Since we need `1` consonant, **no valid substrings exist**.

**Output:**
```
0
```

### **Example 2**
**Input:**
```php
word = "aeiou", k = 0
```
**Steps:**
- The substring `"aeiou"` contains all vowels and `0` consonants.
- So, the result is **1**.

**Output:**
```
1
```

### **Example 3**
**Input:**
```php
word = "ieaouqqieaouqq", k = 1
```
**Steps:**
- Possible substrings:
   - `"ieaouq"`
   - `"qieaou"`
   - `"ieaouq"`
- All three substrings contain all vowels and exactly `1` consonant.

**Output:**
```
3
```

### **Example 4**
**Input:**
```php
word = "iqeaouqi", k = 2
```
**Steps:**
- Possible substrings:
   - `"iqeaouq"`
   - `"qeaouqi"`
   - `"iqeaouqi"`
- These substrings contain all vowels and **exactly** `2` consonants.

**Output:**
```
3
```

## **Time Complexity Analysis**
### **`substringsWithAtMost($word, k)`**
- Each character is processed **at most twice** (once when `right` expands, once when `left` moves forward).
- This results in an **O(N) time complexity**.

### **Overall Complexity**
_**O(N) + O(N) = O(N)**_
This ensures our solution runs efficiently even for large strings.

## **Output for Examples**
```php
echo countOfSubstrings("aeioqq", 1) . "\n";        // Output: 0
echo countOfSubstrings("aeiou", 0) . "\n";         // Output: 1
echo countOfSubstrings("ieaouqqieaouqq", 1) . "\n"; // Output: 3
echo countOfSubstrings("iqeaouqi", 2) . "\n";       // Output: 3
```

- **Sliding window** and **two-pointer** technique allow us to efficiently count substrings.
- The **inclusion-exclusion principle** ensures we get substrings with **exactly** `k` consonants.
- The **O(N) time complexity** makes the solution feasible for large inputs.
- **Edge cases** such as **no valid substrings** and **long consecutive vowels/consonants** are handled. 🚀

This solution ensures correctness while maintaining efficiency! 🚀 Let me know if you need further explanations. 😊

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**