2558\. Take Gifts From the Richest Pile

**Difficulty:** Easy

**Topics:** `Array`, `Heap (Priority Queue)`, `Simulation`

You are given an integer array `gifts` denoting the number of gifts in various piles. Every second, you do the following:

- Choose the pile with the maximum number of gifts.
- If there is more than one pile with the maximum number of gifts, choose any.
- Leave behind the floor of the square root of the number of gifts in the pile. Take the rest of the gifts.

Return _the number of gifts remaining after `k` seconds_.

**Example 1:**

- **Input:** gifts = [25,64,9,4,100], k = 4
- **Output:** 29
- **Explanation:** The gifts are taken in the following way:
  - In the first second, the last pile is chosen and 10 gifts are left behind.
  - Then the second pile is chosen and 8 gifts are left behind.
  - After that the first pile is chosen and 5 gifts are left behind.
  - Finally, the last pile is chosen again and 3 gifts are left behind.
    The final remaining gifts are [5,8,9,4,3], so the total number of gifts remaining is 29.

**Example 2:**

- **Input:** gifts = [1,1,1,1], k = 4
- **Output:** 4
- **Explanation:** In this case, regardless which pile you choose, you have to leave behind 1 gift in each pile.
  That is, you can't take any pile with you.
  So, the total gifts remaining are 4.



**Constraints:**

- <code>1 <= gifts.length <= 10<sup>3</sup></code>
- <code>1 <= gifts[i] <= 10<sup>9</sup></code>
- <code>1 <= k <= 10<sup>3</sup></code>


**Hint:**
1. How can you keep track of the largest gifts in the array
2. What is an efficient way to find the square root of a number?
3. Can you keep adding up the values of the gifts while ensuring they are in a certain order?
4. Can we use a priority queue or heap here?



**Solution:**

We can utilize a max-heap (priority queue) since we need to repeatedly pick the pile with the maximum number of gifts. A max-heap will allow us to efficiently access the largest pile in constant time and update the heap after taking gifts from the pile.

### Approach:

1. **Use a Max-Heap:**
   - Since we need to repeatedly get the pile with the maximum number of gifts, a max-heap (priority queue) is ideal. In PHP, we can use `SplPriorityQueue`, which is a priority queue that by default works as a max-heap.
   - To simulate a max-heap, we will insert the number of gifts as a negative value, since `SplPriorityQueue` is a min-heap by default. By inserting negative values, the smallest negative value will represent the largest original number.

2. **Process Each Second:**
   - In each second, pop the pile with the maximum number of gifts from the heap.
   - Take all the gifts except the floor of the square root of the number of gifts in that pile.
   - Push the modified pile back into the heap.

3. **Termination:**
   - We stop after `k` seconds or once we've processed all the seconds.

Let's implement this solution in PHP: **[2558. Take Gifts From the Richest Pile](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002558-take-gifts-from-the-richest-pile/solution.php)**

```php
<?php
/**
 * @param Integer[] $gifts
 * @param Integer $k
 * @return Integer
 */
function pickGifts($gifts, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$gifts1 = [25, 64, 9, 4, 100];
$k1 = 4;
echo pickGifts($gifts1, $k1) . "\n"; // Output: 29

$gifts2 = [1, 1, 1, 1];
$k2 = 4;
echo pickGifts($gifts2, $k2) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Heap Initialization**:
   - `SplPriorityQueue` is used to simulate a max-heap. The `insert` method allows us to push elements into the heap with a priority.

2. **Processing the Largest Pile**:
   - For `k` iterations, the largest pile is extracted using `extract`.
   - The number of gifts left behind is calculated as the floor of the square root of the current largest pile using `floor(sqrt(...))`.
   - The reduced pile is re-inserted into the heap.

3. **Summing Remaining Gifts**:
   - After the `k` operations, all elements in the heap are extracted and summed up to get the total number of remaining gifts.

4. **Edge Cases**:
   - If `gifts` is empty, the result is `0`.
   - If `k` is larger than the number of operations possible, the algorithm gracefully handles it.

### Time Complexity:

- **Heap operations (insert and extract)**: Each heap operation (insertion and extraction) takes _**O(log n)**_, where _**n**_ is the number of piles.
- **Looping through `k` operations**: We perform _**k**_ operations, each involving heap extraction and insertion, both taking _**O(log n)**_.

Thus, the total time complexity is _**O(k log n)**_, where _**n**_ is the number of piles and _**k**_ is the number of seconds.

### Example Walkthrough:

For the input:

```php
$gifts = [25, 64, 9, 4, 100];
$k = 4;
```

1. Initially, the priority queue has the piles: `[25, 64, 9, 4, 100]`.
2. After 1 second: Choose 100, leave 10 behind. The remaining gifts are: `[25, 64, 9, 4, 10]`.
3. After 2 seconds: Choose 64, leave 8 behind. The remaining gifts are: `[25, 8, 9, 4, 10]`.
4. After 3 seconds: Choose 25, leave 5 behind. The remaining gifts are: `[5, 8, 9, 4, 10]`.
5. After 4 seconds: Choose 10, leave 3 behind. The remaining gifts are: `[5, 8, 9, 4, 3]`.

The sum of the remaining gifts is _**5 + 8 + 9 + 4 + 3 = 29**_.

This approach efficiently solves the problem using a max-heap and performs well within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
