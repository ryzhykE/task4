<?php

require_once ('lib/Sql.php');

class Postgres extends Sql
{
    protected $connect;

    public function __construct()
    {
       // $this->connect = pg_connect("host=localhost dbname=user1 user=postgres");
        $this->connect = pg_connect("host=localhost  port=5432 dbname=user1 user=user1 password=user1z");
        if(!$this->connect )
        {
            throw new Exception(NO_CONNECT);
        }
    }


    public function execute()
    {
        $query =  parent::execute();
        $result = pg_query($this->connect, $query);

            if(is_resource($result))
            {
               $data=[];
                while($row = pg_fetch_array($result, null, PGSQL_ASSOC))
                {
                    foreach ($row as $key => $val)
                    {
                        $data[][$key] = $val;
                    }

                }
                return $data;
            }
    }
}









