1732\. Find the Highest Altitude

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Prefix Sum`, `Biweekly Contest 44`

There is a biker going on a road trip. The road trip consists of `n + 1` points at different altitudes. The biker starts his trip on point `0` with altitude equal `0`.

You are given an integer array `gain` of length `n` where `gain[i]` is the **net gain in altitude** between points `i` and `i + 1` for all (`0 <= i < n`). Return _the **highest altitude** of a point_.

**Example 1:**

- **Input:** gain = [-5,1,5,0,-7]
- **Output:** 1
- **Explanation:** The altitudes are [0,-5,-4,1,1,-6]. The highest is 1.

**Example 2:**

- **Input:** gain = [-4,-3,-2,-1,4,3,2]
- **Output:** 0
- **Explanation:** The altitudes are [0,-4,-7,-9,-10,-6,-3,-1]. The highest is 0.

**Constraints:**

- `n == gain.length`
- `1 <= n <= 100`
- `-100 <= gain[i] <= 100`


**Hint:**
1. Let's note that the altitude of an element is the sum of gains of all the elements behind it
2. Getting the altitudes can be done by getting the prefix sum array of the given array


**Solution:**

We need to find the highest altitude reached by a biker who starts at altitude `0` and gains or loses altitude based on a given array `gain`. We simulate the trip by accumulating the net gain step by step, tracking the maximum altitude encountered.

## Approach

- Initialize current altitude as `0` and maximum altitude as `0`.
- Iterate through each gain value in the array.
- Add the gain to the current altitude.
- Update the maximum altitude if the current altitude exceeds it.
- Return the maximum altitude after processing all gains.

Let's implement this solution in PHP: **[1. Find the Highest Altitude](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001732-find-the-highest-altitude/solution.php)**

```php
<?php
/**
 * @param Integer[] $gain
 * @return Integer
 */
function largestAltitude(array $gain): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo largestAltitude([-5,1,5,0,-7]);            // Output: 1
echo largestAltitude([-4,-3,-2,-1,4,3,2]);      // Output: 0
?>
```

### Explanation:

- The biker starts at altitude `0`, so the initial maximum is `0`.
- For each step `i`, the new altitude is the sum of all gains from index `0` to `i`.
- We don’t need to store all altitudes; we just keep a running total (`currentAltitude`).
- At each step, we compare `currentAltitude` with `maxAltitude` and keep the larger value.
- After the loop, `maxAltitude` holds the highest point reached during the trip.

**Complexity Analysis**
- **Time complexity:** _**O(n)**_ – single pass through the `gain` array.
- **Space complexity:** _**O(1)**_ – only a few integer variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**