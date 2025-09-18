3408\. Design Task Manager

**Difficulty:** Medium

**Topics:** `Hash Table`, `Design`, `Heap (Priority Queue)`, `Ordered Set`, `Biweekly Contest 147`

There is a task management system that allows users to manage their tasks, each associated with a priority. The system should efficiently handle adding, modifying, executing, and removing tasks.

Implement the `TaskManager` class:

- `TaskManager(vector<vector<int>>& tasks)` initializes the task manager with a list of user-task-priority triples. Each element in the input list is of the form `[userId, taskId, priority]`, which adds a task to the specified user with the given priority.

- `void add(int userId, int taskId, int priority)` adds a task with the specified `taskId` and `priority` to the user with `userId`. It is **guaranteed** that `taskId` does not exist in the system.

- `void edit(int taskId, int newPriority)` updates the priority of the existing `taskId` to `newPriority`. It is **guaranteed** that `taskId` exists in the system.

- `void rmv(int taskId)` removes the task identified by `taskId` from the system. It is **guaranteed** that `taskId` exists in the system.

- `int execTop()` executes the task with the **highest** priority across all users. If there are multiple tasks with the same **highest** priority, execute the one with the highest `taskId`. After executing, the `taskId` is **removed** from the system. Return the `userId` associated with the executed task. If no tasks are available, return -1.

**Note** that a user may be assigned multiple tasks.

**Example 1:**

- **Input:**
  ["TaskManager", "add", "edit", "execTop", "rmv", "add", "execTop"]
  [[[[1, 101, 10], [2, 102, 20], [3, 103, 15]]], [4, 104, 5], [102, 8], [], [101], [5, 105, 15], []]
- **Output:** [null, null, null, 3, null, null, 5]
- **Explanation:** 
  TaskManager taskManager = new TaskManager([[1, 101, 10], [2, 102, 20], [3, 103, 15]]); // Initializes with three tasks for Users 1, 2, and 3.
  taskManager.add(4, 104, 5); // Adds task 104 with priority 5 for User 4.
  taskManager.edit(102, 8); // Updates priority of task 102 to 8.
  taskManager.execTop(); // return 3. Executes task 103 for User 3.
  taskManager.rmv(101); // Removes task 101 from the system.
  taskManager.add(5, 105, 15); // Adds task 105 with priority 15 for User 5.
  taskManager.execTop(); // return 5. Executes task 105 for User 5.

**Example 2:**

- **Input:**
  ["TaskManager","add","edit","execTop","rmv","add","execTop"]
  [[[[1,101,8],[2,102,20],[3,103,5]]],[4,104,5],[102,9],[],[101],[50,101,8],[]]
- **Output:** [null,null,null,2,null,null,50]

**Constraints:**

- <code>1 <= tasks.length <= 10<sup>5</sup></code>
- <code>0 <= userId <= 10<sup>5</sup></code>
- <code>0 <= taskId <= 10<sup>5</sup></code>
- <code>0 <= priority <= 10<sup>9</sup></code>
- <code>0 <= newPriority <= 10<sup>9</sup></code>
- At most <code>2 * 10<sup>5</sup></code> calls will be made in **total** to `add`, `edit`, `rmv`, and `execTop` methods.
- The input is generated such that `taskId` will be valid.







**Solution:**

We need to design a task management system that efficiently handles adding, editing, removing, and executing tasks based on their priority. The key challenge is to ensure that the system can quickly access the task with the highest priority (and highest task ID in case of ties) while supporting updates and removals without incurring high computational costs.

### Approach
1. **Data Structures**:
    - **Task Information Storage**: We use an associative array `$taskInfo` to store task details (user ID, priority, and generation number) keyed by task ID.
    - **Generation Tracking**: We maintain an associative array `$generations` to track the current generation number for each task ID. This helps in invalidating outdated entries in the heap when tasks are updated or removed.
    - **Max Heap**: We use a custom max heap to efficiently retrieve the task with the highest priority. The heap stores entries as `[priority, taskId, userId, generation]`. The heap is ordered primarily by priority (descending) and secondarily by task ID (descending) to handle ties.

2. **Operations**:
    - **Initialization**: The constructor initializes the task manager by adding initial tasks using the `add` method.
    - **Adding Tasks**: When adding a task, we increment its generation number, store its details in `$taskInfo`, and push a new entry into the heap.
    - **Editing Tasks**: When editing a task, we increment its generation number, update its details in `$taskInfo`, and push a new entry into the heap.
    - **Removing Tasks**: When removing a task, we simply remove its entry from `$taskInfo`. The heap entries are invalidated lazily during execution.
    - **Executing Top Task**: We repeatedly pop tasks from the heap until we find one whose generation number matches the current generation in `$taskInfo`. This ensures that only the most recent version of a task is considered valid. The valid task is removed from `$taskInfo`, and its user ID is returned.

Let's implement this solution in PHP: **[3408. Design Task Manager](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003408-design-task-manager/solution.php)**

```php
<?php
class TaskManager {
    private $taskInfo;
    private $generations;
    private $heap;

    /**
     * @param Integer[][] $tasks
     */
    function __construct($tasks) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param Integer $userId
     * @param Integer $taskId
     * @param Integer $priority
     * @return NULL
     */
    function add($userId, $taskId, $priority) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param Integer $taskId
     * @param Integer $newPriority
     * @return NULL
     */
    function edit($taskId, $newPriority) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param Integer $taskId
     * @return NULL
     */
    function rmv($taskId) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @return Integer
     */
    function execTop() {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

class CustomMaxHeap extends SplMaxHeap {
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b): int {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

/**
 * Your TaskManager object will be instantiated and called as such:
 * $obj = TaskManager($tasks);
 * $obj->add($userId, $taskId, $priority);
 * $obj->edit($taskId, $newPriority);
 * $obj->rmv($taskId);
 * $ret_4 = $obj->execTop();
 */

// Test cases
$taskManager = new TaskManager([[1, 101, 10], [2, 102, 20], [3, 103, 15]]);
$taskManager->add(4, 104, 5);     // Add task 104 for user 4
$taskManager->edit(102, 8);       // Change priority of 102 to 8
echo $taskManager->execTop();     // → 3 (task 103 has highest priority 15)
$taskManager->rmv(101);           // Remove task 101
$taskManager->add(5, 105, 15);    // Add task 105 with priority 15
echo $taskManager->execTop();     // → 5 (tie with 103, but 105 has higher taskId)
?>
```

### Explanation:

- **Initialization**: The constructor initializes the task manager by processing initial tasks. Each task is added using the `add` method, which sets up the initial generation number and stores the task details.
- **Adding Tasks**: The `add` method checks if the task ID has been seen before. If not, it initializes its generation number; otherwise, it increments the generation number. It then stores the task details and pushes a new entry into the heap.
- **Editing Tasks**: The `edit` method increments the task's generation number, updates its priority in `$taskInfo`, and pushes a new entry into the heap with the updated details.
- **Removing Tasks**: The `rmv` method simply removes the task from `$taskInfo`, invalidating any heap entries for that task ID.
- **Executing Top Task**: The `execTop` method pops tasks from the heap until it finds one with a generation number matching the current generation in `$taskInfo`. This ensures that only the most recent version of the task is executed. The valid task is removed, and its user ID is returned.

This approach efficiently manages tasks by leveraging a max heap for priority-based access and generation numbers to handle updates and removals lazily, ensuring optimal performance for each operation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**