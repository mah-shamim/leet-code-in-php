1304\. Find N Unique Integers Sum up to Zero

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Weekly Contest 169`

Given an integer `n`, return _**any** array containing `n` **unique** integers such that they add up to `0`_.

**Example 1:**

- **Input:** n = 5
- **Output:** [-7,-1,1,3,4]
- **Explanation:** These arrays also are accepted [-5,-1,1,2,3] , [-3,-1,2,-2,4].

**Example 2:**

- **Input:** n = 3
- **Output:** [-1,0,1]

**Example 3:**

- **Input:** n = 1
- **Output:** [0]

**Constraints:**

- `1 <= n <= 1000`


**Hint:**
1. Return an array where the values are symmetric. (+x , -x).
2. If n is odd, append value 0 in your returned array.






**Solution:**

We need to generate an array of `n` unique integers such that their sum is zero. The solution involves creating pairs of positive and negative integers that cancel each other out. If `n` is odd, we include zero to ensure the sum remains zero.

### Approach
1. **Check for Odd `n`**: If `n` is odd, we include zero in the result array. This is because zero does not affect the sum and helps in making the total number of elements odd.
2. **Generate Pairs**: For the remaining even number of elements (if `n` was odd, we now have `n-1` elements left), we generate pairs of positive and negative integers. For each integer `i` from `1` to `n/2`, we add `i` and `-i` to the result array. These pairs sum to zero, ensuring the overall sum of the array is zero.

Let's implement this solution in PHP: **[1304. Find N Unique Integers Sum up to Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001304-find-n-unique-integers-sum-up-to-zero/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer[]
 */
function sumZero($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(sumZero(5)); // Example output: [1, -1, 2, -2, 0]
print_r(sumZero(3)); // Example output: [1, -1, 0]
print_r(sumZero(1)); // Example output: [0]
?>
```

### Explanation:

1. **Initialization**: We start by initializing an empty array `$result` to store the integers.
2. **Handling Odd `n`**: If `n` is odd, we add `0` to the result array and decrement `n` by one. This ensures that the remaining `n` is even, allowing us to form pairs of positive and negative integers.
3. **Generating Pairs**: We loop from `1` to `n/2`. In each iteration, we add the current integer `i` and its negative counterpart `-i` to the result array. These pairs cancel each other out, contributing zero to the total sum.
4. **Return Result**: The resulting array contains `n` unique integers (including zero if `n` was initially odd) that sum to zero.

This approach efficiently generates the required array by leveraging symmetric pairs of integers and zero, ensuring correctness and simplicity. The time complexity is O(n), as we iterate through each element once, and the space complexity is O(n) to store the result array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**




