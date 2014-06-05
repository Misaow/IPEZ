<?php

namespace app\core;

class Database
{
    /*
     * Create variables for credentials to MySQL database
     * The variables have been declared as private. This
     * means that they will only be available with the 
     * Database class
     */

    private $db_host = "localhost";  // Change as required
    private $db_user = "user";  // Change as required
    private $db_pass = "password";  // Change as required
    private $db_name = "database"; // Change as required
    private $db_prefix = ""; // Change as required

    /*
     * Extra variables that are required by other function such as boolean con variable
     */
    private $con = false; // Check to see if the connection is active
    private $result = array(); // Any results from a query will be stored here
    private $myQuery = ""; // used for debugging process with SQL return
    private $numResults = ""; // used for returning the number of rows
    
    // Get Host , user , pass & db name from the config file (Json)

    /**
     * recovered variables connection
     * @return boolean
     */
    public function getVariables()
    {
        try
        {
            $str = file_get_contents(APP.DS.'config'.DS.'database.json');
            $json = json_decode($str, true); // decode the JSON into an associative array
            $this->db_host = $json['host'];
            $this->db_user = $json['user'];
            $this->db_pass = $json['pass'];
            $this->db_name = $json['dbname'];
            $this->db_prefix = $json['prefix'];
            return true;
        } catch (Exception $e)
        {
            echo $e;
            return false;
        }
        
    }


    /**
     * Function to make connection to database
     * @return boolean
     */
    
    public function connect()
    {
        try
        {
            
        if(!$this->getVariables())
        {
            return false;
        }
        if (!$this->con)
        {
            $myconn = mysql_connect($this->db_host, $this->db_user, $this->db_pass);  // mysql_connect() with variables defined at the start of Database class
            if ($myconn)
            {
                $seldb = mysql_select_db($this->db_name, $myconn); // Credentials have been pass through mysql_connect() now select the database
                if ($seldb)
                {;
                    $this->con = true;
                    return true;  // Connection has been made return TRUE
                } else
                {
                    array_push($this->result, mysql_error());
                    return false;  // Problem selecting database return FALSE
                }
            } else
            {
                array_push($this->result, mysql_error());
                return false; // Problem connecting return FALSE
            }
        } else
        {
            return true; // Connection has already been made return TRUE 
        }
        } catch (Exception $ex) {
            echo $ex;
        }
    }


    /**
     * Function to disconnect from the database
     * @return boolean
     */
    public function disconnect()
    {
        // If there is a connection to the database
        if ($this->con)
        {
            // We have found a connection, try to close it
            if (@mysql_close())
            {
                // We have successfully closed the connection, set the connection variable to false
                $this->con = false;
                // Return true tjat we have closed the connection
                return true;
            } else
            {
                // We could not close the connection, return false
                return false;
            }
        }
    }

    public function sql($sql)
    {
        $query = @mysql_query($sql);
        $this->myQuery = $sql; // Pass back the SQL
        if ($query)
        {
            // If the query returns >= 1 assign the number of rows to numResults
            $this->numResults = mysql_num_rows($query);
            // Loop through the query results by the number of rows returned
            for ($i = 0; $i < $this->numResults; $i++)
            {
                $r = mysql_fetch_array($query);
                $key = array_keys($r);
                for ($x = 0; $x < count($key); $x++)
                {
                    // Sanitizes keys so only alphavalues are allowed
                    if (!is_int($key[$x]))
                    {
                        if (mysql_num_rows($query) >= 1)
                        {
                            $this->result[$i][$key[$x]] = $r[$key[$x]];
                        } else
                        {
                            $this->result = null;
                        }
                    }
                }
            }
            return true; // Query was successful
        } else
        {
            array_push($this->result, mysql_error());
            return false; // No rows where returned
        }
    }


