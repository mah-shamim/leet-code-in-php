2226\. Maximum Candies Allocated to K Children

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`

You are given a **0-indexed** integer array `candies`. Each element in the array denotes a pile of candies of size `candies[i]`. You can divide each pile into any number of **sub piles**, but you **cannot** merge two piles together.

You are also given an integer `k`. You should allocate piles of candies to `k` children such that each child gets the **same** number of candies. Each child can be allocated candies from **only one** pile of candies and some piles of candies may go unused.

Return _the **maximum number of candies** each child can get_.

**Example 1:**

- **Input:** candies = [5,8,6], k = 3
- **Output:** 5
- **Explanation:** We can divide candies[1] into 2 piles of size 5 and 3, and candies[2] into 2 piles of size 5 and 1. We now have five piles of candies of sizes 5, 5, 3, 5, and 1. We can allocate the 3 piles of size 5 to 3 children. It can be proven that each child cannot receive more than 5 candies.

**Example 2:**

- **Input:** candies = [2,5], k = 11
- **Output:** 0
- **Explanation:** There are 11 children but only 7 candies in total, so it is impossible to ensure each child receives at least one candy. Thus, each child gets no candy and the answer is 0.



**Constraints:**

- <code>1 <= candies.length <= 10<sup>5</sup></code>
- <code>1 <= candies[i] <= 10<sup>7</sup></code>
- <code>1 <= k <= 10<sup>12</sup></code>


**Hint:**
1. For a fixed number of candies c, how can you check if each child can get c candies?
2. Use binary search to find the maximum c as the answer.



**Solution:**

We need to determine the maximum number of candies each child can get such that each child receives the same number of candies from a single pile (or sub-pile). The solution involves using binary search to efficiently find this maximum number of candies.

### Approach
1. **Problem Analysis**: The key insight is to recognize that for a given number of candies `c`, we can check if it's possible to distribute `c` candies to each of `k` children by summing the number of sub-piles each pile can contribute (each sub-pile must have at least `c` candies). This sum must be at least `k` for the distribution to be possible.
2. **Binary Search**: We use binary search to efficiently find the maximum value of `c`. The search range is from 1 to the maximum pile size in the candies array.
3. **Early Termination**: During each iteration of the binary search, if we accumulate enough sub-piles to meet the requirement `k`, we can terminate early to save computation time.

Let's implement this solution in PHP: **[2226. Maximum Candies Allocated to K Children](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002226-maximum-candies-allocated-to-k-children/solution.php)**

```php
<?php
/**
 * @param Integer[] $candies
 * @param Integer $k
 * @return Integer
 */
function maximumCandies($candies, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
echo maximumCandies([5,8,6], 3) . "\n"; // Output: 5
echo maximumCandies([2,5], 11) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Initial Check**: First, we check if the total number of candies is less than `k`. If so, it's impossible to distribute even one candy to each child, so we return 0.
2. **Binary Search Setup**: We initialize the binary search with `left` set to 1 and `right` set to the maximum pile size in the candies array.
3. **Mid Calculation**: For each midpoint `mid` during the binary search, we calculate the total number of sub-piles each pile can contribute when divided into `mid` candies.
4. **Check Feasibility**: If the total number of sub-piles is at least `k`, `mid` is a feasible solution, and we try for a higher value by adjusting the search range. If not, we adjust the range to look for a smaller value.
5. **Early Termination**: During the sum calculation, if we accumulate enough sub-piles early, we break out of the loop to save computation time.

This approach efficiently narrows down the possible values using binary search, ensuring we find the maximum number of candies each child can receive in logarithmic time relative to the maximum pile size, making it suitable for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**