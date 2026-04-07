<?php
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$app = new \App\Application(dirname(__DIR__));
$app->bootstrap();

$hasher = new DefaultPasswordHasher();
$conn = ConnectionManager::get('default');

$users = [
    ['nombre' => 'Jhon', 'apellido' => 'Flores', 'correo' => 'jhonemanuel56@gmail.com', 'password' => '1234', 'language' => 'es', 'telefono' => '70000001'],
    ['nombre' => 'Daniel', 'apellido' => 'Flores', 'correo' => 'danielflores5610@gmail.com', 'password' => 'password123', 'language' => 'es', 'telefono' => '70000002'],
    ['nombre' => 'Javier', 'apellido' => 'qwer', 'correo' => 'jav@gmail.com', 'password' => 'password123', 'language' => 'es', 'telefono' => '70000003'],
];

foreach ($users as $user) {
    $user['password'] = $hasher->hash($user['password']);
    $conn->execute(
        "INSERT IGNORE INTO users (nombre, apellido, correo, password, language, telefono) VALUES (?, ?, ?, ?, ?, ?)",
        array_values($user)
    );
    echo "Usuario {$user['correo']} insertado.\n";
}
echo "Seed completado.\n";
