11\. Container With Most Water

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Greedy`

You are given an integer array `height` of length `n`. There are `n` vertical lines drawn such that the two endpoints of the <code>i<sup>th</sup></code> line are `(i, 0)` and `(i, height[i])`.

Find two lines that together with the x-axis form a container, such that the container contains the most water.

Return _the maximum amount of water a container can store_.

**Notice** that you may not slant the container.

**Example 1:**

![question_11](https://s3-lc-upload.s3.amazonaws.com/uploads/2018/07/17/question_11.jpg)

- **Input:** height = [1,8,6,2,5,4,8,3,7]
- **Output:** 49
- **Explanation:** The above vertical lines are represented by array [1,8,6,2,5,4,8,3,7]. In this case, the max area of water (blue section) the container can contain is 49.

**Example 2:**

- **Input:** height = [1,1]
- **Output:** 1

**Constraints:**

- `n == height.length`
- `2 <= n <= 10⁵`
- `0 <= height[i] <= 10⁴`



**Hint:**
1. If you simulate the problem, it will be O(n²) which is not efficient.
2. Try to use two-pointers. Set one pointer to the left and one to the right of the array. Always move the pointer that points to the lower line.
3. How can you calculate the amount of water at each step?


**Similar Questions:**
1. [42. Trapping Rain Water](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000042-trapping-rain-water)
2. [2517. Maximum Tastiness of Candy Basket](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002517-maximum-tastiness-of-candy-basket)
3. [2560. House Robber IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002560-house-robber-iv)





**Solution:**

We need to find the maximum amount of water that can be contained between two vertical lines in an array, where the amount of water is determined by the distance between the lines and the height of the shorter line. The solution involves using the two-pointer technique to efficiently find the maximum area without checking all possible pairs, which would be inefficient.

### Approach
1. **Two-Pointer Technique**: We use two pointers, one starting at the beginning (left) and the other at the end (right) of the array.
2. **Calculate Area**: For each pair of lines pointed to by the left and right pointers, calculate the area formed between them. The area is computed as the product of the distance between the lines (right index minus left index) and the height of the shorter line.
3. **Move Pointers**: After calculating the area, move the pointer pointing to the shorter line towards the other pointer. This is because moving the pointer of the shorter line might lead to a larger area by potentially finding a taller line, while moving the taller line would not help as the area is limited by the shorter line.
4. **Track Maximum Area**: Keep track of the maximum area encountered during the iteration.

Let's implement this solution in PHP: **[11. Container With Most Water](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000011-container-with-most-water/solution.php)**

```php
<?php
/**
 * @param Integer[] $height
 * @return Integer
 */
function maxArea($height) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
echo maxArea([1,8,6,2,5,4,8,3,7]) . "\n"; // Output: 49

// Example 2
echo maxArea([1,1]) . "\n"; // Output: 1
?>
```

### Explanation:

1. **Initialization**: Start with the left pointer at index 0 and the right pointer at the last index of the array. Initialize `maxArea` to 0 to keep track of the maximum area found.
2. **Loop Until Pointers Meet**: Continue looping as long as the left pointer is less than the right pointer.
3. **Calculate Current Area**: For each pair of lines, compute the area using the formula `(right - left) * min(height[left], height[right])`.
4. **Update Maximum Area**: Compare the current area with the stored maximum area and update `maxArea` if the current area is larger.
5. **Move Pointers**: Move the pointer pointing to the shorter line towards the other pointer. This step ensures that we explore potentially larger areas by moving the shorter line inward.
6. **Return Result**: After the loop completes, return the maximum area found.

This approach efficiently narrows down the possible pairs of lines to check, ensuring optimal performance with a time complexity of O(n), where n is the number of elements in the array. The space complexity is O(1) as we only use a few variables regardless of the input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**