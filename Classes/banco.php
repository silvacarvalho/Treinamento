<?php

/**
 * Classe de Conexão com Banco de Dados - Singleton Patter
 *
 * @author Rafael Carvalho <silva_carvalho20@hotmail.com>
 * @since [01/11/2015]
 */
class Banco {

	/**
	 * const DRIVER - Driver utilizado para conexão.
	 */
	const DRIVER = 'mysql:';

	/**
	 * const HOST - Host da conexão.
	 */
	const HOST = 'localhost';
        
	/**
	 * const DB - Base de dados.
	 */
	const DB = 'cursophp';

	/**
	 * const USER - Usuario para conexão.
	 */
	const USER = 'root';

	/**
	 * const PASS - Senha para conexão.
	 */
	const PASS = '';

	/**
	 * var _opt - Opções do PDO.
	 */
	private $_opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'');

	/**
	 * var _dsn - Data Source Name
	 */
	private $_dsn;

	/**
	 * var _stmt - Query Statement.
	 */
	private $_stmt;

	/**
	 * var _instance - Instancia da Conexão.
	 */
	protected static $_instance = null;

	/**
	 *
	 * @var PDO Instancia do PDO
	 */
	public $_pdo;

	/**
	 * @return PDO
	 */
	private function __construct() {
		try {
			$this->_dsn = self::DRIVER . 'host=' . self::HOST . ';dbname=' . self::DB;
			$this->_pdo = new PDO($this->_dsn, self::USER, self::PASS, $this->_opt);
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->_pdo;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Retorna a instancia da Conexão.
	 */
	public static function getConnection() {
		if (self::$_instance === null) {
			self::$_instance = new Banco();
		}
		return self::$_instance;
	}

	public function __clone() {
		return false;
	}

	public function __wakeup() {
		return false;
	}
}
