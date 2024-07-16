# Contributing to LeetCode in PHP

First off, thank you for considering contributing to our project! We appreciate your time and effort in improving LeetCode in PHP.

## Table of Contents

1. [How to Contribute](#how-to-contribute)
2. [Code of Conduct](#code-of-conduct)
3. [Getting Started](#getting-started)
4. [Submitting Changes](#submitting-changes)
5. [Style Guide](#style-guide)
6. [License](#license)

## How to Contribute

We welcome contributions in the form of bug reports, bug fixes, new feature implementations, documentation improvements, and code optimizations. Here are a few ways you can help:

- **Bug Reports**: Report any bugs you encounter using the issue tracker.
- **Feature Requests**: Suggest new features or improvements.
- **Code Contributions**: Submit pull requests for bug fixes, new features, or other code changes.
- **Documentation**: Improve the documentation to make it easier for others to use and contribute to the project.

## Code of Conduct

Please read our [Code of Conduct](CODE_OF_CONDUCT.md) to understand the standards of behavior we expect from our community members.

## Getting Started

1. **Fork the Repository**: Click the "Fork" button on the top right of the repository page to create a copy of the repository under your GitHub account.

2. **Clone the Repository**: 
   ```bash
   git clone https://github.com/your-username/leetcode-in-php.git
   cd leetcode-in-php
   ```

3. **Create a Branch**: Create a new branch for your work.
   ```bash
   git checkout -b feature-branch
   ```

4. **Install Dependencies**: Ensure you have all necessary dependencies installed. This project requires PHP 5.6 or higher.

5. **Make Changes**: Implement your changes or additions.

6. **Test Your Changes**: Make sure your changes do not break any existing functionality and add tests for new features where appropriate.

## Submitting Changes

1. **Commit Your Changes**: 
   ```bash
   git add .
   git commit -m "Description of the changes made"
   ```

2. **Push to Your Fork**:
   ```bash
   git push origin feature-branch
   ```

3. **Open a Pull Request**: Go to the original repository and open a pull request from your fork and branch. Provide a clear description of your changes and the purpose they serve.

4. **Review Process**: One of the project maintainers will review your pull request. Be ready to make adjustments based on feedback.

## Style Guide

- Follow PHP coding standards: PSR-12.
- Write clear, concise, and meaningful commit messages.
- Ensure all new code is covered by tests.

### Example Structure for Coding Problems
1. Each problem should be in its own directory under the `problems` directory.
2. The directory should be named based on the problem's title in a URL-friendly format (e.g., `problems/two-sum`).
3. Each problem directory should include:
   - `Problem.php`: The PHP class solving the problem.
   - `README.md`: A description of the problem and the solution.
   - `tests`: A directory containing test cases for the problem.

Example:
```
problems/
├── two-sum/
│   ├── Solution.php
│   ├── README.md
│   └── tests/
│       └── ProblemTest.php
```

## License

By contributing, you agree that your contributions will be licensed under the project's [MIT License](LICENSE).

Thank you for your contributions and helping to improve LeetCode in PHP!
