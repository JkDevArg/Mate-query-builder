<?php

namespace Mate;

class ConstructorUpdate extends ConstructorConsulta
{
    protected array $datos;

    public function datos(array $datos): self
    {
        $this->datos = $datos;
        return $this;
    }

    public function aSql(): string
    {
        $setClausulas = array_map(fn($col) => "{$col} = ?", array_keys($this->datos));
        $sql = "UPDATE {$this->tabla} SET " . implode(', ', $setClausulas);
        $this->bindings = array_values($this->datos);

        if (!empty($this->donde)) {
            $dondeClausulas = array_map(fn($d) => "{$d[0]} {$d[1]} ?", $this->donde);
            $sql .= " WHERE " . implode(' AND ', $dondeClausulas);
            $this->bindings = array_merge($this->bindings, array_column($this->donde, 2));
        }

        return $sql;
    }
}
