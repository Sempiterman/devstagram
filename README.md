Para crear un modelo,migracion y controlador con un solo comando hay dos opciones
php artisan make:model Follower -mc
php artisan make:model Follower --migration --controller
==================================================================================
//con --model=Post se le asocia directamente un modelo a nuestro policy
php artisan make:policy PostPolicy --model=Post
php artisan make:model Follower -mc
==================================================================================
//puedes agregar al final de
$table->foreignId('post_id')->constrained();
                                           ->onDelete('cascade');
==================================================================================                                           
==================================================================================
para no perder integridad de la BD de modo que cuando borres un registro tambien se haga con su correspondiente relacion, aplicamos cambios con lo siguiente para que solo tome la ultima migracion en tener cambios
php artisan migrate:rollback --step=1
php artisan migrate
==================================================================================
Recordatorio con esto creamos el modelo migracion y controlador
php artisan make:model --migration --controller Like
php artisan:migrate
==================================================================================
IMPORTANTE: si por alguna razon devuelve un 404 aplica lo siguiente una vez listado el orden de rutas, ordenalo del mismo modo en .web
aplicar del mismo modo si llega a mencionar que no esta definida la ruta
php artisan route:cache
php artisan route:list
==================================================================================
IMPORTANTE: las migraciones no siempre son para agregar tablas completas si no que a veces son para gregar solo un campo extra a una ya existente, en caso de revertirlo solo aplicar un rollback

para agregar un campo adicional a una tabla ya hecha previamente con una migracion es del siguiente modo
php artisan make:migration add_imagen_field_to_users_table

==================================================================================
en caso de que no trabaje laravel intervention o algun detalle con dropzone ir a php.ini y descomentar
extension=gd
seguido de esto reiniciar el servidor 
==================================================================================
