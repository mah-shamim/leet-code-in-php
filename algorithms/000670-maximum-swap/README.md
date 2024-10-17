670\. Maximum Swap

**Difficulty:** Medium

**Topics:** `Math`, `Greedy`

You are given an integer `num`. You can swap two digits at most once to get the maximum valued number.

Return _the maximum valued number you can get_.

**Example 1:**

- **Input:** num = 2736
- **Output:** 7236
- **Explanation:** Swap the number 2 and the number 7.

**Example 2:**

- **Input:** num = 9973
- **Output:** 9973
- **Explanation:** No swap.


**Constraints:**

- <code>0 <= num <= 10<sup>8</sup></code>


**Solution:**

We can follow a greedy approach. Here's a step-by-step explanation and the solution:

### Approach:

1. **Convert the Number to an Array**: Since digits need to be swapped, converting the number into an array of digits makes it easier to access and manipulate individual digits.
2. **Track the Rightmost Occurrence of Each Digit**: Store the rightmost position of each digit (0-9) in an array.
3. **Find the Best Swap Opportunity**: Traverse through the number's digits from left to right, and for each digit, check if there is a higher digit that appears later. If so, swap them to maximize the number.
4. **Perform the Swap and Break**: As soon as the optimal swap is found, perform the swap and break the loop.
5. **Convert the Array Back to a Number**: After the swap, convert the array of digits back to a number and return it.

Let's implement this solution in PHP: **[670. Maximum Swap](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000670-maximum-swap/solution.php)**

```php
<?php
/**
 * @param Integer $num
 * @return Integer
 */
function maximumSwap($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo maximumSwap(2736); // Output: 7236
echo maximumSwap(9973); // Output: 9973
?>
```

### Explanation:

- **Step 1:** `strval($num)` converts the integer into a string, and `str_split($numStr)` splits it into an array of digits.
- **Step 2:** The `last` array keeps track of the rightmost index of each digit from `0` to `9`.
- **Step 3:** We iterate through each digit and look for a larger digit that can be swapped.
- **Step 4:** If a suitable larger digit is found (that appears later in the number), the digits are swapped.
- **Step 5:** The modified array is converted back to a string and then to an integer using `intval()`.

### Complexity:
- **Time Complexity:** O(n), where `n` is the number of digits in `num`. This is because we make a pass through the number to fill the `last` array and another pass to find the optimal swap.
- **Space Complexity:** O(1) (ignoring the input size) since the `last` array is fixed with 10 elements.

This solution efficiently finds the maximum value by swapping digits only once, as required.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
