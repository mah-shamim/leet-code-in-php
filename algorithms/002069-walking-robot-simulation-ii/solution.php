<?php

class Robot {

    private int $width;
    private int $height;
    private int $x;
    private int $y;
    private string $dir;
    private int|float $perimeter;
    private array $directions;

    /**
     * @param Integer $width
     * @param Integer $height
     */
    function __construct(int $width, int $height) {
        $this->width = $width;
        $this->height = $height;
        $this->x = 0;
        $this->y = 0;
        $this->dir = "East";

        // Total perimeter length (number of cells on perimeter, counting corners once)
        // Actually we need the number of steps to complete one full cycle
        $this->perimeter = 2 * ($width + $height - 2);

        $this->directions = ["East", "North", "West", "South"];
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function step(int $num) {
        // If perimeter is 0, robot is at a single point
        if ($this->perimeter == 0) {
            return;
        }

        // Reduce steps modulo perimeter to avoid unnecessary loops
        // But we need to handle the case when robot is at (0,0) and facing East specially
        // because it's the starting point

        $num = $num % $this->perimeter;
        if ($num == 0 && $this->x == 0 && $this->y == 0 && $this->dir == "East") {
            // Special case: if we would stay at the starting position after a full cycle
            // we need to simulate one full cycle to update direction correctly
            $num = $this->perimeter;
        }

        while ($num > 0) {
            $nextX = $this->x;
            $nextY = $this->y;

            // Determine next position based on current direction
            switch ($this->dir) {
                case "East":
                    $nextX++;
                    break;
                case "North":
                    $nextY++;
                    break;
                case "West":
                    $nextX--;
                    break;
                case "South":
                    $nextY--;
                    break;
            }

            // Check if next move would be out of bounds
            if ($nextX < 0 || $nextX >= $this->width || $nextY < 0 || $nextY >= $this->height) {
                // Turn counterclockwise
                $this->turnLeft();
            } else {
                // Move forward
                $this->x = $nextX;
                $this->y = $nextY;
                $num--;
            }
        }
    }

    /**
     * @return Integer[]
     */
    function getPos(): array
    {
        return [$this->x, $this->y];
    }

    /**
     * @return String
     */
    function getDir(): string
    {
        return $this->dir;
    }

    /**
     * @return void
     */
    private function turnLeft(): void
    {
        $dirIndex = array_search($this->dir, $this->directions);
        $this->dir = $this->directions[($dirIndex + 1) % 4];
    }
}

/**
 * Your Robot object will be instantiated and called as such:
 * $obj = Robot($width, $height);
 * $obj->step($num);
 * $ret_2 = $obj->getPos();
 * $ret_3 = $obj->getDir();
 */