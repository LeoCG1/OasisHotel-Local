<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manuel de Usuario</title>
    <style>
        h1{
            text-align: center;
            font-size: 30px;
        }
        h2{
            text-align: center;
            font-size: 25px;
        }
        li{
            margin-top: 2%;
            margin-left: 5%;
            font-size: 20px;
        }
        .manEmpleado{
            width: 80%;
            margin: 0 auto;
            margin-top: 5%;
        }
        .manEmpleado p{
            text-align: justify;
        }
        .manAdmin{
            width: 80%;
            margin: 0 auto;
            margin-top: 5%;
        }
        .manAdmin p{
            text-align: justify;
        }
    </style>
</head>
<body>
    <h1>Manual de Usuario</h1>
    <div class="manEmpleado">
        <h2>Empleados</h2>
        <ol>
            <li>Información general</li>
            <li>Calendario</li>
            <li>Notificaciones</li>
            <li>Horarios y habitaciones</li>
        </ol>
        <div>
        <h3>Información general</h3>
        <p>El usuario empleado está creado por el administrador, por ello, en su panel principal de usuario
            le aparecerá, debajo de la información (nombre, email), un botón para direccionarlo a su panel de empleado del hotel
            donde hallará sus datos, un calendario  y dos columnas, una con sus horarios y otra con sus habitaciones asignadas.
        </p>
        <p>El usuario empleado, aparte de las funciones que verá a continuación, también tiene las mismas funciones en la web de un usuario normal,
            podrá visitar la web, ojear fotos y si lo desea, hacer una reserva, crear un clente, dejar un comentario, etc.
        </p>
        </div>
        <div>
            <h3>Calendario</h3>
            <p>El usuario empleado tiene un calendario, debajo de su información personal, con el presente mes.
                En cada uno de los días del mes se verán los horarios y habitaciones que le han sido asignados a tal día si es tuviera.
            </p>
            <p>Estas asignaciones se verán de diferentes colores: Verde es el horario, cada habitación estará en azul y si tuviera una habitación asignada que
                tuviera una hora a la que ir, estará en rojo ya que es una habitación con prioridad en esa hora.
            </p>
        </div>
        <div>
            <h3>Notificaciones</h3>
            <p>Éste tipo de usuario tiene tres tipo de notificaciones que puede recibir:
            </p>
            <p>Notificación de aceptación: Aceptar un tipo de evento o suceso.</p>
            <p>Notificación de rechazo: Su petición de cambio de horario se ha denegado por el otro usuario</p>
            <p>Notificación de asignación de habitación: Se ha llevado a cabo una reserva y se le ha asignado una habitación en la fecha de salida y se le notificará fecha y hora.</p>
            <p>Cuando el usuario tenga una notificación, arriba a la izquierda del título principal, saldrá una campanita con movimiento y un texto indicandole que tiene una notificación,
                si "clica" en la campana, ésta le redigirá abajo del calendario, donde se encuentran las notificaciones.
            </p>
            <p>Las notificaciones estarán debajo del calendario y sólo podrán ser vistas si hay, ya que una vez aceptadas o rechazadas, se marcan como leidas y no estarán más a la vista.</p>
        </div>
        <div>
            <h3>Horarios y habitaciones</h3>
            <p>Se le asignarán horarios y habitaciones que podrá ver primero en el calendario y después en dos listados una para cada uno.</p>
            <p>El listado de horarios, en cada uno, habrá un botón de "Cambio de horario", éste significa que podrá solicitar un cambio de horario de ese día</p>
            <p>El funcionamiento de éste botón es: Cuando "clique" en él, se abrirá una pantalla pidiendole por que franja horaria quiere cambiar el que tiene. Luego, se
                le redirigirá un listado con empleados, que són los que tienen el horario que usted habrá previamente seleccionado, y tendrán un botón a la derecha
                para poder enviarle, al empleado que ha seleccionado, una notificación ofreciendole el cambio. Si acepta, usted recibirá una notificación de aceptación,
                indicandole su nuevo horario y la fecha. Si rechaza, recibirá igualmente una notificación, indicandole que el empleado a rechazado el cambio y usted, si quiere, podría repetir los pasos
                ofreciendole el cambio a un empleado diferente.
            </p>
            <p>Si no hubiera ningún empleado con el horario elegido, se le redigirá de vuelta a su panel de empleado con un mensaje indicandole el problema.</p>
        </div>
    </div>
    <div class="manAdmin">
        <h2>Administrador</h2>
        <ol>
            <li>Información general</li>
            <li>Creación / Eliminación / Modificación</li>
            <li>Panel de empleado</li>
        </ol>
        <div>
            <h3>Información general</h3>
            <p>El usuario administrador tendrá la posibilidad de visitar la web sin restricciones, con todos los botones a la vista
                para poder hacer cualquier acción necesaria.
            </p>
            <p>El administrador tendrá una barra pequeña azul con texto "Admin" localizada arriba a la derecha, que le seguirá aunque vaya haciendo
                scroll, para tenerla siempre disponible. Esta barra, al "clicarse", crecerá sobre la pantalla, mostrando en su interior uno iconos
                representando administradores, usuarios, clientes, reservas, empleados. Éstos iconos serán links, que si clica en ellos, le redirigirá
                al listado de la totalidad usuarios o reservas del hotel, dependiendo del icono "clicado".
            </p>
        </div>
        <div>
            <h3>Creación / Eliminación / Modificación</h3>
            <p>El administrador tendrá opción de crear, modificar o eliminar, ya sea usuarios, comentarios,  reservas o pagos dirigiendose al sitio adecuado</p>
            <p>En la zona "Opiniones", tendrá botones aparte en cada comentario para poder o eliminarlo o editarlo.</p>
            <p>En su barra de administrador podrá acceder a los listados y en cada uno de estos tendrá botones de eliminar en cada uno de ellos, o ver, para poder entrar en ellos.
            </p>
            <p>Si entra en un panel de usuario, tendrá un botón de "asignar administrador", que és la forma de crear otro administrador o también yendo al índice de administradores, en la parte superior, también habrá un botón que abrirá una pantalla para que pueda elegir entre un listado de usuarios.</p>
            <p>Si entra en un panel de cliente o reservas, tendrá las opciones de editar o borrar los pagos</p>
        </div>
        <div>
            <h3>Panel de empleado</h3>
            <p>En los paneles de usuarios, a los que puede entrar yendo al listado de empleados desde su barra de administrador, tendrá dos paneles
                pequeños al costado derecho de la información del empleado que sólo podrá ver el usuario administrador. Estos paneles són para la asignación de horarios y habitaciones.
            </p>
            <p>Para asignar un único horario, lo único que hay que hacer es introducir la fecha, la franja horaria y "clicar" en asignar. Para asignar más de un horario,
                puede apretar en "más fechas" y el espacio donde se introduce la fecha, cambiará de un espació a dos, donde el primero indicará desde cuando y el segundo hasta cuando, entonces el horario
                se asignará en todas las fechas, desde y hasta la fecha insertada.
            </p>
        </div>
    </div>
</body>
</html>