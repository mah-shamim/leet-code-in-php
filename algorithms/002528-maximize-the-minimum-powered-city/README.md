2528\. Maximize the Minimum Powered City

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Greedy`, `Queue`, `Sliding Window`, `Prefix Sum`, `Biweekly Contest 95`

You are given a **0-indexed** integer array `stations` of length `n`, where `stations[i]` represents the number of power stations in the `ith` city.

Each power station can provide power to every city in a fixed **range**. In other words, if the range is denoted by `r`, then a power station at city `i` can provide power to all cities `j` such that `|i - j| <= r` and `0 <= i, j <= n - 1`.

- Note that `|x|` denotes **absolute** value. For example, `|7 - 5| = 2` and `|3 - 10| = 7`.

The **power** of a city is the total number of power stations it is being provided power from.

The government has sanctioned building `k` more power stations, each of which can be built in any city, and have the same range as the pre-existing ones.

Given the two integers `r` and `k`, return _the **maximum possible minimum power** of a city, if the additional power stations are built optimally_.

**Note** that you can build the `k` power stations in multiple cities.

**Example 1:**

- **Input:** stations = [1,2,4,5,0], r = 1, k = 2
- **Output:** 5
- **Explanation:**
  - One of the optimal ways is to install both the power stations at city 1.
  - So stations will become [1,4,4,5,0].
    - City 0 is provided by 1 + 4 = 5 power stations.
    - City 1 is provided by 1 + 4 + 4 = 9 power stations.
    - City 2 is provided by 4 + 4 + 5 = 13 power stations.
    - City 3 is provided by 5 + 4 = 9 power stations.
    - City 4 is provided by 5 + 0 = 5 power stations.
  - So the minimum power of a city is 5.
  - Since it is not possible to obtain a larger power, we return 5.

**Example 2:**

- **Input:** stations = [4,4,4,4], r = 0, k = 3
- **Output:** 4
- **Explanation:** It can be proved that we cannot make the minimum power of a city greater than 4.

**Constraints:**

- `n == stations.length`
- `1 <= n <= 10⁵`
- `0 <= stations[i] <= 10⁵`
- `0 <= r <= n - 1`
- `0 <= k <= 10⁹`




**Hint:**
1. Pre calculate the number of stations on each city using Line Sweep.
2. Use binary search to maximize the minimum.



**Similar Questions:**
1. [2071. Maximum Number of Tasks You Can Assign](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002528-maximum-number-of-tasks-you-can-assign)






**Solution:**

We need to find the maximum possible minimum power across all cities after optimally placing k additional power stations.

### Approach:

1. **Understanding the power calculation**: Each power station at position `i` provides power to all cities within `[i-r, i+r]`. So the power of a city is the sum of all stations that can reach it.

2. **Key insight**: This is a classic "maximize the minimum" problem, which suggests using binary search. I'll binary search on the possible minimum power values.

3. **Preprocessing**: First, I need to calculate the initial power for each city. I can use a prefix sum/difference array technique to efficiently compute how many stations cover each city.

4. **Checking feasibility**: For a candidate minimum power `x`, I need to check if I can place at most `k` stations to make all cities have at least `x` power. I'll use a greedy approach with a sliding window.

Let's implement this solution in PHP: **[2528. Maximize the Minimum Powered City](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002528-maximize-the-minimum-powered-city/solution.php)**

```php
<?php
/**
 * @param Integer[] $stations
 * @param Integer $r
 * @param Integer $k
 * @return Integer
 */
function maxPower($stations, $r, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $initialPower
 * @param $r
 * @param $k
 * @param $target
 * @return bool
 */
function isPossible($initialPower, $r, $k, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxPower([1, 2, 4, 5, 0], 1, 2) . PHP_EOL; // Output: 5
echo maxPower([4, 4, 4, 4], 0, 3) . PHP_EOL;    // Output: 4
?>
```

### Explanation:

1. **Initial Power Calculation**: I use a difference array technique where `prefix[left] += stations[i]` and `prefix[right + 1] -= stations[i]`. Then I compute the prefix sum to get the actual power for each city.

2. **Binary Search**: I search for the maximum minimum power between `0` and `max(initial power) + k`.

3. **Feasibility Check**: For a candidate `target`:
   - I maintain a sliding window of additions using a difference array
   - For each city, if its current power (initial + additions) is less than target, I add stations at the farthest possible position (`i + r`) to cover as many future cities as possible
   - I track if I exceed the available `k` stations

**Time Complexity**: O(n log(max_power + k)), where n is the number of cities
**Space Complexity**: O(n) for the auxiliary arrays

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**