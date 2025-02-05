import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});




//ES IMPORTANTE SABER QUE SI NO  TE FUNCIONA EL PHPMYADMIN AGREGAR ESTA LINEA DE CODIGO:
/*
$cfg['Servers'][$i]['auth_type'] = 'config';
$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = '';
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Servers'][$i]['AllowNoPassword'] = true;
$cfg['Servers'][$i]['host'] = '127.0.0.1';
$cfg['Servers'][$i]['port'] = '3307'; // Nuevo puerto para MySQL
$cfg['Servers'][$i]['connect_type'] = 'tcp';

*/

// PARA EJECUTAR EL PROYECTO (NO OLVIDES CREAR PRIMERO LA BDD Y VERIFICAR SI ESTA EL MISMO NOMBRE EN EL ARCHIVO .env):
//1) comando : php artisan migrate ; 2) php artisan serve
// PARA QUE SE MUESTREN LAS IMAGENES PRIMERO BORRA LA CARPETA STORAGE Y LUEGO EJECUTA
// php artisan storage:link