2125\. Number of Laser Beams in a Bank

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `String`, `Matrix`, `Weekly Contest 274`

Anti-theft security devices are activated inside a bank. You are given a `0-indexed` binary string array `bank` representing the floor plan of the bank, which is an `m x n` 2D matrix. `bank[i]` represents the `iᵗʰ` row, consisting of `'0'`s and `'1'`s. `'0'` means the cell is empty, while `'1'` means the cell has a security device.

There is `one` laser beam between any `two` security devices `if both` conditions are met:

- The two devices are located on two `different rows`: `r₁` and `r₂`, where `r₁ < r₂`.
- For `each` row `i` where `r₁ < i < r₂`, there are `no security devices` in the `iᵗʰ` row.

Laser beams are independent, i.e., one beam does not interfere nor join with another.

Return _the total number of laser beams in the bank_.

**Example 1:**

![laser1](https://assets.leetcode.com/uploads/2021/12/24/laser1.jpg)

- **Input:** bank = ["011001","000000","010100","001000"]
- **Output:** 8
- **Explanation:** Between each of the following device pairs, there is one beam. In total, there are 8 beams:
  * bank[0][1] -- bank[2][1]
  * bank[0][1] -- bank[2][3]
  * bank[0][2] -- bank[2][1]
  * bank[0][2] -- bank[2][3]
  * bank[0][5] -- bank[2][1]
  * bank[0][5] -- bank[2][3]
  * bank[2][1] -- bank[3][2]
  * bank[2][3] -- bank[3][2]
  Note that there is no beam between any device on the 0ᵗʰ row with any on the 3ʳᵈ row.
  This is because the 2ⁿᵈ row contains security devices, which breaks the second condition.

**Example 2:**

![laser2](https://assets.leetcode.com/uploads/2021/12/24/laser2.jpg)

- **Input:** bank = ["000","111","000"]
- **Output:** 0
- **Explanation:** There does not exist two devices located on two different rows.

**Constraints:**

- `m == bank.length`
- `n == bank[i].length`
- `1 <= m, n <= 500`
- `bank[i][j]` is either `'0'` or `'1'`.



**Hint:**
1. What is the commonality between security devices on the same row?
2. Each device on the same row has the same number of beams pointing towards the devices on the next row with devices.
3. If you were given an integer array where each element is the number of security devices on each row, can you solve it?
4. Convert the input to such an array, skip any row with no security device, then find the sum of the product between adjacent elements.



**Similar Questions:**
1. [73. Set Matrix Zeroes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000073-set-matrix-zeroes)






**Solution:**

We need to calculate the total number of laser beams between security devices in different rows of a bank's floor plan. The laser beams can only exist between two devices in different rows if there are no security devices in any row between them.

### Approach

1. **Problem Analysis**: The key observation is that laser beams can only exist between consecutive rows that have security devices, with no intermediate rows containing devices. This means we can multiply the number of devices in one row by the number of devices in the next consecutive row that has devices, and sum these products for all such consecutive pairs.
2. **Insight**: By iterating through each row and counting the number of security devices (represented by '1's), we can maintain a running total. Whenever we encounter a row with devices, we multiply its device count with the count from the previous row that had devices, and add this to our total. This efficiently computes the required number of laser beams without needing to store intermediate results.

Let's implement this solution in PHP: **[1579. Remove Max Number of Edges to Keep Graph Fully Traversable](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002125-number-of-laser-beams-in-a-bank/solution.php)**

```php
<?php
/**
 * @param String[] $bank
 * @return Integer
 */
function numberOfBeams($bank) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases

echo numberOfBeams(["011001","000000","010100","001000"]) . PHP_EOL; // Output: 8
echo numberOfBeams(["000","111","000"]) . PHP_EOL; // Output: 0
?>
```

### Explanation:

1. **Initialization**: We start by initializing `totalBeams` to 0, which will accumulate the number of laser beams, and `prevCount` to 0, which keeps track of the number of devices in the previous row that had devices.
2. **Processing Each Row**: For each row in the bank, we count the number of '1's using `substr_count`. If this count is greater than 0, we multiply it by `prevCount` (the count from the last row with devices) and add the result to `totalBeams`. We then update `prevCount` to the current row's device count.
3. **Result**: After processing all rows, `totalBeams` contains the total number of laser beams, which is returned.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**