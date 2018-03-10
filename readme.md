## Employee Management System
This Project is using Materialize-css version 1.0.0 alpha-4 , material icons. It's backend is built on laravel which is an awesome php framework and it's gonna generate views from blade template engine (just plain old html and css).

It's under Development.

### Files that have been created in public folder

- None.

### Changes that have been made in public folder

- Added some styles in app.css
- link storage folder to public folder

### Views that have been created

- index,create,show,edit views have been created in emp_mg/employee.

### Views that have been modified

- sideNav for adding Employee routes.
- some css classes have been applied that are not much important.

### Controllers that have been created

- EmployeesController (Added full CRUD functionality).

### Controllers that have been modified

- CitiesController for changing zip_code validation in update method.
- DepartmentsController changing comments (nothing special).

### Models that have been created

- Gender
- Employee (Added relationships)

### Models that have been modified

- None

### Migrations that have been created

- create_genders_table
- create_employees_table

### Migrations that have been modified

- None

### Routes that have been created

- Employee route(s)

### Routes that have been modified

- None

### Files that have been Commented

- EmployeesController.
- Employee views.
- Employee model

### Note

- GendersTableSeeder has been created to generate gender data because we don't need to modify gender values.
- old() method is global so we don't need to do Request::old().

- above headings that says changes have been made means changes to files that were created in previous commit.