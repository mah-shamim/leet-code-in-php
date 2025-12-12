3433\. Count Mentions Per User

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Sorting`, `Simulation`, `Weekly Contest 434`

You are given an integer `numberOfUsers` representing the total number of users and an array `events` of size `n x 3`.

Each `events[i]` can be either of the following two types:

1. **Message Event:** `["MESSAGE", "timestampᵢ", "mentions_stringᵢ"]`
   - This event indicates that a set of users was mentioned in a message at `timestampᵢ`.
   - The `mentions_stringᵢ` string can contain one of the following tokens:
     - `id<number>`: where `<number>` is an integer in range `[0,numberOfUsers - 1]`. There can be **multiple** ids separated by a single whitespace and may contain duplicates. This can mention even the offline users.
     - `ALL`: mentions **all** users.
     - `HERE`: mentions all **online** users.
2. **Offline Event:** `["OFFLINE", "timestampᵢ", "idᵢ"]`
   - This event indicates that the user `idᵢ` had become offline at `timestampᵢ` for **60 time units**. The user will automatically be online again at time `timestampᵢ + 60`.

Return _an array `mentions` where `mentions[i]` represents the number of mentions the user with id `i` has across all `MESSAGE` events_.

All users are initially online, and if a user goes offline or comes back online, their status change is processed before handling any message event that occurs at the same timestamp.

**Note** that a user can be **mentioned** multiple times in a **single** message event, and each mention should be counted **separately**.

**Example 1:**

- **Input:** numberOfUsers = 2, events = [["MESSAGE","10","id1 id0"],["OFFLINE","11","0"],["MESSAGE","71","HERE"]]
- **Output:** [2,2]
- **Explanation:**
  - Initially, all users are online.
  - At timestamp 10, `id1` and `id0` are mentioned. `mentions = [1,1]`
  - At timestamp 11, `id0` goes **offline**.
  - At timestamp 71, `id0` comes back **online** and `"HERE"` is mentioned. `mentions = [2,2]`

**Example 2:**

- **Input:** numberOfUsers = 2, events = [["MESSAGE","10","id1 id0"],["OFFLINE","11","0"],["MESSAGE","12","ALL"]]
- **Output:** [2,2]
- **Explanation:**
   - Initially, all users are online.
   - At timestamp 10, `id1` and `id0` are mentioned. `mentions = [1,1]`
   - At timestamp 11, `id0` goes **offline**.
   - At timestamp 12, `"ALL"` is mentioned. This includes offline users, so both `id0` and `id1` are mentioned. `mentions = [2,2]`

**Example 3:**

- **Input:** numberOfUsers = 2, events = [["OFFLINE","10","0"],["MESSAGE","12","HERE"]]
- **Output:** [0,1]
- **Explanation:**
   - Initially, all users are online.
   - At timestamp 10, `id0` goes **offline**.
   - At timestamp 12, `"HERE"` is mentioned. Because `id0` is still offline, they will not be mentioned. `mentions = [0,1]`

**Constraints:**

- `1 <= numberOfUsers <= 100`
- `1 <= events.length <= 100`
- `events[i].length == 3`
- `events[i][0]` will be one of `MESSAGE` or `OFFLINE`.
- `1 <= int(events[i][1]) <= 10⁵`
- The number of `id<number>` mentions in any `"MESSAGE"` event is between `1` and `100`.
- `0 <= <number> <= numberOfUsers - 1`
- It is **guaranteed** that the user id referenced in the `OFFLINE` event is **online** at the time the event occurs.



**Hint:**
1. Sort events by timestamp and then process each event.
2. Maintain two sets for offline and online user IDs.






**Solution:**

We need to track user mentions from MESSAGE events, considering that users can go offline and come back online after 60 time units. We must handle three types of mentions:
- `id<number>`: Mention specific users (can be multiple, duplicate)
- `ALL`: Mention all users (online and offline)
- `HERE`: Mention only online users

### Approach:

1. Sort events by timestamp to process in chronological order
2. Track when users come back online using a priority queue or by checking if current time >= offline_time + 60
3. For each timestamp, first process any users coming back online, then process offline events, then message events
4. Count all mentions (including duplicates in the same message)

Let's implement this solution in PHP: **[3433. Count Mentions Per User](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003433-count-mentions-per-user/solution.php)**

```php
<?php
/**
 * @param Integer $numberOfUsers
 * @param String[][] $events
 * @return Integer[]
 */
