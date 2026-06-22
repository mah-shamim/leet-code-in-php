1189\. Maximum Number of Balloons

**Difficulty:** Easy

**Topics:** `Mid Level`, `Hash Table`, `String`, `Counting`, `Weekly Contest 154`

Given a string `text`, you want to use the characters of `text` to form as many instances of the word **"balloon"** as possible.

You can use each character in `text` **at most once**. Return the maximum number of instances that can be formed.

**Example 1:**

![1536_ex1_upd](https://assets.leetcode.com/uploads/2019/09/05/1536_ex1_upd.JPG)

- **Input:** text = "nlaebolko"
- **Output:** 1

**Example 2:**

![1536_ex2_upd](https://assets.leetcode.com/uploads/2019/09/05/1536_ex2_upd.JPG)

- **Input:** text = "loonbalxballpoon"
- **Output:** 2

**Example 3:**

- **Input:** text = "leetcode"
- **Output:** 0

**Constraints:**

- `1 <= text.length <= 10⁴`
- `text` consists of lower case English letters only.


**Note:** This question is the same as [2287: Rearrange Characters to Make Target String](https://leetcode.com/problems/rearrange-characters-to-make-target-string/description/).

**Hint:**
1. Count the frequency of letters in the given string.
2. Find the letter than can make the minimum number of instances of the word "balloon".


**Solution:**

**We** implement a character frequency-based solution that counts occurrences of each letter in the input string and determines the maximum number of "balloon" instances by finding the limiting character ratio. The solution efficiently handles up to 10,000 characters in O(n) time and O(1) space, using the minimum ratio of available letters to required letters as the answer.

## Approach

- **Character Counting**: Count the frequency of each character in the input string using `array_count_values()`.
- **Define Requirements**: Map each character in "balloon" to its required count (b:1, a:1, l:2, o:2, n:1).
- **Ratio Calculation**: For each required character, calculate how many complete "balloon" words can be formed by dividing available count by required count.
- **Find Minimum**: The maximum number of instances is limited by the character with the smallest ratio, as it becomes the bottleneck.
- **Early Exit**: If any required character is missing entirely, return 0 immediately.

Let's implement this solution in PHP: **[1189. Maximum Number of Balloons](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001189-maximum-number-of-balloons/solution.php)**

```php
<?php
/**
 * @param String $text
 * @return Integer
 */
function maxNumberOfBalloons(string $text): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxNumberOfBalloons("nlaebolko") . "\n";               // Output: 1
echo maxNumberOfBalloons("loonbalxballpoon") . "\n";        // Output: 2
echo maxNumberOfBalloons("leetcode") . "\n";                // Output: 0
?>
```

### Explanation:

- **Why the limiting factor works**: Each "balloon" needs specific quantities of each letter. The letter with the fewest available "sets" determines how many complete words can be formed.
- **Special handling for 'l' and 'o'**: These appear twice in "balloon", so their available counts must be divided by 2 to get the number of complete words possible.
- **Integer division is sufficient**: We use integer division (`intdiv`) since we can only form complete words—partial words don't count.
- **Real-world analogy**: Imagine building sandwiches where "balloon" is the recipe. Even if you have 100 pieces of bread, you can only make as many sandwiches as your least available ingredient allows.
- **Edge case handling**: If `text` is empty or missing any required letter, the function correctly returns 0 since no "balloon" can be formed.

## Complexity Analysis

- **Time Complexity**: _**O(n)**_ — where n is the length of `text`. We iterate through the string once to count frequencies, then iterate through a constant number of required characters (5 distinct letters).
- **Space Complexity**: _**O(1)**_ — the frequency array stores at most 26 lowercase English letters, and the required array has a fixed size. Memory usage is constant regardless of input size.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**