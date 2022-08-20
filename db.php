<?php
class db
{

    protected $dbhost;
    protected $dbname;
    protected $dbuser;
    protected $dbpassword;
    public $conn;
    protected $connected;


    public function __construct($dbuser, $dbpassword, $dbname, $dbhost)
    {
        $this->dbuser     = $dbuser;
        $this->dbpassword = $dbpassword;
        $this->dbname     = $dbname;
        $this->dbhost     = $dbhost;
        $this->db_connect();
    }


    public function db_connect()
    {


        try {
            $this->conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpassword);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            $this->connected = true;
            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $this->connected = false;
            return false;
        }
        return true;
    }


    // =============================================================================================================
    //==================================== Execute the pdo qeury ===================================================
    // =============================================================================================================

    public function PDO_query($query, $operation, $args)
    {
        if (is_null($query)) {
            return;
        }
        if (is_null($operation)) {
            return;
        }

        /*
		 * Specify the formatting allowed in a placeholder. The following are allowed:
		 *
		 * - Sign specifier. eg, $+d
		 * - Numbered placeholders. eg, %1$s
		 * - Padding specifier, including custom padding characters. eg, %05s, %'#5s
		 * - Alignment specifier. eg, %05-s
		 * - Precision specifier. eg, %.2f
		 */
        $allowed_format = '(?:[1-9][0-9]*[$])?[-+0-9]*(?: |0|\'.)?[-+0-9]*(?:\.[0-9]+)?';

        /*
		 * If a %s placeholder already has quotes around it, removing the existing quotes and re-inserting them
		 * ensures the quotes are consistent.
		 *
		 * For backward compatibility, this is only applied to %s, and not to placeholders like %1$s, which are frequently
		 * used in the middle of longer strings, or as table name placeholders.
		 */
        $query = str_replace("'%s'", '%s', $query); // Strip any existing single quotes.
        $query = str_replace('"%s"', '%s', $query); // Strip any existing double quotes.
        $query = preg_replace('/(?<!%)%s/', "'%s'", $query); // Quote the strings, avoiding escaped strings like %%s.

        $query = preg_replace("/(?<!%)(%($allowed_format)?f)/", '%\\2F', $query); // Force floats to be locale-unaware.

        $query = preg_replace("/%(?:%|$|(?!($allowed_format)?[sdF]))/", '%%\\1', $query); // Escape any unescaped percents.


        if ($operation == "FETCH_ASSOC") {

            if ($this->connected) {



                $statement = $this->conn->prepare($query);
                if ($args != "") {
                    $statement->execute($args);
                } else {
                    $statement->execute();
                }

                $result = $statement->fetch(PDO::FETCH_ASSOC);


                return $result;
            }
        } elseif ($operation == "FETCH_NUM") {

            if ($this->connected) {



                $statement = $this->conn->prepare($query);
                if ($args != "") {
                    $statement->execute($args);
                } else {
                    $statement->execute();
                }
                $result = $statement->fetch(PDO::FETCH_NUM);

                return $result;
            }
        } elseif ($operation == "FETCH_ALL") {

            if ($this->connected) {



                $statement = $this->conn->prepare($query);


                try {
                    if ($args != "") {
                        $statement->execute($args);
                    } else {
                        $statement->execute();
                    }
                } catch (PDOException $e) {
                    return $e;
                }


                // $statement->execute($args);
                $result = $statement->fetchAll();



                return $result;
            }
        } elseif ($operation == "INSERT") {

            if ($this->connected) {

                $stmt = $this->conn->prepare($query);


                try {
                    if ($args != "") {
                        $stmt->execute($args);
                    } else {
                        $stmt->execute();
                    }
                    return true;
                } catch (PDOException $e) {
                    return $e;
                }
            }
        } elseif ($operation == "UPDATE") {

            if ($this->connected) {

                $stmt = $this->conn->prepare($query);


                try {
                    $stmt->execute($args);
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
            }
        } elseif ($operation == "DELETE") {

            if ($this->connected) {

                $stmt = $this->conn->prepare($query);

                try {
                    $stmt->execute($args);
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
            }
        }
    }



    //==================================== Empty a table with name ===================================================
    public function empty_table($table_name)
    {

        //Our SQL statement. This will empty / truncate the table "videos"
        $sql = "TRUNCATE TABLE $table_name";

        //Prepare the SQL query.
        $statement = $this->conn->prepare($sql);

        //Execute the statement.
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
