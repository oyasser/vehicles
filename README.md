# Vehicle

Vehicle is a simple Laravel project to list, filter and sort database records from 4 different tables.

## Installation (Using XAMPP)
1. Clone *master* Branch

2. Run *composer install* to install the dependencies

   ```bash
     composer install
   ```
3. Run the following command to create or replace the database view:
   
   ```bash
     php artisan view:vehiclesExpenses
   ```

3. Run the following command to start the project:
   ```bash
     php artisan serve
   ```

4. Open the following URL:

   ```bash
     http://127.0.0.1:8000/
   ```

## Installation (Using Docker)
1. Clone *docker* Branch

2. Use [Docker](https://www.docker.com/)* to run the project (run the following command after docker installation).

   ```bash
     docker-compose up -d --build
   ```
3. Run the following command to create or replace the database view:
   ```bash
     php artisan view:vehiclesExpenses
   ```

4. Open the following URL:

   ```bash
     localhost:8100
   ```

## Running Unit tests:
1. Run the following command:

   ```bash
     vendor\bin\phpunit
   ```


## How to use?
Import the Postman collection or use the following URLs:
1. To list all Vehicles expenses: [/api/vehicles/expenses](http://127.0.0.1:8000/api/vehicles/expenses)
2. To search for a specific vehicle expenses by vehicle name: [/api/vehicles/expenses?name="prof"](http://127.0.0.1:8000/api/vehicles/expenses?name="prof")
3. To filter all vehicle expenses by type*: [/api/vehicles/expenses?type[]="fuel"](http://127.0.0.1:8000/api/vehicles/expenses?type[]="fuel")
4. To order all vehicle expenses by cost (desc): [/api/vehicles/expenses?cost="desc"](http://127.0.0.1:8000/api/vehicles/expenses?cost="desc")

\* You can use one or more filter parameters from the following list
### Available query parameters for filters:
* name = "prof"
* type[]="fuel"&type[]="service"
* min_cost=50 
* max_cost=50
* min_creation_date="2014-11-28"
* max_creation_date="2014-11-28"

### Available query parameters for sorting:
* cost="ASC"
* creation_date="DESC"
   
## Notes
* I have uploaded the .env file to make it easier to use.
* Debug key is set to true as It's a development version.

