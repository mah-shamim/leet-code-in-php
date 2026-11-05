1385\. Find the Distance Value Between Two Arrays

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Two Pointers`, `Binary Search`, `Sorting`, `Biweekly Contest 22`

Given two integer arrays `arr1` and `arr2`, and the integer `d`, return _the distance value between the two arrays_.

The distance value is defined as the number of elements` arr1[i]` such that there is not any element `arr2[j]` where `|arr1[i]-arr2[j]| <= d`.

**Example 1:**

- **Input:** arr1 = [4,5,8], arr2 = [10,9,1,8], d = 2
- **Output:** 2
- **Explanation:**  
  - For arr1[0]=4 we have:
  ```
      |4-10|=6 > d=2
      |4-9|=5 > d=2
      |4-1|=3 > d=2
      |4-8|=4 > d=2
  ```
  - For arr1[1]=5 we have:
  ```
      |5-10|=5 > d=2
      |5-9|=4 > d=2
      |5-1|=4 > d=2
      |5-8|=3 > d=2
  ```
  - For arr1[2]=8 we have:
  ```
      |8-10|=2 <= d=2
      |8-9|=1 <= d=2
      |8-1|=7 > d=2
      |8-8|=0 <= d=2
  ```

**Example 2:**

- **Input:** arr1 = [1,4,2,3], arr2 = [-4,-3,6,10,20,30], d = 3
- **Output:** 2

**Example 3:**

- **Input:** arr1 = [2,1,100,3], arr2 = [-5,-2,10,-3,7], d = 6
- **Output:** 1

**Example 4:**

- **Input:** arr1 = [1], arr2 = [1], d = 0
- **Output:** 0

**Example 5:**

- **Input:** arr1 = [1], arr2 = [2], d = 1
- **Output:** 0

**Example 6:**

- **Input:** arr1 = [1], arr2 = [5], d = 1
- **Output:** 1

**Example 7:**

- **Input:** arr1 = [10,20], arr2 = [1,2,3], d = 3
- **Output:** 2

**Example 8:**

- **Input:** arr1 = [-1000], arr2 = [1000], d = 100
- **Output:** 1

**Example 9:**

- **Input:** arr1 = [0,5,10], arr2 = [0,5,10], d = 0
- **Output:** 0

**Constraints:**

- `1 <= arr1.length, arr2.length <= 500`
- `-1000 <= arr1[i], arr2[j] <= 1000`
- `0 <= d <= 100`


**Hint:**

1. Sort `'arr2'` and use binary search to get the closest element for each `'arr1[i]'`, it gives a time complexity of `O(nlogn)`.


**Solution:**

We solve this by sorting `arr2` once and, for each element in `arr1`, using binary search to find its insertion position. The only elements in `arr2` that could possibly satisfy `|arr1[i] - arr2[j]| <= d` are the closest ones on either side of `arr1[i]` (the predecessor and successor). If neither of those two neighbors is within distance `d`, then no element in `arr2` is, so we count `arr1[i]` toward the distance value.

## Approach

- Sort `arr2` in ascending order so we can binary search it.
- Iterate over every value `x` in `arr1`.
- For each `x`, binary search `arr2` for the **first index `pos`** where `arr2[pos] >= x` (the lower bound).
- Only two candidates can be "closest" to `x`:
  - `arr2[pos]` — the smallest element `>= x` (right neighbor).
  - `arr2[pos - 1]` — the largest element `< x` (left neighbor).
- If the absolute difference between `x` and **both** candidates is `> d`, increment the distance value.
- Return the total count.

Let's implement this solution in PHP: **[1385. Find the Distance Value Between Two Arrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001385-find-the-distance-value-between-two-arrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr1
 * @param Integer[] $arr2
 * @param Integer $d
 * @return Integer
 */
function findTheDistanceValue(array $arr1, array $arr2, int $d): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findTheDistanceValue([4,5,8], [10,9,1,8], 2) . "\n";                               // Output: 2
echo findTheDistanceValue([1,4,2,3], [-4,-3,6,10,20,30], 3) . "\n";                     // Output: 2
echo findTheDistanceValue([2,1,100,3], [-5,-2,10,-3,7], 6) . "\n";                      // Output: 1
echo findTheDistanceValue([1], [1], 0) . "\n";                                          // Output: 0
echo findTheDistanceValue([1], [2], 1) . "\n";                                          // Output: 0
echo findTheDistanceValue([1], [5], 1) . "\n";                                          // Output: 1
echo findTheDistanceValue([10,20], [1,2,3], 3) . "\n";                                  // Output: 2
echo findTheDistanceValue([-1000], [1000], 100) . "\n";                                 // Output: 1
echo findTheDistanceValue([0,5,10], [0,5,10], 0) . "\n";                                // Output: 0
?>
```

## Explanation

- **Why only two neighbors matter:** After sorting, elements are monotonic. If `x` is between `arr2[k-1]` and `arr2[k]`, then every element to the left is at least as far as `arr2[k-1]`, and every element to the right is at least as far as `arr2[k]`. So checking the two bracketing values is sufficient.
- **Binary search for lower bound:** The loop narrows `left`/`right` until `pos` points to the first element `>= x`. If no such element exists, `pos == n` (meaning `x` is larger than all of `arr2`).
- **Right-side check:** If `pos < n`, we test `abs(x - arr2[pos]) <= d`. If it fails, `x` is invalid immediately.
- **Left-side check:** If still valid and `pos > 0`, we test `abs(x - arr2[pos - 1]) <= d`. If that also fails, `x` is valid.
- **Counting:** Only when neither neighbor triggers the condition does `distanceValue` increase — this matches the definition exactly.

## Complexity Analysis

- **Time:** `O(m log m + n log m)` where `n = arr1.length`, `m = arr2.length` — `O(m log m)` to sort `arr2`, and `O(log m)` binary search per `arr1` element.
- **Space:** `O(1)` extra space (excluding the input; `sort` in PHP is in-place / O(log m) stack).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**