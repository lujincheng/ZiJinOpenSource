<?php

class Database
{
    private $db;

    public function __construct()
    {
        require_once '../config/database.php';
        $dsn = "{$config['driver']}:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}";
        try {
            $this->db = new PDO($dsn, $config['username'], $config['password'], $config['options']);
        } catch (PDOException $e) {
            error_log('Database connection failed: ' . $e->getMessage());
        }
    }

    // Alalternate query method for statements that are incompatible with very complex select methods
    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Database query failed: ' . $e->getMessage());
        }
    }

    public function select($table, $columns = "*", $data = [], $orderBy = '')
    {
        try {
            $sql = "SELECT $columns FROM $table";
            if (!empty($data)) {
                $where = implode(' AND ', array_map(fn($k) => "$k = ?", array_keys($data)));
                $sql .= " WHERE $where";
                $params = array_values($data);
            } else {
                $params = [];
            }

            if (!empty($orderBy)) {
                $sql .= " ORDER BY $orderBy";
            }
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Database select failed: ' . $e->getMessage());
        }
    }

    public function insert($table, $data)
    {
        try {
            $fields = implode(', ', array_keys($data));
            $values = implode(', ', array_fill(0, count($data), '?'));

            $sql = "INSERT INTO $table ($fields) VALUES ($values)";
            error_log($sql);
            $params = array_values($data);

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);

            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log('Database insert failed: ' . $e->getMessage());
        }
    }
	
	public function update($table, $data, $where)
	{
		$set = implode('=?, ', array_keys($data)) . '=?';
		$params = array_values($data);
		$whereClause = '';

		foreach ($where as $key => $value) {
			$whereClause .= ($whereClause === '') ? '' : ' AND ';
			$whereClause .= "$key=?";
			$params[] = $value;
		}

		$sql = "UPDATE $table SET $set WHERE $whereClause";

		try {
			$stmt = $this->db->prepare($sql);
			$stmt->execute($params);

			return $stmt->rowCount();
		} catch (PDOException $e) {
			error_log("Error: {$e->getMessage()}");

			return false;
		}
	}

	public function delete($table, $where)
	{
		$whereClause = '';

		foreach ($where as $key => $value) {
			$whereClause .= ($whereClause === '') ? '' : ' AND ';
			$whereClause .= "$key=?";
			$params[] = $value;
		}

		$sql = "DELETE FROM $table WHERE $whereClause";

		try {
			$stmt = $this->db->prepare($sql);
			$stmt->execute($params);

			return $stmt->rowCount();
		} catch (PDOException $e) {
			error_log("Error: {$e->getMessage()}");

			return false;
		}
	}

}
