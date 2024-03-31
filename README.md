# Catalyst Tasks

## Dependencies

- PHP version: 8.1.25
- Database Engine: 10.4.32

---
## Task 1. User Data Upload

The script is written to upload user data as specified (`name`, `surname`, `email`) from a `users.csv` file into Mysql database. `OOP` and `Repository Pattern` is used in program. 

#### user_upload.php 
- works as a main class
- main control flow

#### database.php 
- database connection
- query builders
- query executions

#### user_model.php 
- user model class

#### functions.php 
-  contains common functions

### Command Line Directives
User the following commands to execute the program.


**Help**

```sh
php user_upload.php --help
```

The command shows all the allowed direcives for the program, which are as follows,


```sh
******** Help ********
-u                      MySQL username
-p                      MySQL password
-h                      MySQL host
--create_table          This will cause the MySQL users table to be built (and no further action will be taken)
--file [csv file name]  This is the name of the CSV to be parsed
--dry_run               This will be used with the --file directive in case we want to run the script but not insert into the DB.All other functions will be executed, but the database won`t be altered
--help                  Which will output the above list of directives with details
```

**Connect to Database**
This command makes database connection
```sh
php user_upload.php -u root -h localhost -p=""
```


**Create Table in Database**
This command will create `users` table in database after connection with database. Table will be regenerated even if already exists. To use the existing table skip `--create_table` directive.
```sh
php user_upload.php -u root -h localhost -p="" --create_table
```

**Load and Save Data**
This command reads data form the given file and save it into database. Email will be validated before insertion. Duplicate emails will cause to skip the whole entry.
```sh
php user_upload.php -u root -h localhost -p="" --create_table --file users.csv
```

**Dry Run**
Command reads and validate data from the file but avoids database insertion. Duplicate emails will be identified.
```sh
 php user_upload.php -u root -h localhost -p="" --create_table --file users.csv --dry_run
```

---
## Task 2. Foobar 
Use the following command to run the script.


```sh
php foobar.php
```

Program prints numbers form 1 to 100, while replacing the numbers with
- `foo` which are divisible by 3
- `bar` which are divisible by 5
- `foobar` which are divisible by 3 and 5


