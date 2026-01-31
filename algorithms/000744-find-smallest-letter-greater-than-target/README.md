744\. Find Smallest Letter Greater Than Target

**Difficulty:** Easy

**Topics:** `Array`, `Binary Search`, `Weekly Contest 62`

You are given an array of characters `letters` that is sorted in **non-decreasing order**, and a character `target`. There are **at least two different** characters in `letters`.

Return _the smallest character in `letters` that is lexicographically greater than `target`_. If such a character does not exist, return the first character in `letters`.

**Example 1:**

- **Input:** letters = ["c","f","j"], target = "a"
- **Output:** "c"
- **Explanation:** The smallest character that is lexicographically greater than 'a' in letters is 'c'.

**Example 2:**

- **Input:** letters = ["c","f","j"], target = "c"
- **Output:** "f"
- **Explanation:** The smallest character that is lexicographically greater than 'c' in letters is 'f'.

**Example 3:**

- **Input:** letters = ["x","x","y","y"], target = "z"
- **Output:** "x"
- **Explanation:** There are no characters in letters that is lexicographically greater than 'z' so we return letters[0].

**Constraints:**

- `2 <= letters.length <= 10⁴`
- `letters[i]` is a lowercase English letter.
- `letters` is sorted in **non-decreasing** order.
- `letters` contains at least two different characters.
- `target` is a lowercase English letter.



**Hint:**
1. Try to find whether each of 26 next letters are in the given string array.


**Similar Questions:**
1. [2148. Count Elements With Strictly Smaller and Greater Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002148-count-elements-with-strictly-smaller-and-greater-elements)






**Solution:**

We need to find the smallest character in a sorted array that is lexicographically greater than a given target. If no such character exists, we return the first character in the array.

Since the array is sorted, we can use **binary search** to efficiently find the answer.

### Approach:

We perform a binary search to find the first character greater than the target. If we don't find any, we return the first character.

### Steps
1. Initialize two pointers: `left` at the start of the array and `right` at the end.
2. While `left` is less than or equal to `right`:
   - Calculate the middle index.
   - If the middle character is less than or equal to the target, move the `left` pointer to `mid + 1` (since we need a character greater than the target).
   - Otherwise, move the `right` pointer to `mid - 1` and update the potential answer.
3. After the loop, if we found a valid character, return it; otherwise, return the first character in the array.

Let's implement this solution in PHP: **[744. Find Smallest Letter Greater Than Target](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000744-find-smallest-letter-greater-than-target/solution.php)**

```php
<?php
/**
 * @param String[] $letters
 * @param String $target
 * @return String
 */
function nextGreatestLetter(array $letters, string $target): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo nextGreatestLetter(["c","f","j"], "a") . "\n";             // Output: c
echo nextGreatestLetter(["c","f","j"], "c") . "\n";             // Output: f
echo nextGreatestLetter(["x","x","y","y"], "z") . "\n";         // Output: x
echo nextGreatestLetter(["a","b","c","d"], "b") . "\n";         // Output: c
?>
```

### Explanation:
- **Binary Search**: We use binary search to efficiently locate the smallest character greater than the target. The array is sorted, so binary search reduces the time complexity to O(log n).
- **Pointer Movement**:
   - If the middle character is less than or equal to the target, we move the left pointer to `mid + 1` because we need a character greater than the target.
   - If the middle character is greater than the target, it's a potential answer. We store it and move the right pointer to `mid - 1` to see if there's a smaller valid character.
- **Default Result**: If no character greater than the target is found, we return the first character in the array as per the problem's requirement.

### Complexity

- **Time Complexity**: O(log n) where n is the length of the array, because we're using binary search
- **Space Complexity**: O(1), using only constant extra space

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**