function countMentions($numberOfUsers, $events) {
    // Sort events by timestamp
    usort($events, function($a, $b) {
        $timeA = (int)$a[1];
        $timeB = (int)$b[1];
        if ($timeA === $timeB) {
            // If same timestamp, ensure OFFLINE events come before MESSAGE events
            $order = ['OFFLINE' => 0, 'MESSAGE' => 1];
            return $order[$a[0]] <=> $order[$b[0]];
        }
        return $timeA <=> $timeB;
    });

    // Initialize mentions count for each user
    $mentions = array_fill(0, $numberOfUsers, 0);

    // Track when each user comes back online (timestamp)
    $offlineUntil = array_fill(0, $numberOfUsers, 0);

    // Process events in order
    foreach ($events as $event) {
        $type = $event[0];
        $timestamp = (int)$event[1];

        // First, check if any users should come back online at this timestamp
        for ($i = 0; $i < $numberOfUsers; $i++) {
            if ($offlineUntil[$i] > 0 && $timestamp >= $offlineUntil[$i]) {
                $offlineUntil[$i] = 0; // User is back online
            }
        }

        if ($type === 'OFFLINE') {
            $userId = (int)$event[2];
            // User goes offline for 60 time units
            $offlineUntil[$userId] = $timestamp + 60;
        }
        elseif ($type === 'MESSAGE') {
            $mentionsStr = $event[2];

            if ($mentionsStr === 'ALL') {
                // Mention all users
                for ($i = 0; $i < $numberOfUsers; $i++) {
                    $mentions[$i]++;
                }
            }
            elseif ($mentionsStr === 'HERE') {
                // Mention only online users
                for ($i = 0; $i < $numberOfUsers; $i++) {
                    if ($offlineUntil[$i] === 0) { // User is online
                        $mentions[$i]++;
                    }
                }
            }
            else {
                // Parse individual user mentions
                $tokens = explode(' ', $mentionsStr);
                foreach ($tokens as $token) {
                    if (strpos($token, 'id') === 0) {
                        $userId = (int)substr($token, 2);
                        if ($userId >= 0 && $userId < $numberOfUsers) {
                            $mentions[$userId]++;
                        }
                    }
                }
            }
        }
    }

    return $mentions;
}

// Test cases
echo countMentions(2, [["MESSAGE","10","id1 id0"],["OFFLINE","11","0"],["MESSAGE","71","HERE"]]) . "\n";        // Output: [2,2]
echo countMentions(2, [["MESSAGE","10","id1 id0"],["OFFLINE","11","0"],["MESSAGE","12","ALL"]]) . "\n";         // Output: [2,2]
echo countMentions(2, [["OFFLINE","10","0"],["MESSAGE","12","HERE"]]) . "\n";                                   // Output: [0,1]
?>
```

### Explanation:


1. **Sorting**: We sort events by timestamp, ensuring OFFLINE events are processed before MESSAGE events when they have the same timestamp.

2. **State Tracking**:
   - `$mentions`: Array to count mentions for each user
   - `$offlineUntil`: Array to track when each user comes back online (0 means online)

3. **Processing Loop**:
   - For each timestamp, first check if any users should come back online
   - Process OFFLINE events by setting the user's offline time to current timestamp + 60
   - Process MESSAGE events by updating mention counts based on the mention type

4. **Mention Types**:
   - `ALL`: Increment count for all users
   - `HERE`: Only increment for users who are online (`$offlineUntil[$i] === 0`)
   - Individual IDs: Parse each token, extract user ID, and increment count

## Complexity Analysis
- **Time Complexity**: O(n log n + n * k), where n is number of events and k is number of users (up to 100)
- **Space Complexity**: O(k), for storing mentions and offline status

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**