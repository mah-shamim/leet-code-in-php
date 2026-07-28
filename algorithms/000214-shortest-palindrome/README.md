214\. Shortest Palindrome

**Difficulty:** Hard

**Topics:** `String`, `Rolling Hash`, `String Matching`, `Hash Function`

You are given a string `s`. You can convert `s` to a palindrome[^1] by adding characters in front of it.

Return _the shortest palindrome you can find by performing this transformation_.

**Example 1:**

- **Input:** s = "aacecaaa"
- **Output:** "aaacecaaa"

**Example 2:**

- **Input:** s = "abcd"
- **Output:** "dcbabcd"


**Constraints:**

- <code>0 <= s.length <= 5 * 10<sup>4</sup></code>
- `s` consists of lowercase English letters only.


[^1]: **Palindrome** A **palindrome** is a string that reads the same forward and backward.


**Similar Questions:**
1. [5. Longest Palindromic Substring](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000005-longest-palindromic-substring)
2. [28. Find the Index of the First Occurrence in a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000028-find-the-index-of-the-first-occurrence-in-a-string)
3. [336. Palindrome Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000336-palindrome-pairs)
4. [2430. Maximum Deletions on a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002430-maximum-deletions-on-a-string)
5. [3517. Smallest Palindromic Rearrangement I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003517-smallest-palindromic-rearrangement-i)


**Solution:**

We need to find the shortest palindrome by adding characters in front of a given string. We can approach this by identifying the longest prefix of the string that is already a palindrome. Once we have that, the remaining part can be reversed and added to the front to make the entire string a palindrome.

### Approach:
1. **Identify the longest palindromic prefix**: We want to find the longest prefix of the string `s` that is already a palindrome.
2. **Reverse the non-palindromic suffix**: The part of the string that isn't part of the palindromic prefix is reversed and added to the beginning of the string.
3. **Concatenate the reversed suffix and the original string** to form the shortest palindrome.

To do this efficiently, we can use string matching techniques such as the **KMP (Knuth-Morris-Pratt) algorithm** to find the longest palindromic prefix.

### Step-by-Step Solution:

1. **Create a new string** by appending the reverse of the string `s` to `s` itself, separated by a special character `'#'` to avoid overlap between the string and its reverse.

   Let the new string be `s + '#' + reverse(s)`.

2. **Use the KMP partial match table** (also known as the LPS array, longest prefix suffix) on this new string to determine the longest prefix of `s` that is also a suffix. This will give us the length of the longest palindromic prefix in `s`.

3. **Construct the shortest palindrome** by adding the necessary characters to the front.

Let's implement this solution in PHP: **[214. Shortest Palindrome](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000214-shortest-palindrome/solution.php)**

```php
<?php
/**
* @param String $s
* @return String
*/
function shortestPalindrome($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
* Helper function to compute the KMP (LPS array) for string matching
*
* @param $pattern
* @return array
*/
function computeLPS($pattern) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$s1 = "aacecaaa";
echo shortestPalindrome($s1) . "\n"; // Output: "aaacecaaa"

// Example 2
$s2 = "abcd";
echo shortestPalindrome($s2) . "\n"; // Output: "dcbabcd"
?>
```

### Explanation:

1. **computeLPS Function**:
   - This function computes the longest prefix which is also a suffix (LPS) for the given string. This helps to identify how much of the string `s` is already a palindrome.

2. **Forming the Combined String**:
   - We combine the original string `s` with its reverse and separate them by a special character `#`. The special character ensures that there is no overlap between `s` and `reverse(s)`.

3. **Using the LPS Array**:
   - The LPS array tells us the longest prefix in `s` which is also a suffix of `s`. This corresponds to the longest part of the string that is already a palindrome.

4. **Constructing the Shortest Palindrome**:
   - We find the portion of the string that isn't part of the longest palindromic prefix and reverse it. Then, we add the reversed part to the front of the original string `s`.

### Time Complexity:
- The time complexity of this solution is **O(n)**, where `n` is the length of the string. This is because we are using the KMP algorithm, which runs in linear time.

### Example Walkthrough:

#### Example 1:
Input: `s = "aacecaaa"`

1. Reverse of `s`: `"aaacecaa"`
2. Combined string: `"aacecaaa#aaacecaa"`
3. LPS array for the combined string gives the longest palindromic prefix as `"aacecaaa"`.

Since the whole string is already a palindrome, no characters need to be added. So the output is `"aaacecaaa"`.

#### Example 2:
Input: `s = "abcd"`

1. Reverse of `s`: `"dcba"`
2. Combined string: `"abcd#dcba"`
3. LPS array tells us that the longest palindromic prefix is just `"a"`.

So, we add `"dcb"` (reverse of `"bcd"`) to the front of `s`, resulting in `"dcbabcd"`.

### Conclusion:
This solution efficiently finds the shortest palindrome by leveraging string matching techniques and the KMP algorithm to identify the longest palindromic prefix. The complexity is linear, making it suitable for large input sizes up to `5 * 10^4`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