    /**
     * 
     * Function to SELECT from the database
     * 
     * @param type $table
     * @param type $rows
     * @param type $join
     * @param type $where
     * @param type $order
     * @param type $limit
     * @return boolean
     */
    public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null)
    {
        try{
        // Create query from the variables passed to the function
        $q = 'SELECT ' . $rows . ' FROM ' . $this->db_prefix.$table;
        if ($join != null)
        {
            $q .= ' JOIN ' . $this->db_prefix.$join;
        }
        if ($where != null)
        {
            $q .= ' WHERE ' . $where;
        }
        if ($order != null)
        {
            $q .= ' ORDER BY ' . $order;
        }
        if ($limit != null)
        {
            $q .= ' LIMIT ' . $limit;
        }
        $this->myQuery = $q; // Pass back the SQL
        echo $q;
        // Check to see if the table exists
        // if ($this->tableExists($table))
        // {
            // The table exists, run the query
            $query = @mysql_query($q);
            if ($query)
            {
                // If the query returns >= 1 assign the number of rows to numResults
                $this->numResults = mysql_num_rows($query);
                // Loop through the query results by the number of rows returned
                for ($i = 0; $i < $this->numResults; $i++)
                {
                    $r = mysql_fetch_array($query);
                    $key = array_keys($r);
                    for ($x = 0; $x < count($key); $x++)
                    {
                        // Sanitizes keys so only alphavalues are allowed
                        if (!is_int($key[$x]))
                        {
                            if (mysql_num_rows($query) >= 1)
                            {
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            } else
                            {
                                $this->result = null;
                            }
                        }
                    }
                }
                return true; // Query was successful
            } else
            {
                array_push($this->result, mysql_error());
                return false; // No rows where returned
            }
        // } else
        // {
            // return false; // Table does not exist
        // }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
   
    /**
     * Function to insert into the database
     * @param type $table
     * @param type $params
     * @return boolean
     */
    public function insert($table, $params = array())
    {
        // Check to see if the table exists
        if ($this->tableExists($this->db_prefix.$table))
        {
            $sql = 'INSERT INTO `' . $this->db_prefix.$table . '` (`' . implode('`, `', array_keys($params)) . '`) VALUES ("' . implode('", "', $params) . '")';
            echo $sql;
            $this->myQuery = $sql; // Pass back the SQL
            // Make the query to insert to the database
            if ($ins = @mysql_query($sql))
            {
                array_push($this->result, mysql_insert_id());
                return true; // The data has been inserted
            } else
            {
                array_push($this->result, mysql_error());
                return false; // The data has not been inserted
            }
        } else
        {
            return false; // Table does not exist
        }
    }

    
    /**
     * Function to delete table or row(s) from database
     * @param type $table
     * @param type $where
     * @return boolean
     */
    
    public function delete($table, $where = null)
    {
        // Check to see if table exists
        if ($this->tableExists($this->db_prefix.$table))
        {
            // The table exists check to see if we are deleting rows or table
            if ($where == null)
            {
                $delete = 'DELETE ' . $this->db_prefix.$table; // Create query to delete table
            } else
            {
                $delete = 'DELETE FROM ' . $this->db_prefix.$table . ' WHERE ' . $where; // Create query to delete rows
            }
            // Submit query to database
            if ($del = @mysql_query($delete))
            {
                array_push($this->result, mysql_affected_rows());
                $this->myQuery = $delete; // Pass back the SQL
                return true; // The query exectued correctly
            } else
            {
                array_push($this->result, mysql_error());
                return false; // The query did not execute correctly
            }
        } else
        {
            return false; // The table does not exist
        }
    }

    
    /**
     * Function to update row in database
     * @param type $table
     * @param type $params
     * @param type $where
     * @return boolean
     */
    public function update($table, $params = array(), $where)
    {
        // Check to see if table exists
        if ($this->tableExists($this->db_prefix.$table))
        {
            // Create Array to hold all the columns to update
            $args = array();
            foreach ($params as $field => $value)
            {
                // Seperate each column out with it's corresponding value
                $args[] = $field . '="' . $value . '"';
            }
            // Create the query
            $sql = 'UPDATE ' . $this->db_prefix.$table . ' SET ' . implode(',', $args) . ' WHERE ' . $where;
            // Make query to database
            $this->myQuery = $sql; // Pass back the SQL
            if ($query = @mysql_query($sql))
            {
                array_push($this->result, mysql_affected_rows());
                return true; // Update has been successful
            } else
            {
                array_push($this->result, mysql_error());
                return false; // Update has not been successful
            }
        } else
        {
            return false; // The table does not exist
        }
    }
    
    /**
     * Private function to check if table exists for use with queries
     * @param type $table
     * @return boolean
     */
    private function tableExists($table)
    {
        $tablesInDb = @mysql_query('SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');
        if ($tablesInDb)
        {
            if (mysql_num_rows($tablesInDb) == 1)
            {
                return true; // The table exists
            } else
            {
                array_push($this->result, $this->db_prefix.$table . " does not exist in this database");
                return false; // The table does not exist
            }
        }
    }
    
    
    /**
     * Public function to return the data to the user
     * @return type
     */
    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    /**
     * Pass the SQL back for debugging
     * @return type
     */
    public function getSql()
    {
        $val = $this->myQuery;
        $this->myQuery = array();
        return $val;
    }

    /**
     * Pass the number of rows back
     * @return type
     */
    public function numRows()
    {
        $val = $this->numResults;
        $this->numResults = array();
        return $val;
    }
    
    /**
     *  Escape your string
     * @param type $data
     * @return type
     */
    public function escapeString($data)
    {
        return mysql_real_escape_string($data);
        
    }
    
    /**
     * return the database prefixe
     * @return type
     */
    public function getDb_prefix() {
        return $this->db_prefix;
    }
/**
 * Add a database prefix
 * @param type $db_prefix
 * @return \app\core\Database
 */
    public function setDb_prefix($db_prefix) {
        $this->db_prefix = $db_prefix;
        return $this;
    }


}
