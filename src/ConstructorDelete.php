<?php

namespace Mate;

class ConstructorDelete extends ConstructorConsulta
{
    public function aSql(): string
    {
        $sql = "DELETE FROM {$this->tabla}";

        if (!empty($this->donde)) {
            $dondeClausulas = array_map(fn($d) => "{$d[0]} {$d[1]} ?", $this->donde);
            $sql .= " WHERE " . implode(' AND ', $dondeClausulas);
        }

        return $sql;
    }
}
