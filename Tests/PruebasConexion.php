<?php
/*
use PHPUnit\Framework\TestCase;
use Mate\Conexion;
use Mate\ConstructorProcedimientoAlmacenado;

class PruebasConexion extends TestCase
{
    protected Conexion $conexion;

    protected function setUp(): void
    {
        $dsn = 'mysql:host=localhost;dbname=testdb';
        $usuario = 'root';
        $contraseña = '';
        $this->conexion = new Conexion($dsn, $usuario, $contraseña);
    }

    public function testLlamarProcedimiento()
    {
        $procedimiento = (new ConstructorProcedimientoAlmacenado('getUserById'))
            ->conParametros([1]);
        $resultado = $this->conexion->llamarProcedimiento($procedimiento);

        $this->assertIsArray($resultado);
        $this->assertNotEmpty($resultado);
    }
}
*/