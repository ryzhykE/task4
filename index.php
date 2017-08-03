<?php

require_once ('config.php');
require_once ('lib/Mysql.php');
require_once ('lib/Postgres.php');
require_once ('lib/Sql.php');

	try
	{
		$result = new MySql();
		$result-> select("`key`,`data`")->from('MY_TEST');
		$result = $result->execute();

	//$resultInsert = new MySql();
	//$res = $resultInsert->inserter('MY_TEST',"`key`,`data`")->values("'user12','data12'");
	//$resultInsert->execute();

	//$resultDelete = new MySql();
	//$resultDelete->delites()->from('MY_TEST')->where("`key`='user12'");
	//$resultDelete->execute();

	//$resultUpdate = new MySql();
	//$resultUpdate->update(MYSQL_TABLE)->setkey("`data` = 'datadata12'")->where("`key` = 'user12'");
	//$resultUpdate->execute();



	$pgSelect = new Postgres();
	$pgSelect->select("key, data")->from(PG_TABLE);
	$res = $pgSelect->execute();

	//$pgInsert = new Postgres();
	//$pgInsert->inserter(PG_TABLE,"key,data")->values("'user12','data12'");
	//$resI = $pgInsert->execute();

	//$pgUpdate = new Postgres();
	//$pgUpdate->update(PG_TABLE)->setkey("data = 'test' ")->where(" key = 'user1'");
	//$resU = $pgUpdate->execute();

	//$pgDel = new Postgres();
	//$pgDel->delites()->from(PG_TABLE)->where("key='user12'");
	//$resD = $pgDel->execute();


	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
	}

	require_once ('templates/index.php');







