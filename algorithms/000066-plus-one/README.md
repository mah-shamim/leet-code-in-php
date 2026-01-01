66\. Plus One

**Difficulty:** Easy

**Topics:** `Array`, `Math`

You are given a **large integer** represented as an integer array `digits`, where each `digits[i]` is the `iᵗʰ` digit of the integer. The digits are ordered from most significant to least significant in left-to-right order. The large integer does not contain any leading `0`'s.

Increment the large integer by one and return _the resulting array of digits_.

**Example 1:**

- **Input:** digits = [1,2,3]
- **Output:** [1,2,4]
- **Explanation:** The array represents the integer 123.
  Incrementing by one gives 123 + 1 = 124.
  Thus, the result should be [1,2,4].

**Example 2:**

- **Input:** digits = [4,3,2,1]
- **Output:** [4,3,2,2]
- **Explanation:** The array represents the integer 4321.
  Incrementing by one gives 4321 + 1 = 4322.
  Thus, the result should be [4,3,2,2].

**Example 3:**

- **Input:** digits = [9]
- **Output:** [1,0]
- **Explanation:** The array represents the integer 9.
  Incrementing by one gives 9 + 1 = 10.
  Thus, the result should be [1,0].

**Constraints:**

- `1 <= digits.length <= 100`
- `0 <= digits[i] <= 9`
- `digits` does not contain any leading `0`'s.



**Similar Questions:**
1. [000043. Multiply Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000043-multiply-strings)
2. [000067. Add Binary](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000067-add-binary)
3. [000369. Plus One Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000369-plus-one-linked-list)
4. [000989. Add to Array-Form of Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000989-add-to-array-form-of-integer)
5. [002571. Minimum Operations to Reduce an Integer to 0](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002571-minimum-operations-to-reduce-an-integer-to-0)






**Solution:**

We are given an array of digits representing a large integer. We need to add one to this integer and return the resulting array of digits.

## Approach

- Start from the least significant digit (last element of the array)
- Add 1 to this digit and handle any carry that might result
- Move leftwards through the array, propagating any carries
- If all digits become 0 (like 999 → 000 with a carry), prepend a 1 to the array
- Return the resulting array

Let's implement this solution in PHP: **[0066. Plus One](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000066-plus-one/solution.php)**

```php
<?php
/**
 * @param Integer[] $digits
 * @return Integer[]
 */
function plusOne($digits) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo plusOne([1,2,3]) . "\n";       // Output: [1,2,4]
echo plusOne([4,3,2,1]) . "\n";     // Output: [4,3,2,2]
echo plusOne([9]) . "\n";           // Output: [1,0]
?>
```

### Explanation:

- The problem requires incrementing a large integer represented as an array of digits by one
- Since we're only adding 1, we can simulate the addition with carry propagation
- We use a carry variable initialized to 1 (the value we're adding)
- Starting from the last digit, we add the carry to the current digit
- The new digit becomes `sum % 10` and the carry becomes `floor(sum / 10)`
- If the carry becomes 0 at any point, we can return immediately since no further changes are needed
- After processing all digits, if there's still a carry, we prepend it to the array
- This approach handles edge cases like `[9,9]` → `[1,0,0]` correctly

### Complexity

- **Time Complexity:** O(n) in the worst case, where n is the length of the array. We traverse the array at most once.
- **Space Complexity:** O(1) for the first approach, O(n) for the second if we consider the space for the result array (though both return a new array in the worst case).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**