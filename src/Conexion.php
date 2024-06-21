<?php

namespace Mate;

use PDO;
use PDOException;

class Conexion
{
    protected PDO $pdo;

    public function __construct(string $dsn, string $usuario, string $contraseña, array $opciones = [])
    {
        try {
            $this->pdo = new PDO($dsn, $usuario, $contraseña, $opciones);
        } catch (PDOException $e) {
            throw new \Exception("Conexión fallida: " . $e->getMessage());
        }
    }

    public function consulta(ConstructorConsulta $consulta)
    {
        $stmt = $this->pdo->prepare($consulta->aSql());
        $stmt->execute($consulta->obtenerBindings());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ejecutar(ConstructorConsulta $consulta)
    {
        $stmt = $this->pdo->prepare($consulta->aSql());
        return $stmt->execute($consulta->obtenerBindings());
    }

    public function llamarProcedimiento(ConstructorProcedimientoAlmacenado $procedimiento)
    {
        $stmt = $this->pdo->prepare($procedimiento->aSql());
        $stmt->execute($procedimiento->obtenerBindings());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
