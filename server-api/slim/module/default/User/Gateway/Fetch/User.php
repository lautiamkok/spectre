<?php
namespace Spectre\User\Gateway\Fetch;

use \Spectre\User\Gateway\Gateway;
use \Spectre\User\Model\UserModel;

class User extends Gateway
{
    public function fetch($columns = [], $where = [])
    {
        // Throw error if where search is not provide.
        if (count($where) === 0) {
            throw new \Exception('$where is empty from the mapper', 400);
        }

        // Get user.
        // https://medoo.in/api/get
        $data = $this->database->get('user', $columns, $where);

        // Throw error if no result found.
        if ($data === false) {
            throw new \Exception('No user found', 400);
        }

        // Return the result.
        return $data;
    }
}
