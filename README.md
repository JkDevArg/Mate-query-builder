# Mate

Bienvenidos a **Mate**, una biblioteca simple de constructor de consultas para PHP 8.3 con soporte para procedimientos almacenados. Inspirada en la tradición argentina de compartir un mate, esta biblioteca busca hacer que la creación y ejecución de consultas SQL sea tan placentera y colaborativa como una buena ronda de mate.

## Introducción

El mate es una bebida tradicional de Argentina, Uruguay, Paraguay y el sur de Brasil. Compartir un mate es un acto social, una excusa para juntarse, charlar y disfrutar del momento. Al igual que el mate, esta biblioteca está diseñada para hacer que trabajar con consultas SQL en PHP sea una experiencia simple y agradable, invitando a los desarrolladores a colaborar y compartir sus conocimientos.

## Instalación

Para instalar la biblioteca Mate, puedes usar Composer. Asegúrate de tener Composer instalado y luego ejecuta el siguiente comando:

```sh
composer require jcenturion/mate-query-builder
```

## Casos de usos

```php
require 'vendor/autoload.php';

use Mate\Conexion;

$dsn = 'mysql:host=localhost;dbname=testdb';
$usuario = 'root';
$contraseña = '';
$conexion = new Conexion($dsn, $usuario, $contraseña);

```

```php
use Mate\ConstructorSelect;

$consulta = (new ConstructorSelect())
    ->tabla('usuarios')
    ->seleccionar(['id', 'nombre', 'email'])
    ->donde('id', '=', 1);

$resultado = $conexion->consulta($consulta);

print_r($resultado);

```

```php
use Mate\ConstructorInsert;

$insertar = (new ConstructorInsert())
    ->tabla('usuarios')
    ->datos([
        'nombre' => 'Juan',
        'email' => 'juan@example.com'
    ]);

$conexion->ejecutar($insertar);

```

```php
use Mate\ConstructorUpdate;

$actualizar = (new ConstructorUpdate())
    ->tabla('usuarios')
    ->datos(['email' => 'nuevoemail@example.com'])
    ->donde('id', '=', 1);

$conexion->ejecutar($actualizar);

```

```php
use Mate\ConstructorDelete;

$eliminar = (new ConstructorDelete())
    ->tabla('usuarios')
    ->donde('id', '=', 1);

$conexion->ejecutar($eliminar);

```

```php
use Mate\ConstructorProcedimientoAlmacenado;

$procedimiento = (new ConstructorProcedimientoAlmacenado('getUserById'))
    ->conParametros([1]);

$resultado = $conexion->llamarProcedimiento($procedimiento);

print_r($resultado);

```

### Contribuir

Las contribuciones son bienvenidas. Siéntete libre de abrir un issue o enviar un pull request. Disfrutemos juntos de este mate mientras mejoramos nuestra biblioteca de consultas SQL.

### Licencia

Este proyecto está licenciado bajo la licencia MIT. Consulta el archivo LICENSE para obtener más información.

¡Gracias por usar Mate! Esperamos que esta biblioteca haga que tu experiencia de desarrollo sea tan agradable como compartir un mate con amigos.
