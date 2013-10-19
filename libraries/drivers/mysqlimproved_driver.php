<?php
/**
 * The MySQL Improved driver extends the Database_Library to provide
 * interaction with a MySQL database
 */
class MysqlImproved_Driver extends Database_Library
{
    /**
     * Connection holds MySQLi resource
     */
    private $connection;

    /**
     * Query that will be performed
     */
    private $preparedQuery;

    /**
     * Result holds data retrieved from server
     */
    private $result;

    /**
     * Contains the last inserted id (if relevant)
     */
    private $lastInsertId;

    /**
     * Create new connection to database
     */
    public function connect()
    {
        // Connection parameters
        $host = '127.0.0.1';
        $user = 'root';
        $password = 'root';
        $database = 'miniatureMVC';

        $port = NULL;
        $socket = NULL;

        // Create the mysqli connection
        $this->connection = new mysqli
        (
            $host , $user , $password , $database , $port , $socket
        );

        if ($this->connection->connect_errno)
        {
            die('Connection error : ' . $this->connection->connect_errno . ' - ' . $this->connection->connect_error);
        }

        return true;
    }

    /**
     * Break connection to the database
     * @return bool
     */
    public function disconnect()
    {
        $this->connection->close();
        return true;
    }

    /*
     * bind_param possible variable types :
     * i = integer
     * s = string
     * d = double
     * b = blob
     */

    /**
     * Prepare the query with a dynamic number of parameters
     * @param $query
     * @param $params
     * @return bool
     */
    public function prepare($query, $params = null)
    {
        $types = ""; // Contains the types of the variables included, see the table above
        $values = null; // Contains the values to be used

        $this->preparedQuery = $this->connection->prepare($query);

        if ($this->preparedQuery === false)
        {
            die('Prepare() failed: ' . htmlspecialchars($this->connection->error));
        }

        if ($params)
        {
            // For each parameter, obtain the type and the value of the field
            foreach ($params as $param)
            {
                $types .= $param['type'];
                $bindParamArgs[] = &$param['value']; // Must be passed by reference in the bind method
            }

            // Put the types as the first item in the array, to use it with bind_param
            array_unshift($bindParamArgs , $types);

            // Create a reflection class to enable sending a dynamic number of parameters
            $stmtReflectionClass = new ReflectionClass('mysqli_stmt');
            $bindMethod = $stmtReflectionClass->getMethod("bind_param");
            $bindMethod->invokeArgs($this->preparedQuery, $bindParamArgs);
        }

        return true;
    }

    /**
     * Execute the prepared statement and store the result
     * @param bool $fetch
     * @return bool
     */
    public function execute($fetch = true)
    {
        if (isset($this->preparedQuery))
        {
            $result = $this->preparedQuery->execute();

            if ($result === false)
            {
                die('Execute() failed: ' . htmlspecialchars($this->preparedQuery->error));
            }

            if ($fetch)
            {
                $this->result = $this->preparedQuery->get_result();
            }

            $this->lastInsertId = $this->connection->insert_id;

            return true;
        }

        return false;
    }

    /**
     * Return the last id that was inserted
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->lastInsertId;
    }

    /**
     * Fetch the result from the last query
     * @param string $type
     * @param bool $singleResult
     * @return bool
     */
    public function fetch($type = 'array', $singleResult = false)
    {
        $result = null;

        if (isset($this->result))
        {
            switch ($type)
            {
                case 'array':

                    // If our query is aimed at selecting a single result (select by id)
                    if ($singleResult)
                    {
                        $result = $this->result->fetch_assoc();
                    }
                    else
                    {
                        // Fetch a row as an array
                        while ($row = $this->result->fetch_assoc())
                        {
                            $result[] = $row;
                        }
                    }

                    break;

                case 'object':
                    // Fall through...

                default:
                    // Fetch a row as an object
                    while ($row = $this->result->fetch_object())
                    {
                        $result[] = $row;
                    }

                    break;
            }
        }

        return $result;
    }
}

?>