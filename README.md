# pdo_oop_php
create a PDO by OOP in PHP :-)

Very simple and easy way to organize your codes, is OOP (Object Oriented Programming). In this case I would to explain about Database class.

"Please make sure you've understood classes in PHP"

I'm going to explain:

  - We've 7 private members, I think you should know host,user,pass,dbname. These are famous so I am going to define other variables, dbh and error.
    dbh: is a your connection and link, like mysqli connectoin, we uesd to $link = mysqli_connect(); before.
    error: it's possible that your data connection isn't correct or your database isn't available, so we have to describe our error to figure out.
EX:
Fatal error: Uncaught exception 'PDOException' with message 'SQLSTATE[42S02]: Base table or view not found: 1146 Table 'db.feeds' doesn't exist' in C:\FakePath\conn.php:41 Stack trace: #0 C:\FakePath\conn.php(41): PDOStatement->execute() #1 C:\FakePath\myfile.php(5): Database->execute() #2 {main} thrown in C:\FakePath\conn.php on line 41


You could see an error because of this:
  $this->error = $e->__toString(); this is the best function to explain about your errors.
  
  - We've a public function __construct(), when your page is going to debugging, this function could be run automatically, this is important your connection will be starting.
  
  - Your connection link will have saved below:
    $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
  When you change dbh value to NULL, it means your connection has been closed.
  This is why i use the another function, __destruct().
  
  - Other functions are using to prepare your query with high security and optimized.
  To see other functions you could see here (http://php.net/manual/en/pdo.constants.php).
  You may use them in one function in a switch but it's so easy and simple. It's easy to understand and implementation.
  You'll see Database Class in conn.php file.
  
  Let's have an example to execute a query!
  Suppose we have a table with this specification:
  
  DB name: mytable ($this->dbname = "mytable")
  DB user: root ($this->user = "root")
  DB PASSWORD: ($this->pass = "")
  HOSTNAME: localhost ($this->host = "localhost")
  TABLE name: Student:
  
  ID        F_N       L_N       SEX (1:boy)   BOD
  1         alex      alicon    1         01021991
  2         alice     haris     0         03051994
  3         katty     sosun     0         01021992
  4         james     tamson    1         09101993

You can run this query in your sql command:
 {
 INSERT INTO `mytable`.`student` (`id`, `F_N`, `L_N`, `SEX`, `DOB`) VALUES ('1', 'alex', 'alicon', '1', '01021991'), ('1', 'alice', 'haris', '0', '03051994'), ('3', 'katty', 'sosun', '0', '01021992'), ('4', 'james', 'tamson', '1', '09101993');
 }
 
 Now we want to select all a student, who is a boy, Setps:
 
 1) Create a new class, $db = new Database();
 2) Write your query, $db->query("SELECT * FROM student WHERE sex = ? ");
 3) We should specify ? , so we use the bind() function, $db->bind(1,1); , it means, first ? will be get 1 ! 
 compile:
 SELECT * FROM student WHERE sex = 1
 4) It's time to run our code, so we should write $db->execute();
 5) If you're looking for <b>one</b> row in your database's table, you should use $db->single();, otherwise, $db->resultset();
 
 Result:
  array(2) {
  [0]=>
  array(5) {
    ["id"]=>
    string(1) "1"
    ["F_N"]=>
    string(4) "alex"
    ["L_N"]=>
    string(6) "alicon"
    ["SEX"]=>
    string(1) "1"
    ["DOB"]=>
    string(7) "1021991"
  }
  [1]=>
  array(5) {
    ["id"]=>
    string(1) "4"
    ["F_N"]=>
    string(5) "james"
    ["L_N"]=>
    string(6) "tamson"
    ["SEX"]=>
    string(1) "1"
    ["DOB"]=>
    string(7) "9101993"
  }
}

You can also use other functions like rowCount,lastInsertId for get more information, but you can add new functions!


  
  
