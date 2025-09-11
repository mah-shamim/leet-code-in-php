2785\. Sort Vowels in a String

**Difficulty:** Medium

**Topics:** `String`, `Sorting`, `Biweekly Contest 109`

Given a **0-indexed** string `s`, **permute** `s` to get a new string `t` such that:

- All consonants remain in their original places. More formally, if there is an index `i` with` 0 <= i < s.length` such that `s[i]` is a consonant, then `t[i] = s[i]`.
- The vowels must be sorted in the **nondecreasing** order of their **ASCII** values. More formally, for pairs of indices `i`, `j` with `0 <= i < j < s.length`such that `s[i]` and `s[j]` are vowels, then `t[i]` must not have a higher ASCII value than `t[j]`.

Return _the resulting string_.

The vowels are `'a'`, `'e'`, `'i'`, `'o'`, and `'u'`, and they can appear in lowercase or uppercase. Consonants comprise all letters that are not vowels.

**Example 1:**

- **Input:** s = "lEetcOde"
- **Output:** "lEOtcede"
- **Explanation:** 'E', 'O', and 'e' are the vowels in s; 'l', 't', 'c', and 'd' are all consonants. The vowels are sorted according to their ASCII values, and the consonants remain in the same places.

**Example 2:**

- **Input:** s = "lYmpH"
- **Output:** "lYmpH"
- **Explanation:** There are no vowels in s (all characters in s are consonants), so we return "lYmpH".

**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s` consists only of letters of the English alphabet in **uppercase and lowercase**.


**Hint:**
1. Add all the vowels in an array and sort the array.
2. Replace characters in string s if it's a vowel from the new array.


**Similar Questions:**
1. [345. Reverse Vowels of a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000345-reverse-vowels-of-a-string)






**Solution:**

We need to permute a given string such that all consonants remain in their original positions, and the vowels are sorted in non-decreasing order of their ASCII values. The vowels include both lowercase and uppercase letters 'a', 'e', 'i', 'o', and 'u'.

### Approach
1. **Identify Vowels**: First, we iterate through the input string to collect all vowels (both lowercase and uppercase) into an array.
2. **Sort Vowels**: The collected vowels are then sorted based on their ASCII values. This ensures that the vowels are in non-decreasing order as required.
3. **Construct Result String**: We then iterate through the original string again. For each character, if it is a consonant, we leave it as is. If it is a vowel, we replace it with the next vowel from the sorted vowels array.

Let's implement this solution in PHP: **[2785. Sort Vowels in a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002785-sort-vowels-in-a-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function sortVowels($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $c
 * @return bool
 */
function isVowel($c) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sortVowels("lEetcOde") . "\n"; // Output: lEOtcede
echo sortVowels("lYmpH") . "\n";    // Output: lYmpH
?>
```

### Explanation:

1. **Collecting Vowels**: The code first checks each character in the input string to see if it is a vowel. If it is, the character is added to an array called `$vowels`.
2. **Sorting Vowels**: The `sort` function is used to sort the collected vowels array by their ASCII values. This ensures that the vowels are in ascending order based on their ASCII values.
3. **Building Result String**: The code then iterates through the original string again. For each character, if it is a vowel, it is replaced with the next vowel from the sorted array. If it is a consonant, it remains unchanged. The result string is built character by character during this process.
4. **Vowel Check**: The helper function `isVowel` checks if a given character is a vowel by seeing if it exists in the string `'aeiouAEIOU'`.

This approach efficiently ensures that consonants stay in their original positions while vowels are sorted in the required order, leveraging simple string manipulation and sorting techniques. The time complexity is dominated by the sorting step, which is O(m log m) where m is the number of vowels, and the space complexity is O(m) to store the vowels.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**