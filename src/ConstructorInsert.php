<?php

namespace Mate;

class ConstructorInsert extends ConstructorConsulta
{
    protected array $datos;

    public function datos(array $datos): self
    {
        $this->datos = $datos;
        return $this;
    }

    public function aSql(): string
    {
        $columnas = implode(', ', array_keys($this->datos));
        $placeholders = implode(', ', array_fill(0, count($this->datos), '?'));
        $sql = "INSERT INTO {$this->tabla} ({$columnas}) VALUES ({$placeholders})";
        $this->bindings = array_values($this->datos);
        return $sql;
    }
}
