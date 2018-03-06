## Employee Management System
This Project is using Materialize-css version 1.0.0 alpha-4 , material icons. It's backend is built on laravel which is an awesome php framework and it's gonna generate views from blade template engine (just plain old html and css).

It's under Development.

### Files that have been created in public folder

- None.

### Changes that have been made in public folder

- None

### Views that have been created

- sys_mg Folder has been created and all the system management views are stored in it.
- Divisions ,States ,Countries ,Cities ,Salaries Views has been Created in inside sys_mg folder.

### Views that have been modified

- sideNav for adding System Management routes.
- some css classes have been applied that are not much important.
- custom pagination view was created and its located in vendor/pagination. read more about it in [Laravel documentation](https://laravel.com/docs/5.6/pagination#manually-creating-a-paginator).

### Controllers that have been created

- DivisionsController (Added full CRUD functionality).
- CitiesController (Added full CRUD functionality).
- StatesController (Added full CRUD functionality).
- CountriesController (Added full CRUD functionality).
- SalariesController (Added full CRUD functionality).

### Controllers that have been modified

- DepartmentsController for changing the view path (now it's in sys_mg/departments).

### Models that have been created

- Division
- City
- State
- Country
- Salary

### Models that have been modified

- None

### Migrations that have been created

- create_divisions_table
- create_cities_table
- create_states_table
- create_countries_table
- create_salaries_table

### Migrations that have been modified

- None

### Routes that have been created

- Divisions Route(s)
- Cities Route(s)
- States Route(s)
- Countries Route(s)
- Salaries Route(s)

### Routes that have been created

- None

### Comments

* DepartmentsController has been commented.
* sys_mg/departments views have been commented.
* routes/web has been commented.

### Note
vendor/pagination/default.blade.php can be used for other laravel projects, if you are using materialize-css because laravel pagination comes with bootstrap support, not the other ones.
above headings that says changes have been made means changes to files that were created in previous commit.