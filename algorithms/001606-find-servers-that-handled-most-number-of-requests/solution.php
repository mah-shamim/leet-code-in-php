<?php

class Solution {
    private array $tree;
    private int $n;

    /**
     * @param Integer $k
     * @param Integer[] $arrival
     * @param Integer[] $load
     * @return Integer[]
     */
    function busiestServers(int $k, array $arrival, array $load): array
    {
        $this->n = $k;
        $this->tree = array_fill(0, $k + 1, 0);

        // Initially all servers are available.
        for ($i = 1; $i <= $k; $i++) {
            $this->add($i, 1);
        }

        // Min-heap by ending time. PHP SplPriorityQueue is a max-heap,
        // so we store negative ending time as priority.
        $busy = new SplPriorityQueue();
        $busy->setExtractFlags(SplPriorityQueue::EXTR_DATA);

        $handled = array_fill(0, $k, 0);
        $available = $k;

        $m = count($arrival);

        for ($i = 0; $i < $m; $i++) {
            $time = $arrival[$i];

            // Release all servers whose requests finish by this arrival time.
            while (!$busy->isEmpty()) {
                $top = $busy->top();

                if ($top[0] > $time) {
                    break;
                }

                $busy->extract();
                $server = $top[1];

                $this->add($server + 1, 1);
                $available++;
            }

            if ($available === 0) {
                continue;
            }

            $start = $i % $k;

            // Number of available servers with ID < start.
            $before = $this->sum($start);

            if ($available > $before) {
                // There is an available server at or after start.
                $pos = $this->kth($before + 1);
            } else {
                // Wrap around to the first available server.
                $pos = $this->kth(1);
            }

            $server = $pos - 1;

            $handled[$server]++;
            $this->add($pos, -1);
            $available--;

            $endTime = $time + $load[$i];
            $busy->insert([$endTime, $server], -$endTime);
        }

        $maxHandled = max($handled);
        $result = [];

        for ($i = 0; $i < $k; $i++) {
            if ($handled[$i] === $maxHandled) {
                $result[] = $i;
            }
        }

        return $result;
    }

    /**
     * @param int $i
     * @param int $delta
     * @return void
     */
    private function add(int $i, int $delta): void {
        for (; $i <= $this->n; $i += $i & -$i) {
            $this->tree[$i] += $delta;
        }
    }

    /**
     * @param int $i
     * @return int
     */
    private function sum(int $i): int {
        $s = 0;
        for (; $i > 0; $i -= $i & -$i) {
            $s += $this->tree[$i];
        }
        return $s;
    }

    /**
     * @param int $k
     * @return int
     */
    private function kth(int $k): int {
        $idx = 0;
        $bit = 1;

        while (($bit << 1) <= $this->n) {
            $bit <<= 1;
        }

        for ($step = $bit; $step > 0; $step >>= 1) {
            $next = $idx + $step;
            if ($next <= $this->n && $this->tree[$next] < $k) {
                $idx = $next;
                $k -= $this->tree[$next];
            }
        }

        return $idx + 1;
    }
}