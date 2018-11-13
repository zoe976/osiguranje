 <?php
class Model {

  private $conn;

 
  
  function __construct()
  {
    global $DB_HOST, $DB_DBNAME, $DB_USERNAME, $DB_PASSWORD;
    $this->conn = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_DBNAME, $DB_USERNAME, $DB_PASSWORD);
  }

 public function dodajPolisu($vrsta, $pocetak_putovanja, $kraj_putovanja)
  {
    try {
      $stmt = $this->conn->prepare("INSERT INTO polise (vrsta, pocetak_putovanja, kraj_putovanja) VALUES (:vrsta, :pocetak_putovanja, :kraj_putovanja)");
        $stmt->bindParam(':vrsta', $vrsta);
        $stmt->bindParam(':pocetak_putovanja', $pocetak_putovanja);
        $stmt->bindParam(':kraj_putovanja', $kraj_putovanja);
        $stmt->execute();
      return $lastId = $this->conn->lastInsertId(); 
      } 
      catch (PDOException $ex) {

      echo $ex->getMessage();    
      }
  }

  public function dodajKorisnika($ime, $prezime, $telefon, $email, $datum_rodjenja)
  {
    try {
      $stmt = $this->conn->prepare("INSERT INTO korisnici (ime, prezime, telefon, email, datum_rodjenja) VALUES (:ime, :prezime, :telefon, :email, :datum_rodjenja)");
      $stmt->bindParam(':ime', $ime);
      $stmt->bindParam(':prezime', $prezime);
      $stmt->bindParam(':telefon', $telefon);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':datum_rodjenja', $datum_rodjenja);
      $stmt->execute();

      //$result = $stmt->fetch(PDO::FETCH_ASSOC); 
      return $lastId = $this->conn->lastInsertId(); 
            
    } 
    catch (PDOException $ex) {               
      echo $ex->getMessage();    
    }
  }

  public function korisnik_polisa($id_korisnik, $id_polisa, $nosilac)
  {
    try {
      $stmt = $this->conn->prepare("INSERT INTO korisnici_polise (id_korisnik, id_polisa, nosilac) VALUES (:id_korisnik, :id_polisa, :nosilac)");
      $stmt->bindParam(':id_korisnik', $id_korisnik);
      $stmt->bindParam(':id_polisa', $id_polisa);
      $stmt->bindParam(':nosilac', $nosilac);
      $stmt->execute();
      return $stmt->rowCount() ? true : false;
    } 
    catch (PDOException $ex) {
      echo $ex->getMessage();    
    }
  }

  public function polise()
  {
    try {
      $stmt = $this->conn->query("SELECT polise.id, polise.vrsta, polise.pocetak_putovanja, polise.kraj_putovanja, korisnici.ime, 
                                 korisnici.prezime, korisnici.telefon, korisnici.email FROM polise
                                 INNER JOIN korisnici_polise ON polise.id = korisnici_polise.id_polisa
                                 INNER JOIN korisnici ON korisnici.id = korisnici_polise.id_korisnik WHERE korisnici_polise.nosilac = 1");

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $ex) {
      echo $ex->getMessage();  
    }
  }

  public function nosilac_polisa($id)
  {
      try {
        $stmt = $this->conn->prepare("SELECT polise.*, korisnici.* FROM polise INNER JOIN korisnici_polise ON polise.id = korisnici_polise.id_polisa INNER JOIN korisnici ON korisnici.id = korisnici_polise.id_korisnik WHERE polise.id = :id AND korisnici_polise.nosilac = 1");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
          
      } catch (PDOException $ex) {              
        echo $ex->getMessage();  
      }
  }

   public function osiguranici_polisa($id)
  {
      try {
        $stmt = $this->conn->prepare("SELECT korisnici.* FROM korisnici INNER JOIN korisnici_polise ON korisnici.id = korisnici_polise.id_korisnik WHERE korisnici_polise.id_polisa = :id AND korisnici_polise.nosilac = 0");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
          
      } catch (PDOException $ex) {              
        echo $ex->getMessage();  
      }
  }

}
?>