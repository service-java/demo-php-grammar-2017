<?php
class MySQLPDO
{

	// 默认连接信息
	private $dbConfig = array(
		'db'   => 'mysql',
		'host' => '127.0.0.1', //服务器地址
		'port' => '3306',
		'user' => 'root',
		'pass' => '',
		'charset' => 'utf8',
		'dbname' => '',		//默认数据库
	);

	private static $instance;		// 单例模式 本类对象引用
	private $db;					// 保存PDO实例
	private $data = array();		//操作数据

	/**
	 * 私有构造方法
	 * @param array $params 数据库连接信息
	 */
	private function __construct($params){
		$this->dbConfig = array_merge($this->dbConfig, $params); //初始化属性
		$this->connect(); //连接服务器
	}

	/**
	 * 获得单例对象
	 * @param array $params 数据库连接信息
	 * @return object 单例的对象
	 */
	public static function getInstance($params = array()){
		if(!self::$instance instanceof self){
			self::$instance = new self($params);
		}
		return self::$instance; //返回对象
	}

	//私有克隆
  private function __clone() {}

	//连接目标服务器
	private function connect(){
		$dsn = "{$this->dbConfig['db']}:host={$this->dbConfig['host']};port={$this->dbConfig['port']};dbname={$this->dbConfig['dbname']};charset={$this->dbConfig['charset']}";

		try {
			$this->db = new PDO($dsn,$this->dbConfig['user'],$this->dbConfig['pass']); //实例化PDO
		} catch (PDOException $e){
			die("数据库连接失败");
		}
	}

	/**
	 * 通过预处理方式执行SQL
	 * @param string $sql 执行的SQL语句模板
	 * @param bool $batch 是否批量操作 是批量操作一定要指出
	 * @return object PDOStatement
	 */
	public function query($sql, $batch=false){
		//取出成员属性中的数据并清空
		$data = $batch ? $this->data : array($this->data);  // 一定要转化成数组
		$this->data = array();

		$stmt = $this->db->prepare($sql);
		foreach($data as $v){
			if($stmt->execute($v)===false){
				die("数据库操作失败");
			}
		}
		return $stmt;
	}

	/**
	 * 保存操作数据
	 * @param array $data 需要保存的数据
	 * @return 返回对象自身用于连贯操作
	 */
	public function data($data){
		$this->data = $data;
		return $this;
	}

	/**
	 * 取得一行结果
	 * @param string $sql 执行的SQL语句
	 * @return array 关联数组结果
	 */
	public function fetchRow($sql){
		return $this->query($sql)->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * 取得所有结果
	 * @param string $sql 执行的SQL语句
	 * @return array 关联数组结果
	 */
	public function fetchAll($sql){
		return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
}
