42\. Trapping Rain Water

**Difficulty:** Hard

Given `n` non-negative integers representing an elevation map where the width of each bar is `1`, compute how much water it can trap after raining.

**Example 1:**

![rainwatertrap](https://assets.leetcode.com/uploads/2018/10/22/rainwatertrap.png)

- **Input:** height = [0,1,0,2,1,0,1,3,2,1,2,1]
- **Output:** 6
- **Explanation:** The above elevation map (black section) is represented by array [0,1,0,2,1,0,1,3,2,1,2,1]. In this case, 6 units of rain water (blue section) are being trapped.

**Example 2:**

- **Input:** height = [4,2,0,3,2,5]
- **Output:** 9

**Constraints:**

- `n == height.length`
- <code>1 <= n <= 2 * 10<sup>4</sup></code>
- <code>0 <= height[i] <= 10<sup>5</sup></code>



**Solution:**


To solve this problem, we can follow these steps:

1. **Initialize two pointers**: `left` starting at the beginning and `right` at the end of the elevation array.
2. **Track maximum heights**: Use `left_max` and `right_max` to track the maximum heights encountered from the left and right sides, respectively.
3. **Move pointers towards each other**: At each step, move the pointer with the smaller height inward and update the trapped water amount based on the minimum of `left_max` and `right_max`.


Let's implement this solution in PHP: **[42. Trapping Rain Water](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000042-trapping_rain_water/solution.php)**

```php
<?php
// Example usage:
$height = [0,1,0,2,1,0,1,3,2,1,2,1];
echo trap($height); // Output: 6

$height = [4,2,0,3,2,5];
echo trap($height); // Output: 9

?>
```

### Explanation:

1. **Initialize pointers and maximum heights**: Start with `left` at the beginning and `right` at the end of the `height` array. Also, initialize `left_max` and `right_max` to `0`.
2. **Traverse the array with two pointers**:
    - Compare `height[left]` and `height[right]`.
    - If `height[left]` is less than or equal to `height[right]`:
        - If `height[left]` is greater than or equal to `left_max`, update `left_max`.
        - Otherwise, calculate the water trapped at `left` and add to `water`.
        - Move `left` pointer one step to the right.
    - If `height[right]` is less than `height[left]`:
        - If `height[right]` is greater than or equal to `right_max`, update `right_max`.
        - Otherwise, calculate the water trapped at `right` and add to `water`.
        - Move `right` pointer one step to the left.
3. **Return the total trapped water**: Once the two pointers meet, the `water` variable holds the total amount of trapped rainwater.

This approach efficiently computes the amount of trapped rainwater by leveraging the two-pointer technique and avoids the need for additional space, making it optimal for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
