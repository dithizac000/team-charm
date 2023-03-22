# team-charm
Create a boba shop website that allows user to input order via modal. Then we ask user for validting cart with their personalized infomations. Afterward validation, we 
inject data into our database. Besides that we have a log in page for user and for admin. 

# Authors

- **Zack Dithialath** - Co-Founder/Developer
- **Dale** - Co-Founder/Developer
- **Jazmine** - Co-Founder/Developer


## Project Requirements
:heavy_check_mark: 1. Separates all database/business logic using the MVC pattern.
  * Database and validation under model folder
  * All HTML files under views folder
  * Routes to all the html files under the index.php
  * index.php calls function in Controller to get data from model and return views.
  * Classes under classes folder
  * JSON in its own file
  * JavaScripts under javascript folder

:heavy_check_mark: 2. Routes all URLs and leverages a templating language using Fat-Free framework
  * All routes are in the index.php and leverages a templating language using Fat-Free Framework 

:heavy_check_mark: 3. Has a clearly defined database layer using PDO and prepared statements. You should have at least two related tables.
  * All database layer is under model in data-layer.php.
  * Our two tables are boba_orders and customers
 
:heavy_check_mark: 4. Data can be viewed and added.
  * Data can be added in our checkout.html view page in the views folder. Customer can add info then their data is displayed in the summary.html view page (also in the view folder) after the check out.

:heavy_check_mark: 5. Has a history of commits from both team members to a Git repository. Commits are clearly commented. 
 * Zack | ##, Jazmin | ##, Dale | ##

:heavy_check_mark: 6. Uses OOP, and defines multiple classes, including at least one inheritance relationship.
  * We had three OOP. The customer class store customer's info and the tea has a Parent Tea that has a Child Tea that contains a seperate input. 
  * These classes are in our classes folder.

:heavy_check_mark: 7. Contains full Docblocks for all PHP files and follows PEAR standards. 
  * All PHP and files classs have Docblocks 

:heavy_check_mark: 8. Has full validation on the client server side through PHP.
  * Customer input are required in the checkout.html view page. Input is validated through our PHP in the validate.php class
  * 

:heavy_check_mark: 9. All code is clean, clear, and well-commented. DRY (Don't Repeat Yourself) is practiced.
  * code is cleaned and well commented throughout each filed. DRY was implemeneted. 

:heavy_check_mark: 10. Your submission shows adequate effort for a final project in a full-stack web development course.
  * 

 BONUS: Incorporates Ajax that access data from a JSON file, PHP script, or API.
  *
  
![image](https://user-images.githubusercontent.com/115034313/227053504-efef5f8e-83c2-4f52-a7b2-f050af28e1c0.png)

![Customer](https://user-images.githubusercontent.com/98486119/227053729-4bce2e30-2747-443b-ae92-7a4fae313e55.png)
![FruitTea](https://user-images.githubusercontent.com/98486119/227053747-7ae0dbd6-e336-446d-8e2e-bd4c00eb80aa.png)

