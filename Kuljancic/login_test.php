<?php
require_once 'login.fnc.php';

/**
 * Login test case.
 */
class logintest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var register
	 */ private $testuser = 'testuser';
		private $testpw = 'bla';
	
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
	 * Pr�fen, ob ein g�ltiger Login funktioniert
	 */
	public function testerfolg(){
		//Pr�fen, ob ein g�ltiger Logina, auch als g�ltig erkannt wird
		$status = Benutzer_login($this->testuser,$this->testpw);
		$this->assertEquals(true, is_a($status,'User'));
		//Pr�fen, ob ein ung�ltiger Login, nicht als g�ltig erkannt wird
		$status = Benutzer_login($this->testuser,'hallo');
		$this->assertNotEquals(true, is_a($status,'User'));
		
	}
	
	/**
	 * Pr�fen, ob erkannt wird, ob ein Benutzer vorhanden ist
	 */
	public function testbenutzerexist(){
		
		$status = Benutzer_login($this->testuser,$this->testpw);
		$this->assertNotEquals(LOGIN_USERFALSE, $status);
		
		$status = Benutzer_login('hallo',$this->testpw);
		$this->assertEquals(LOGIN_USERFALSE, $status);
		
	}
	
	/**
	 * Erkennung eines falschen Passwortes
	 */
	public function testpwok(){
		
		$status = Benutzer_login($this->testuser,$this->testpw);
		$this->assertNotEquals(LOGIN_PWFALSE, $status);
		
		$status = Benutzer_login($this->testuser,'hallo');
		$this->assertEquals(LOGIN_PWFALSE, $status);
		
	}
}

