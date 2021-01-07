## Todo List Application

This Project consist of all endpoints for a todo list application.

The todo application is a simple replica of *GOOGLE KEEP*, where:

- A user can begin a todo task by writing a title and then highlighting all items under the task.
- A user can mark an item under a particular Task as completed or otherwise.

## Technology
This project was built with Laravel PHP while PHPCS and PHPStan are setup and configured in the codebase as static analysis tool to ensure clean, good code quality and uniform standards across the codebase.

Test are written for the endpoints using PHPUnit.

A blue-print of the Entity-Relationship Daigram (Database Structure) of the project can be found [HERE](https://drive.google.com/file/d/19ERdgJvP8_ut7lcZ7mlzELcJ22-kNXyB/view?usp=sharing)

Github Actions is also setup and configured on the code base to handle continous integration, when ever a push is made to master or pull request is made for feature, Github Actions checks the codebase against some set of rules (some of which is PHPCS and PHPStan, Tests) and passes if everything is fine and if otherwise, it fails.

- To run test on the codebase locally, run the command *php artisan test*
- To run PHPCS configuration against the codebase locally, run the command *./vendor/bin/phpcs*
- To run PHPStan configuration against the codebase locally, run the command *./vendor/bin/phpstan analyse*


## Installation
- Clone the project to your local machine
- Run the command *composer install*
- Run the command *php artisan key:generate*
- If .env file diesn't exist, run the command *cp .env.example .env*
- In the .env file, update the necessary information to allow connection to a database
- Run the command *php artisan migrate*


The [POSTMAN COLLECTION](https://documenter.getpostman.com/view/13007176/TVzNHKUZ) for this project contains sample request and also sample responces to better understand the endpoint.

![alt text](https://github.com/[username]/[reponame]/blob/[branch]/image.jpg?raw=true)