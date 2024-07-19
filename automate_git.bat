@echo off

:: Define the number of commits
set /p commit_count="Enter the number of commits: "

:: Loop to create multiple commits
for /l %%x in (1, 1, %commit_count%) do (
    echo Making changes for commit %%x > change%%x.txt
    git add .
    git commit -m "Automated commit %%x"

    git rm change%%x.txt
    git add .
    git commit -m "Automated commit rollback %%x"
)

:: Append a line to README.md
:: echo. >> README.md
:: echo This is the last line added by the batch script. >> README.md

:: Add and commit the changes in README.md
:: git add README.md
:: git commit -m "Added the last line to README.md"

:: Push changes to the repository
:: git push