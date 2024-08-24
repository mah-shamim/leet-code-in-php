564\. Find the Closest Palindrome

**Difficulty:** Hard

**Topics:** `Math`, `String`

Given a string `n` representing an integer, return _the closest integer (not including itself), which is a palindrome-. If there is a tie, return **the smaller one**.

The closest is defined as the absolute difference minimized between two integers.

**Example 1:**

- **Input:** n = "123"
- **Output:** "121"

**Example 2:**

- **Input:** n = "1"
- **Output:** "0"
- **Explanation:** 0 and 2 are the closest palindromes but we return the smallest which is 0.

**Constraints:**

- `1 <= n.length <= 18`
- `n` consists of only digits.
- `n` does not have leading zeros.
- `n` is representing an integer in the range <code>[1, 10<sup>18</sup> - 1]</code>.

**Hint:**
1. Will brute force work for this problem? Think of something else.
2. Take some examples like 1234, 999,1000, etc and check their closest palindromes. How many different cases are possible?
3. Do we have to consider only left half or right half of the string or both?
4. Try to find the closest palindrome of these numbers- 12932, 99800, 12120. Did you observe something?




**Solution:**

We'll focus on creating a function that generates potential palindrome candidates and then selects the one closest to the input number.

### Solution Approach:

1. **Identify Palindrome Candidates**:
   - Mirror the first half of the number to form a palindrome.
   - Consider edge cases like all digits being `9`, `100...001`, or `99...99`.
   - Generate palindromes by modifying the middle of the number up or down by 1.

2. **Calculate the Closest Palindrome**:
   - For each palindrome candidate, compute the absolute difference with the original number.
   - Return the palindrome with the smallest difference. If there's a tie, return the smaller palindrome.


Let's implement this solution in PHP: **[564. Find the Closest Palindrome](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000564-find-the-closest-palindrome/solution.php)**

```php
<?php
/**
* @param String $n
* @return String
*/
function nearestPalindromic($n) {
    ...
    ...
    ...
    /**
     * go to https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000564-find-the-closest-palindrome/solution.php
     */
}

function generatePalindrome($firstHalf, $isOddLength) {
    ...
    ...
    ...
}

// Example usage
echo nearestPalindromic("123"); // Output: "121"
echo nearestPalindromic("1");   // Output: "0"
?>
```

### Explanation:

- **generatePalindrome($firstHalf, $isOddLength)**:
   - This helper function creates a palindrome by mirroring the first half of the number.
```php
<?php
/**
* @param $firstHalf
* @param $isOddLength
* @return string
*/
function generatePalindrome($firstHalf, $isOddLength) {
    $secondHalf = strrev(substr($firstHalf, 0, $isOddLength ? -1 : $firstHalf));
    return $firstHalf . $secondHalf;
}
?>
```

- **Edge Cases**:
   - Palindromes generated from numbers like `100...001` or `99...99` are handled by explicitly checking these cases.

- **Main Logic**:
   - We calculate possible palindromes and then find the closest one by comparing absolute differences.

This solution efficiently narrows down possible palindrome candidates and picks the closest one by considering only a few options, making it much faster than brute-force approaches.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

