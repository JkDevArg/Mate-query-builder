<?php

namespace Mate;

class ConstructorProcedimientoAlmacenado
{
    protected string $nombreProcedimiento;
    protected array $parametros = [];

    public function __construct(string $nombreProcedimiento)
    {
        $this->nombreProcedimiento = $nombreProcedimiento;
    }

    public function conParametros(array $parametros): self
    {
        $this->parametros = $parametros;
        return $this;
    }

    public function aSql(): string
    {
        $placeholders = implode(', ', array_fill(0, count($this->parametros), '?'));
        return "CALL {$this->nombreProcedimiento}({$placeholders})";
    }

    public function obtenerBindings(): array
    {
        return array_values($this->parametros);
    }
}
