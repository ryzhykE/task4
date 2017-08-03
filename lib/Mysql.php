<?php

require_once ('lib/Sql.php');

class MySql extends Sql
{
   private $db;

    public function __construct()
    {
        if(!$this->db = mysql_connect(HOST, USER, PASSWORD))
        {
            throw new Exception(mysql_error());
        }
        if(!mysql_select_db(DB, $this->db) )
        {
            throw new Exception(mysql_error());
        }
    }



    public function execute()
    {
        $query =  parent::execute();
        $result = mysql_query($query, $this->db );

        if(is_resource($result)) {
            $data = [];
            while ($row = mysql_fetch_assoc($result))
            {
                foreach ($row as $key => $val)
                {
                    $data[][$key] = $val;
                }
            }
            return $data;
        }
        else
        {
           return mysql_error();
        }

    }

    public function __destruct()
    {
        mysql_close($this->db );
    }


}



