## Todo List Application

This Postman collection consist of all endpoints for a todo list application.

The todo application as a simple replica of *GOOGLE KEEP*, where:

- A user can open a todo task by writing a title and then highlighting all items under the task.
- A user can mark an item under a particular Task as completed or otherwise.

## Technology
This project was built with Laravel PHP and PHPCS and PHPStan are setup and configured in the codebase as static analysis tool to ensure clean code, good code quality and uniform standards across the codebase.

- To run PHPCS configuration against the codebase, run the comman *./vendor/bin/phpcs *
- To run PHPStan configuration against the codebase, run the comman *./vendor/bin/phpstan analyse*


## Installation
- Clone the project to your local machine
- Run the command *composer install*
- Run the command *php artisan key:generate*
- If .env file diesn't exist, run the command *cp .env.example .env*
- In the .env file, update the necessary information to allow connection to a database
- Run the command *php artisan migrate*
