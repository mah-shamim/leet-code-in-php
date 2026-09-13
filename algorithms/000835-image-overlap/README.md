835\. Image Overlap

**Difficulty:** Medium

**Topics:** `Senior Staff`, `Array`, `Matrix`, `Weekly Contest 84
`

You are given two images, `img1` and `img2`, represented as binary, square matrices of size `n x n`. A binary matrix has only `0`s and `1`s as values.

We **translate** one image however we choose by sliding all the `1` bits left, right, up, and/or down any number of units. We then place it on top of the other image. We can then calculate the **overlap** by counting the number of positions that have a `1` in **both** images.

Note also that a translation does **not** include any kind of rotation. Any `1` bits that are translated outside the matrix borders are erased.

Return _the largest possible overlap_.

**Example 1:**

![overlap1](https://assets.leetcode.com/uploads/2020/09/09/overlap1.jpg)

- **Input:** img1 = [[1,1,0],[0,1,0],[0,1,0]], img2 = [[0,0,0],[0,1,1],[0,0,1]]
- **Output:** 3
- **Explanation:** 
  - We translate img1 to right by 1 unit and down by 1 unit.
    ![overlap_step1](https://assets.leetcode.com/uploads/2020/09/09/overlap_step1.jpg)
  - The number of positions that have a 1 in both images is 3 (shown in red).
    ![overlap_step2](https://assets.leetcode.com/uploads/2020/09/09/overlap_step2.jpg)

**Example 2:**

- **Input:** img1 = [[1]], img2 = [[1]]
- **Output:** 1

**Example 3:**

- **Input:** img1 = [[0]], img2 = [[0]]
- **Output:** 0

**Example 4:**

- **Input:** img1 = [[1,0],[0,0]], img2 = [[0,0],[0,1]]
- **Output:** 1

**Example 5:**

- **Input:** img1 = [[1,1],[1,1]], img2 = [[1,1],[1,1]]
- **Output:** 4

**Example 6:**

- **Input:** img1 = [[1,0],[0,0]], img2 = [[0,0],[0,1]]
- **Output:** 1

**Example 7:**

- **Input:** img1 = [[0,0],[0,0]], img2 = [[1,1],[1,1]]
- **Output:** 0

**Example 8:**

- **Input:** img1 = [[0]], img2 = [[1]]
- **Output:** 0

**Example 9:**

- **Input:** img1 = [[1,1,1],[1,1,1],[1,1,1]], img2 = [[0,0,0],[0,1,1],[0,1,1]]
- **Output:** 4

**Constraints:**

- `n == img1.length == img1[i].length`
- `n == img2.length == img2[i].length`
- `1 <= n <= 30`
- `img1[i][j]` is either `0` or `1`.
- `img2[i][j]` is either `0` or `1`.



**Solution:**

We solve the image overlap problem by identifying all positions of `1`s in both images, then computing the translation vectors that align each `1` in `img1` with each `1` in `img2`. By counting how many pairs share the same translation vector, we determine the maximum possible overlap without explicitly simulating every possible shift.

## Approach

- **Extract `1` positions:** Traverse both matrices and store the coordinates of every cell containing `1` into separate lists (`ones1` and `ones2`).
- **Compute translation vectors:** For every pair `(pos1, pos2)` where `pos1` is from `img1` and `pos2` is from `img2`, calculate the shift `(dx, dy) = (pos2[0] - pos1[0], pos2[1] - pos1[1])`.
- **Count frequency of each vector:** Use a hash map keyed by `"dx,dy"` to count how many pairs share the same translation. The value for a key represents how many `1`s from `img1` would overlap with `1`s from `img2` under that translation.
- **Track maximum:** Continuously update the maximum overlap seen so far.
- **Return result:** The highest count is the largest possible overlap.

Let's implement this solution in PHP: **[835. Image Overlap](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000835-image-overlap/solution.php)**

```php
<?php
/**
 * @param Integer[][] $img1
 * @param Integer[][] $img2
 * @return Integer
 */
function largestOverlap(array $img1, array $img2): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo largestOverlap([[1, 1, 0], [0, 1, 0], [0, 1, 0]], [[0, 0, 0], [0, 1, 1], [0, 1, 1]]) . "\n";       // Output: 3
echo largestOverlap([[1]], [[1]]) . "\n";                                                               // Output: 1
echo largestOverlap([[0]], [[0]]) . "\n";                                                               // Output: 0
echo largestOverlap([[1,0],[0,0]], [[0,0],[0,1]]) . "\n";                                               // Output: 1
echo largestOverlap([[1,1],[1,1]], [[1,1],[1,1]]) . "\n";                                               // Output: 4
echo largestOverlap([[1,0],[0,0]], [[0,0],[0,1]]) . "\n";                                               // Output: 1
echo largestOverlap([[0,0],[0,0]], [[1,1],[1,1]]) . "\n";                                               // Output: 0
echo largestOverlap([[0]], [[1]]) . "\n";                                                               // Output: 0
echo largestOverlap([[1,1,1],[1,1,1],[1,1,1]], [[0,0,0],[0,1,1],[0,1,1]]) . "\n";                       // Output: 4
?>
```

### Explanation:

- **Why translation vectors work:** Shifting `img1` by `(dx, dy)` moves each `1` at `(i, j)` to `(i+dx, j+dy)`. If this new position coincides with a `1` in `img2` at `(i', j')`, then `dx = i' - i` and `dy = j' - j`. Thus, each aligned pair defines a unique translation.
- **Grouping by vector:** Multiple pairs can share the same `(dx, dy)`. The number of pairs with the same vector equals the number of overlapping `1`s for that shift.
- **Ignoring invalid shifts:** Translations that push `1`s outside the matrix borders automatically produce no overlap because those positions cannot match any `1` in the other image. Our counting method only considers pairs that can actually align, so invalid shifts naturally yield lower counts.
- **Efficiency:** Instead of checking all `(2n-1)²` possible shifts (up to ~3481 for n=30), we only consider pairs of `1`s. In the worst case (all ones), there are `n²` ones per image, giving `n⁴` pairs — for n=30, that's 810,000 pairs, which is manageable.

## Complexity Analysis

- **Time Complexity:** `O(n⁴)` in the worst case, where `n` is the matrix dimension.
    - Extracting ones: `O(n²)`.
    - Pairwise translation computation: `O(k1 * k2)` where `k1` and `k2` are the number of ones in `img1` and `img2`. In the worst case (all ones), `k1 = k2 = n²`, so `O(n⁴)`.
    - Hash map operations: `O(1)` average per pair.
- **Space Complexity:** `O(n⁴)` in the worst case for the hash map storing up to `k1 * k2` distinct translation vectors. In practice, distinct vectors are bounded by `(2n-1)²`, so space is `O(n²)` for the map plus `O(n²)` for the position lists.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**