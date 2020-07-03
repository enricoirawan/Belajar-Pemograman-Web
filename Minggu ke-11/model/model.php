<?php 
class Model {
    private $dbhandler;
    private $stmt;

    public function __construct() {
		$dsource = 'mysql:host=localhost;dbname=crud_pdo';

		try {
			$this->dbhandler = new PDO($dsource, 'root', '');
		} catch( PDOException $e ) {
			die ( $e->getMassage() );
		}
	}
     
    public function getStudentList(){
        $this->stmt = $this->dbhandler->prepare('SELECT * FROM sekolah');
		$this->stmt->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 
    public function getStudent($id){
        $allStudents = $this->stmt->getStudentList(); 
		return $allStudents[$id]; 
    } 
} 
?>
