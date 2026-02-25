1356\. Sort Integers by The Number of 1 Bits

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Bit Manipulation`, `Sorting`, `Counting`, `Biweekly Contest 20`

You are given an integer array `arr`. Sort the integers in the array in ascending order by the number of `1`'s in their binary representation and in case of two or more integers have the same number of `1`'s you have to sort them in ascending order.

Return _the array after sorting it_.

**Example 1:**

- **Input:** arr = [0,1,2,3,4,5,6,7,8]
- **Output:** [0,1,2,4,8,3,5,6,7]
- **Explanation:** [0] is the only integer with 0 bits.
  [1,2,4,8] all have 1 bit.
  [3,5,6] have 2 bits.
  [7] has 3 bits.
  The sorted array by bits is [0,1,2,4,8,3,5,6,7]

**Example 2:**

- **Input:** arr = [1024,512,256,128,64,32,16,8,4,2,1]
- **Output:** [1,2,4,8,16,32,64,128,256,512,1024]
- **Explanation:** All integers have 1 bit in the binary representation, you should just sort them in ascending order.

**Example 3:**

- **Input:** arr = [42]
- **Output:** [42]
- **Explanation:** Only one element, no reordering needed.

**Example 4:**

- **Input:** arr = [0,0,0]
- **Output:** [0,0,0]
- **Explanation:** All have zero 1‑bits, order unchanged.

**Example 5:**

- **Input:** arr = [3,1,2,3]
- **Output:** [1,2,3,3]
- **Explanation:** 1 (1‑bit), 2 (1‑bit) → then 3 and 3 (both 2‑bits) sorted ascending.

**Example 6:**

- **Input:** arr = [100,200,300]
- **Output:** [100,200,300]
- **Explanation:** 100 (3 bits), 200 (3 bits), 300 (4 bits) → same bit group sorted ascending.

**Example 7:**

- **Input:** arr = [1023,512,255,128]
- **Output:** [128,512,255,1023]
- **Explanation:** 128 (1‑bit), 512 (1‑bit) → sorted: 128,512; then 255 (8‑bits); then 1023 (10‑bits).

**Example 8:**

- **Input:** arr = [10000]
- **Output:** [10000]
- **Explanation:** Single element with maximum allowed value.

**Example 9:**

- **Input:** arr = [7,8,6,5,4,3,2,1,0]
- **Output:** [0,1,2,4,8,3,5,6,7]
- **Explanation:** Same as Example 1 but input order reversed.

**Example 10:**

- **Input:** arr = [15,16,7,8]
- **Output:** [8,16,7,15]
- **Explanation:** 8 (1‑bit), 16 (1‑bit) → sorted: 8,16; 7 (3‑bits), 15 (4‑bits) but wait: 15 binary `1111` → 4 bits, 7 binary `111` → 3 bits, so order should be 8,16 (1‑bit), then 7 (3‑bits), then 15 (4‑bits). Expected: `[8,16,7,15]`.

**Constraints:**

- `1 <= arr.length <= 500`
- `0 <= arr[i] <= 10⁴`



**Hint:**
1. Simulate the problem. Count the number of `1`'s in the binary representation of each integer.
2. Sort by the number of `1`'s ascending and by the value in case of tie.



**Similar Questions:**
1. [2099. Find Subsequence of Length K With the Largest Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002099-find-subsequence-of-length-k-with-the-largest-sum)
2. [3011. Find if Array Can Be Sorted](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003011-find-if-array-can-be-sorted)






**Solution:**

We need to sort an array of integers first by the number of `1` bits in their binary representation, and then by their natural value if the bit counts are equal.

### Approach:

- **Count the bits:** For each integer in the array, convert it to a binary string (`decbin`) and count the occurrences of the character `'1'` (`substr_count`).
- **Build a parallel array:** Store these bit counts in a separate array, keeping the same order as the original numbers.
- **Multi‑key sort:** Use `array_multisort` to sort the original array first by the bit‑count array (ascending), then by the original values themselves (ascending). This respects the primary and secondary sorting rules.
- **Return the sorted array:** The input array is sorted in‑place and returned.

Let's implement this solution in PHP: **[1356. Sort Integers by The Number of 1 Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001356-sort-integers-by-the-number-of-1-bits/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer[]
 */
function sortByBits(array $arr): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sortByBits([0,1,2,3,4,5,6,7,8]) . "\n";                            // Output: [0,1,2,4,8,3,5,6,7]
echo sortByBits([1024,512,256,128,64,32,16,8,4,2,1]) . "\n";            // Output: [1,2,4,8,16,32,64,128,256,512,1024]
echo sortByBits([42]) . "\n";                                           // Output: [42]
echo sortByBits([0,0,0]) . "\n";                                        // Output: [0,0,0]
echo sortByBits([3,1,2,3]) . "\n";                                      // Output: [1,2,3,3]
echo sortByBits([100,200,300]) . "\n";                                  // Output: [100,200,300]
echo sortByBits([1023,512,255,128]) . "\n";                             // Output: [128,512,255,1023]
echo sortByBits([10000]) . "\n";                                        // Output: [10000]
echo sortByBits([7,8,6,5,4,3,2,1,0]) . "\n";                            // Output: [0,1,2,4,8,3,5,6,7]
echo sortByBits([15,16,7,8]) . "\n";                                    // Output: [8,16,7,15]
?>
```

### Explanation:

- The function `sortByBits` receives an array `$arr`.
- `array_map` iterates over `$arr` and applies an anonymous function that:
   1. Converts the number to binary using `decbin($num)`.
   2. Counts the `'1'` characters in that binary string with `substr_count(... , '1')`.
   3. Returns the count, which is stored in the new array `$bits`.
- Now we have two parallel arrays: `$arr` (original numbers) and `$bits` (their bit counts).
- `array_multisort($bits, SORT_ASC, $arr, SORT_ASC, $arr)` performs a stable, multi‑column sort:
   - First, it sorts both arrays by the `$bits` values in ascending order.
   - When bit counts are equal, it sorts by the original values in `$arr` (ascending).
   - The final `$arr` is overwritten with the correctly ordered result.
- The sorted array is returned.

### Complexity
- **Time Complexity**: _**O(n log n)**_ – dominated by the sorting step, where _**n**_ is the length of the array. Counting bits for each element is _**O(n * b)**_, where _**b**_ is the number of bits (at most `14` for `numbers ≤ 10⁴`), so the counting is linear and negligible compared to sorting.
- **Space Complexity**: _**O(n)**_ – we store the bit‑count array of size _**n**_. The sorting may require additional _**O(log n)**_ space depending on the implementation, but overall it is linear.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**