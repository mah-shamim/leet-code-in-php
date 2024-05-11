857\. Minimum Cost to Hire K Workers

Hard

There are `n` workers. You are given two integer arrays `quality` and wage where `quality[i]` is the quality of the <code>i<sup>th</sup></code> worker and `wage[i]` is the minimum wage expectation for the <code>i<sup>th</sup></code> worker.

We want to hire exactly `k` workers to form a **paid group**. To hire a group of `k` workers, we must pay them according to the following rules:

1. Every worker in the paid group must be paid at least their minimum wage expectation.
2. In the group, each worker's pay must be directly proportional to their quality. This means if a worker’s quality is double that of another worker in the group, then they must be paid twice as much as the other worker.

Given the integer `k`, return _the least amount of money needed to form a paid group satisfying the above conditions. Answers within <code>10<sup>-5</sup></code> of the actual answer will be accepted._

**Example 1:**

- **Input:** quality = [10,20,5], wage = [70,50,30], k = 2
- **Output:** 105.00000
- **Explanation:** We pay 70 to 0<sup>th</sup> worker and 35 to 2<sup>nd</sup> worker.

**Example 2:**

- **Input:** quality = [3,1,10,10,1], wage = [4,8,2,2,7], k = 3
- **Output:** 30.66667
- **Explanation:** We pay 4 to 0<sup>th</sup> worker, 13.33333 to 2<sup>nd</sup> and 3<sup>rd</sup> workers separately.

**Example 3:**

- **Input:** quality = [4,4,4,5], wage = [13,12,13,12], k = 2
- **Output:** 26.00000


**Constraints:**


- <code>n == quality.length == wage.length</code>
- <code>1 <= k <= n <= 10<sup>4</sup></code>
- <code>1 <= quality[i], wage[i] <= 10<sup>4</sup></code>
