<?php

namespace Mate;

abstract class ConstructorConsulta
{
    protected string $tabla;
    protected array $columnas = [];
    protected array $donde = [];
    protected array $bindings = [];

    public function tabla(string $tabla): self
    {
        $this->tabla = $tabla;
        return $this;
    }

    public function seleccionar(array $columnas = ['*']): ConstructorSelect
    {
        return (new ConstructorSelect($this))->columnas($columnas);
    }

    public function insertar(array $datos): ConstructorInsert
    {
        return (new ConstructorInsert($this))->datos($datos);
    }

    public function actualizar(array $datos): ConstructorUpdate
    {
        return (new ConstructorUpdate($this))->datos($datos);
    }

    public function eliminar(): ConstructorDelete
    {
        return new ConstructorDelete($this);
    }

    public function donde(string $columna, string $operador, mixed $valor): self
    {
        $this->donde[] = [$columna, $operador, $valor];
        $this->bindings[] = $valor;
        return $this;
    }

    abstract public function aSql(): string;

    public function obtenerBindings(): array
    {
        return $this->bindings;
    }
}
