<?php

namespace Mate;

class ConstructorSelect extends ConstructorConsulta
{
    public function columnas(array $columnas): self
    {
        $this->columnas = $columnas;
        return $this;
    }

    public function aSql(): string
    {
        $columnas = implode(', ', $this->columnas);
        $sql = "SELECT {$columnas} FROM {$this->tabla}";

        if (!empty($this->donde)) {
            $dondeClausulas = array_map(fn($d) => "{$d[0]} {$d[1]} ?", $this->donde);
            $sql .= " WHERE " . implode(' AND ', $dondeClausulas);
        }

        return $sql;
    }
}
