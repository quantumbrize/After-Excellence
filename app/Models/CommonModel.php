<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    /**
     * Execute a custom SQL query.
     *
     * @param string $sql The SQL query to execute.
     * @return array|null The result of the query.
     */
    public function customQuery(string $sql): ?array
    {
        try {
            $query = $this->db->query($sql);

            // Check if the query is a SELECT statement
            if (stripos($sql, 'SELECT') === 0) {
                return $query->getResult();  // Return results for SELECT queries
            } else {
                // For INSERT, UPDATE, DELETE, etc.
                return [
                    'affected_rows' => $this->db->affectedRows(),  // Return the number of affected rows
                    'insert_id' => $this->db->insertID()  // Return the last insert ID if applicable
                ];
            }
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            // Optionally return null or an error message
            return [
                'error' => $e->getMessage()  // Return error message for exception handling
            ];
        }
    }

}