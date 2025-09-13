3541\. Find Most Frequent Vowel and Consonant

**Difficulty:** Easy

**Topics:** `Hash Table`, `String`, `Counting`, `Biweekly Contest 156`

You are given a string `s` consisting of lowercase English letters (`'a'` to `'z'`).

Your task is to:

- Find the vowel (one of `'a'`, `'e'`, `'i`', `'o'`, or `'u'`) with the **maximum** frequency.
- Find the consonant (all other letters excluding vowels) with the **maximum** frequency.

Return _the sum of the two frequencies_.

**Note:** If multiple vowels or consonants have the same maximum frequency, you may choose any one of them. If there are no vowels or no consonants in the string, consider their frequency as 0.
The **frequency** of a letter `x` is the number of times it occurs in the string.

**Example 1:**

- **Input:** s = "successes"
- **Output:** 6
- **Explanation:**
  - The vowels are: `'u'` (frequency 1), `'e'` (frequency 2). The maximum frequency is 2.
  - The consonants are: `'s'` (frequency 4), `'c'` (frequency 2). The maximum frequency is 4.
  - The output is `2 + 4 = 6`.


**Example 2:**

- **Input:** s = "aeiaeia"
- **Output:** 3
- **Explanation:**
  - The vowels are: `'a'` (frequency 3), `'e'` ( frequency 2), `'i'` (frequency 2). The maximum frequency is 3.
  - There are no consonants in `s`. Hence, maximum consonant frequency = 0.
  - The output is `3 + 0 = 3`.


**Constraints:**


- `1 <= s.length <= 100`
- `s` consists of lowercase English letters only.



**Hint:**
1. Use a hashmap
2. Simulate as described






**Solution:**

We need to find the sum of the maximum frequency of a vowel and the maximum frequency of a consonant in a given string. The solution involves counting the occurrences of each character, categorizing them as vowels or consonants, and then determining the highest frequency in each category.

### Approach
1. **Define Vowels**: Identify the vowels as 'a', 'e', 'i', 'o', and 'u'.
2. **Count Frequencies**: Use an associative array to count how many times each character appears in the string.
3. **Separate Vowels and Consonants**: Iterate through the frequency array, separating the counts into vowels and consonants.
4. **Find Maximum Frequencies**: Determine the highest frequency among the vowels and the highest among the consonants. If there are no vowels or consonants, use 0 for the respective maximum.
5. **Return Sum**: Add the two maximum frequencies and return the result.

Let's implement this solution in PHP: **[3541. Find Most Frequent Vowel and Consonant](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003541-find-most-frequent-vowel-and-consonant/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function maxFreqSum($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxFreqSum("successes") . "\n"; // Output: 6
echo maxFreqSum("aeiaeia") . "\n";   // Output: 3
echo maxFreqSum("zzz") . "\n";       // Output: 3
echo maxFreqSum("a") . "\n";         // Output: 1
?>
```

### Explanation:

1. **Initialization**: We start by defining the vowels and initializing an empty array `$freq` to store the frequency of each character.
2. **Frequency Counting**: We iterate through each character in the string, updating the frequency count in the `$freq` array.
3. **Finding Maximums**: We then iterate through the frequency array. For each character, we check if it is a vowel. If it is, we compare its count to the current maximum vowel count. If it is a consonant, we compare its count to the current maximum consonant count.
4. **Result Calculation**: Finally, we return the sum of the maximum vowel count and the maximum consonant count. If there are no vowels or consonants, the respective maximum will remain 0, which is handled naturally.

This approach efficiently categorizes and counts the characters, ensuring optimal performance even for the upper constraint of string length (100 characters). The solution is straightforward and leverages basic array operations to achieve the desired result.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**