<?php
require_once 'register.fnc.php';

/**
 * Register test case.
 * @author Mirza Kuljancic
 */
class registertest extends PHPUnit_Framework_TestCase {
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
	
	}
	/**
	* Testen einer erfolgreichen 
	* Registrierung
	*/
	public function testerfolg(){
		$bname = "asdf112";
		$pw1 = "asdfg1";
		$pw2 = "asdfg1";
		
		$status = Reg_richtigkeit_ueberprufen($bname,$pw1,$pw2);
		$this->assertEquals(REG_ERFOLGREICH, $status);
	}
	
	/**
	* Testen einer leeren Eingabes
	*/
	public function testleer(){
		$bname = "asdf112";
		$pw1 = "asdfg1";
		$pw2 = "asdfg2";
		
		$status = Reg_richtigkeit_ueberprufen("",$pw1,$pw2);
		$this->assertEquals(REG_FEHLER_LEER, $status);
		
		$status = Reg_richtigkeit_ueberprufen($bname,"",$pw2);
		$this->assertEquals(REG_FEHLER_LEER, $status);
		
		$status = Reg_richtigkeit_ueberprufen($bname,$pw1,"");
		$this->assertEquals(REG_FEHLER_LEER, $status);
	}
	/**
	* Testen der gleichheit der PW
	*/
	public function testpwgleich(){
		$bname = "asdf112";
		$pw1 = "asdfg1";
		$pw2 = "asdfg2";
		
		$status = Reg_richtigkeit_ueberprufen($bname,$pw1,$pw2);
		
		$this->assertEquals(REG_FEHLER_UNGLEICHPW, $status);
	}
	
	/**
	* Testen der gueltigen Zeichen fuer die 
	* Eingabe
	*/
	public function testzeichen(){
		$bname = "asdf112";
		$pw1 = "asdfg1";
		$pw2 = "asdfg2";
		
		$status = Reg_richtigkeit_ueberprufen($bname,$pw1,$pw2);
		$this->assertNotEquals(REG_FEHLER_ZEICHENUNG, $status);
		
		$status = Reg_richtigkeit_ueberprufen("asdfasdf??!!",$pw1,$pw2);
		$this->assertEquals(REG_FEHLER_ZEICHENUNG, $status);
	}
	
	/**
	* Testen der gueltigen Lange der Eingaben
	*/
	public function testlenge(){
		$bname = "asdf";
		$pw = "asdfg1";
		
		$status = Reg_richtigkeit_ueberprufen($bname,$pw,$pw);
		$this->assertNotEquals(REG_FEHLER_LAENGE, $status);
		
		$status = Reg_richtigkeit_ueberprufen("123",$pw,$pw);
		$this->assertEquals(REG_FEHLER_LAENGE, $status);
		
		$status = Reg_richtigkeit_ueberprufen($bname,"12345","12345");
		$this->assertEquals(REG_FEHLER_LAENGE, $status);
	}
}

