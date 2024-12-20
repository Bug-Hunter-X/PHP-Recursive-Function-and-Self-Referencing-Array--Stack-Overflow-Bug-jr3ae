# PHP Recursive Function and Self-Referencing Array: Stack Overflow Bug

This repository demonstrates a common bug in PHP involving recursive functions and self-referencing arrays.  Improper handling of recursive calls with self-referential data structures can lead to stack overflow errors, causing the script to crash.

The `bug.php` file contains code that showcases the problem.  The `bugSolution.php` file offers a solution to avoid the stack overflow error.

## Bug Description
The primary issue lies in the recursive function `processData`. When the input array contains a self-reference (e.g., `$data = [1, 2, &$data];`), the function infinitely recurses, ultimately exhausting the call stack and resulting in a fatal error.

## Solution
The solution involves detecting and handling self-referencing structures within the recursive function to prevent infinite recursion. The improved code includes a mechanism to identify and break cycles, thus preventing stack overflow.