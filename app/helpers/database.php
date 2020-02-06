<?php namespace helpers;

use \Mysqli;

/*
 * database Helper - extending Mysqli to use custom methods
 *
 * @author Taner Çetin
 * @version 2.1
 * @date June 27, 2015
 */
class Database extends Mysqli{
	
	/**
	 * @var array Array of saved databases for reusing
	 */
	protected static $instance;
	
	/**
	 * Static method get 
	 * 
	 * @param  array $group
	 * @return \helpers\database
	 */
	
	 private function __construct() {
        // turn of error reporting
        mysqli_report(MYSQLI_REPORT_OFF);

        // connect to database

        @parent::__construct(defined('DB_HOST') ? DB_HOST : 'localhost',
                             defined('DB_USER') ? DB_USER : 'root',
                             defined('DB_PASS') ? DB_PASS : '',
                             defined('DB_NAME') ? DB_NAME : 'database',
                             defined('DB_PORT') ? DB_PORT : 3306,
                             defined('DB_SOCK') ? DB_SOCK : false);

        // check if a connection established
        if( mysqli_connect_errno() ) {
            throw new exception(mysqli_connect_error(), mysqli_connect_errno()); 
        }
    }
	
	public static function get() {
        if( !self::$instance ) {
            self::$instance = new self(); 
        }
        return self::$instance;
	}

	
	/**
	 * bind_param
	*/
	private function bind_param($stmt, $array){
		
        $type = "";
		foreach($array as $value){
			if(is_int($value)){
                $type .= "i";
			} else {
                $type .= "s";
			}
		}
		
		if(!empty($array)) {
		
			$params = array_merge(array($type), $array);
			$tmpArray = array();
			foreach ($params as $i => $value) {
				$tmpArray[$i] = &$params[$i];
			}
			call_user_func_array(array($stmt,'bind_param'), $tmpArray);
		}
	}
	/**
	 * bind_result
	*/	
	private function bind_result($stmt){

		$meta = $stmt->result_metadata();
		$params = array();
		while ($field = $meta->fetch_field()) 
		{ 
			$params[] = &$row[$field->name]; 
		}
		
		if(!empty($params)) { 
			call_user_func_array(array($stmt, 'bind_result'), $params);
		}
        
        $result = array();
		while ($stmt->fetch()) { 
			foreach($row as $key => $val) 
			{ 
				$c[$key] = $val; 
			} 
			$result[] = (object)$c; 
		} 
		
		$stmt->close();
		
		return $result;
    }
	
	/**
	 * method for selecting records from a database
	 * @param  string $sql       sql query
	 * @param  array  $array     named params
	 * @param  object $fetchMode
	 * @param  string $class     class name
	 * @return array            returns an array of records
	 */
	public function select($sql,$array = array()){
		
		$stmt = $this->prepare($sql);
		$this->bind_param($stmt, $array);
		
		if ($stmt->execute()) {
			$result = $this->bind_result($stmt, $array);
			return $result;
		} else {
			return array();
		}	
	}

	/**
	 * insert method
	 * @param  string $table table name
	 * @param  array $data  array of columns and values
	 */
	public function insert($table, $data){

		ksort($data);

		$fieldNames = implode(',', array_keys($data));
		$qmark = array_fill(0,count(array_keys($data)),"?");
		$qmarkValues = implode(',', $qmark);

		$sql = "INSERT INTO $table ($fieldNames) VALUES ($qmarkValues)";
		
		$stmt = $this->prepare($sql);
		$this->bind_param($stmt, array_values($data));

		$stmt->execute();
		return mysqli_stmt_insert_id($stmt);

	}

	/**
	 * update method
	 * @param  string $table table name
	 * @param  array $data  array of columns and values
	 * @param  array $where array of columns and values
	 */
	public function update($table, $data, $where){
		
		ksort($data);

		$fieldDetails = NULL;
		$array = array();
		foreach($data as $key => $value){
			$fieldDetails .= "$key = ?,";
			$array[] = $value;
		}
		$fieldDetails = rtrim($fieldDetails, ',');

		$whereDetails = NULL;
		$i = 0;
		foreach($where as $key => $value){
			if($i == 0){
				$whereDetails .= "$key = ?";
				$array[] = $value;
			} else {
				$whereDetails .= " AND $key = ?";
				$array[] = $value;
			}
			
		$i++;}
		$whereDetails = ltrim($whereDetails, ' AND ');
		$sql = "UPDATE $table SET $fieldDetails WHERE $whereDetails";
		$stmt = $this->prepare($sql);

		$this->bind_param($stmt, $array);

		$stmt->execute();

	}

	/**
	 * Delete method
	 * @param  string $table table name
	 * @param  array $data  array of columns and values
	 * @param  array $where array of columns and values
	 * @param  integer $limit limit number of records
	 */
	public function delete($table, $where, $limit = 1){

		ksort($where);

		$whereDetails = NULL;
		$array = array();
		$i = 0;
		foreach($where as $key => $value){
			if($i == 0){
				$whereDetails .= "$key = ?";
				$array[] = $value;
			} else {
				$whereDetails .= " AND $key = ?";
				$array[] = $value;
			}
			
		$i++;}
		$whereDetails = ltrim($whereDetails, ' AND ');

		//if limit is a number use a limit on the query
		if(is_numeric($limit)){
			$uselimit = "LIMIT $limit";
		}

		$sql = "DELETE FROM $table WHERE $whereDetails $uselimit";
		$stmt = $this->prepare($sql);
		
		$this->bind_param($stmt, $array);

		$stmt->execute();

	}

	/**
	 * truncate table
	 * @param  string $table table name
	 */
	public function truncate($table){
		return $this->exec("TRUNCATE TABLE $table");
	}

}
