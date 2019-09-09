<?php
namespace swiftphp\data\doctrine;

use Doctrine\DBAL\Logging\SQLLogger;
use swiftphp\system\Console;

class SQLLoggerImpl implements SQLLogger
{
    /**
     * Logs a SQL statement somewhere.
     *
     * @param string     $sql    The SQL to be executed.
     * @param array|null $params The SQL parameters.
     * @param array|null $types  The SQL parameter types.
     *
     * @return void
     */
    public function startQuery($sql, array $params = null, array $types = null)
    {
        $sql=str_replace(" FROM", "\r\nFROM", $sql);
        $sql=str_replace(" WHERE", "\r\nWHERE", $sql);
        $sql=str_replace(" ORDER BY", "\r\nORDER BY", $sql);
        $sql=str_replace(" INNER JOIN", "\r\nINNER JOIN", $sql);
        Console::printLine($sql."\r\n");
    }

    /**
     * Marks the last started query as stopped. This can be used for timing of queries.
     *
     * @return void
     */
    public function stopQuery()
    {

    }
}

