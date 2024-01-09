# LicoreX
![Logo](https://i.imgur.com/MerqnV7.png)


Se trata de una aplicación de gestión de inventario con un diseño responsive
adaptable tanto para navegador como dispositivos móviles al usar Framework7.
Con un apartado que pueda facilitar los pedidos de bebidas, asignando cada uno con
sus diferentes proveedores y realizando un cálculo estimado del gasto.
Otro apartado en el que se pueda calcular y guardar las cajas diarias.
Y un registro tanto de pedidos como de cajas para poder llevar bien la contabilidad
de gastos e ingresos.
## Guia de instalación

Para poder comprobar el correcto funcionamiento de la aplicación hay que instalar un
servidor local de XAMPP.

![picture](https://i.imgur.com/JOArqFx.jpg)

Y activar los servicios de Apache y MySQL. Dando permisos al equipo para trabajar
con esos puertos.

También hay que importar la base de datos (127_0_0_1.sql), en el apartado importar de phpMyAdmin, a
donde se puede acceder si está activado XAMPP, desde un navegador escribiendo
http://localhost/phpmyadmin/

![picture](https://i.imgur.com/lR8lKN8.jpg)
O para lo de importar más concretamente desde la ruta:
http://localhost/phpmyadmin/index.php?route=/server/import

Una vez comprobemos que la base de datos está instalada:

![picture](https://i.imgur.com/LAPkGFu.jpg)

Tenemos que copiar los datos de la aplicación (la carpeta licorex), dentro de la carpeta
htdocs, que se encuentra dentro de la carpeta xampp, en el directorio donde hayamos
instalado la aplicación XAMPP.

Para lanzar la aplicación, con todos los pasos previos realizados, podemos ir a un
navegador como Google Chrome, y escribir en la barra de navegación:
http://localhost/licorex/home.php

A partir de ahí podremos movernos por la aplicación con normalidad, y comprobar en la
base de datos que hemos importado que ingresan los pedidos y las cajas correctamente.

En caso de no haber realizado correctamente alguno de los pasos previos, o que no estén
activados los módulos que he dicho del XAMPP Control Panel, es muy probable que la
aplicación de fallos de conexión de la base de datos.
O en caso de no haber copiado la carpeta en el directorio correcto aparecerá un error de ruta de archivos.

## Guia de uso

La aplicación cuenta con un menú (home.php) con varias imágenes que al pinchar sobre alguna de ellas podemos acceder a las diferentes secciones de la app:

![picture](https://i.imgur.com/huoZQQg.jpg)

(home.php)

Se puede acceder al panel lateral pinchando sobre el símbolo de las tres rayas en la parte superior, o haciendo swipe lateral desde la parte izquierda de la pantalla hacia el centro.

![picture](https://i.imgur.com/IpjYBd9.jpg)

Y los botones del panel inferior enlazan a:

![picture](https://i.imgur.com/ITTihpU.jpg)

- Casa: home.php
- Carrito: pedidos.php
- Tarjeta de una persona con un correo: distribuidores.php
- Euro: hacercaja.php
- Listado: registrocaja.php

Al pinchar sobre Hacer Pedido nos lleva a la página (hacerpedidos.php) desde donde navegando entre el desplegable de las diferentes categorías de productos, podemos elegir la cantidad de los que necesitemos. Esto se trata de un formulario, que una vez pulsemos en el botón de “Añadir al carrito” nos mandará a la siguiente pantalla (pedido.php) donde nos mostrará los detalles del pedido que acabamos de almacenar en la base de datos, junto a un mensaje de confirmación de que han sido añadidos.

![picture](https://i.imgur.com/haf3uga.jpg)

![picture](https://i.imgur.com/Zu0odqc.jpg)

(hacerpedidos.php)	

![picture](https://i.imgur.com/ogIgsq2.jpg)

(pedido.php)


En el apartado Registro de Pedidos (registropedidos.php), podemos consultar todos los pedidos que se han realizado y nos los mostrará ordenados por fecha descendente:

![picture](https://i.imgur.com/lycFmUs.jpg)

(registropedidos.php)


Al pinchar sobre Ver en la columna de Detalles podemos ver los detalles del pedido que nos los mostrará en el archivo (detalles_pedido.php):

![picture](https://i.imgur.com/cji8QBy.jpg)

(detalles_pedido.php)


Si accedemos al apartado de distribuidores nos mostrará la lista con todos ellos, su nombre, email (al pinchar sobre el mail nos abre la aplicación de correo electrónico ya preparada para enviarle un mensaje), y teléfono (al pinchar sobre el teléfono nos abre la aplicación para realizar la llamada con el numero ya preparado). Al pinchar sobre el nombre de el distribuidor, nos llevará a un nuevo archivo (pedidosxdistri.php) que mostrará los pedidos específicos que hemos realizado a ese distribuidor ordenados por fecha descendente:

![picture](https://i.imgur.com/AcA7K1a.jpg)

(distribuidores.php)

![picture](https://i.imgur.com/GUhFEWZ.jpg)

(pedidosxdistri.php)



En el archivo (pedidosxdistri.php) también tenemos una columna “Detalles” que al pulsar en “Ver” en el pedido que queremos nos llevará a la página (detalles_pedido.php) como hemos visto que se podía anteriormente en la página de Registro Pedidos.
Al pinchar sobre el icono del €, o accediendo desde la página principal o panel lateral a el apartado Hacer Caja, no llevará a un formulario (hacercaja.php) donde eligiendo la fecha para la que queremos registrarla, y añadiendo los datos de Efectivo, TPV1 y TPV2 (datáfonos para pagos con tarjeta). Una vez pulsemos el botón de “Registrar”, nos llevará a el Registro de Cajas (registrocaja.php), y ya habrá almacenado esta caja en la base de datos.

![picture](https://i.imgur.com/dg0xRwe.jpg)

(hacercaja.php)


En el apartado de Registro de Cajas (registrocaja.php), podemos ver todas las cajas almacenadas en la base de datos ordenadas por fecha descendente. También nos calculará un “Total” de caja con los datos que ha recibido del formulario. 
Aunque no se vea en esta imágen las fechas, están en la primera columna de la tabla, que se puede navegar sobre ella simplemente manteniendo pulsado y haciendo scroll lateral:

![picture](https://i.imgur.com/Podi9KZ.jpg)

(registrocaja.php)


## Documentación

[Memoria del proyecto](https://github.com/ignacio-buzon-lobo/licorex/blob/f9544e4517489c34b7cfa069fa94977485fff161/Ignacio%20Buz%C3%B3n%20Lobo%20-%20Memoria%20Proyecto%20Final%20DAM.pdf)

[Presentación del proyecto](https://github.com/ignacio-buzon-lobo/licorex/blob/f9544e4517489c34b7cfa069fa94977485fff161/Presentaci%C3%B3n%20LicoreX.pdf)
