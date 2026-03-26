<?php
class Database {
    private $host = "localhost";
    private $port = "5433";
    private $db_name = "postgres";
    private $username = "postgres";
    private $password = "10101868";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
              "pgsql:host={$this->host};port={$this->port};dbname={$this->db_name}",
              $this->username,
              $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET NAMES 'utf8'");
        } catch (PDOException $exception) {
            // No hacer echo aquí — lanzar excepción para que el caller la capture
            throw new PDOException($exception->getMessage(), (int)$exception->getCode());
        }
        return $this->conn;
    }
}
?>
