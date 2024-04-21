<?php

namespace Thunder;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Photos class
 */
class Photos extends Migration
{
	
	public function up()
	{

		

    $this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
    $this->addColumn('user_id int(11) default 0 NOT NULL');
    $this->addColumn('title varchar(100) NULL');
    $this->addColumn('image varchar(1024) NULL');
    $this->addColumn('link varchar(1024) NULL'); // Add this line
    $this->addColumn('date_created datetime NULL');
    $this->addColumn('date_updated datetime NULL');
    $this->addPrimaryKey('id');
    $this->addKey('user_id');
    $this->createTable('photos');



	} 

	public function down()
	{
		$this->dropTable('photos');
	}

}