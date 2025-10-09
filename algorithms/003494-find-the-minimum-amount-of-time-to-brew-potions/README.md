3494\. Find the Minimum Amount of Time to Brew Potions

**Difficulty:** Medium

**Topics:** `Array`, `Simulation`, `Prefix Sum`, `Weekly Contest 442`

You are given two integer arrays, `skill` and `mana`, of length `n` and `m`, respectively.

In a laboratory, `n` wizards must brew `m` potions _in order_. Each potion has a mana capacity `mana[j]` and **must** pass through **all** the wizards sequentially to be brewed properly. The time taken by the `iᵗʰ` wizard on the `jᵗʰ` potion is `timeᵢⱼ = skill[i] * mana[j]`.

Since the brewing process is delicate, a potion **must** be passed to the next wizard immediately after the current wizard completes their work. This means the timing must be _synchronized_ so that each wizard begins working on a potion **exactly** when it arrives.

Return _the **minimum** amount of time required for the potions to be brewed properly_.

**Example 1:**

- **Input:** skill = [1,5,2,4], mana = [5,1,4,2]
- **Output:** 110
- **Explanation:**

  | Potion Number	 | Start time	 | Wizard 0 done by	 | Wizard 1 done by	 | Wizard 2 done by	 | Wizard 3 done by |
  |----------------|-------------|-------------------|-------------------|-------------------|------------------|
  | 0	             | 0	          | 5	                | 30	               | 40	               | 60               |
  | 1	             | 52	         | 53	               | 58	               | 60	               | 64               |
  | 2	             | 54	         | 58	               | 78	               | 86	               | 102              |
  | 3	             | 86	         | 88	               | 98	               | 102	              | 110              |

As an example for why wizard 0 cannot start working on the 1ˢᵗ potion before time `t = 52`, consider the case where the wizards started preparing the 1ˢᵗ potion at time `t = 50`. At time `t = 58`, wizard 2 is done with the 1ˢᵗ potion, but wizard 3 will still be working on the 0ᵗʰ potion till time `t = 60`.

**Example 2:**

- **Input:** skill = [1,1,1], mana = [1,1,1]
- **Output:** 5
- **Explanation:**
  1. Preparation of the 0ᵗʰ potion begins at time `t = 0`, and is completed by time `t = 3`.
  2. Preparation of the 1ˢᵗ potion begins at time `t = 1`, and is completed by time `t = 4`.
  3. Preparation of the 2ⁿᵈ potion begins at time `t = 2`, and is completed by time `t = 5`.


**Example 3:**

- **Input:** skill = [1,2,3,4], mana = [1,2]
- **Output:** 21

**Constraints:**

- `n == skill.length`
- `m == mana.length`
- `1 <= n, m <= 5000`
- `1 <= mana[i], skill[i] <= 5000`



**Hint:**
1. Maintain each wizard's earliest free time (for the last potion) as `f[i]`.
2. Let `x` be the current mana value. Starting from `now = f[0]`, update `now = max(now + skill[i - 1] * x, f[i])` for `i in [1..n]`. Then, the final `f[n - 1] = now + skill[n - 1] * x` for this potion.
3. Update all other `f` values by `f[i] = f[i + 1] - skill[i + 1] * x` for `i in [0..n - 2]` (in reverse order).






**Solution:**

We need to find the minimum time to brew all potions when they must pass through all wizards sequentially and each wizard can only work on one potion at a time.

The key insight is that for each potion, we need to find the earliest start time such that when it reaches each wizard, that wizard has finished their previous potion.

**Approach:**
1. Track the earliest available time for each wizard to start working on a new potion
2. For each potion, calculate the earliest possible start time by checking constraints from all wizards
3. Update wizard availability times after processing each potion

Let's implement this solution in PHP: **[3494. Find the Minimum Amount of Time to Brew Potions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003494-find-the-minimum-amount-of-time-to-brew-potions/solution.php)**

```php
<?php
/**
 * @param Integer[] $skill
 * @param Integer[] $mana
 * @return Integer
 */
function minTime($skill, $mana) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minTime([1,5,2,4], [5,1,4,2]) . PHP_EOL; // Output: 110
echo minTime([1,1,1], [1,1,1]) . PHP_EOL;     // Output: 5
echo minTime([1,2,3,4], [1,2]) . PHP_EOL;     // Output: 21
?>
```

### Explanation:

1. **Prefix Sum Calculation:** We precompute the cumulative skill values so `prefix[i]` represents the total time needed for the first `i` wizards to process a potion with mana cost 1.

2. **Free Time Tracking:** The `$freeTime` array tracks when each wizard becomes available to start working on a new potion.

3. **Potion Processing:** For each potion with mana cost `x`:
    - We find the earliest start time that satisfies all wizard constraints
    - For wizard `i`, the potion arrives at time `start + prefix[i] * x`
    - This must be ≥ `freeTime[i]` (when wizard `i` becomes free)
    - We find the maximum required start time across all wizards

4. **Updating Availability:** After processing a potion, each wizard's new free time is the start time plus the cumulative time all wizards up to them take for this potion.

5. **Result:** The final answer is when the last wizard finishes the last potion, which is stored in `freeTime[n-1]`.

**Time Complexity:** O(n × m) - we process each potion and for each, check all wizards
**Space Complexity:** O(n) - we store prefix sums and free times

This approach efficiently schedules potions while respecting the constraints that each wizard can only work on one potion at a time and potions must pass sequentially through all wizards.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**