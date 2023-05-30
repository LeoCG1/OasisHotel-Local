<?php

namespace Database\Seeders;
use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $titulos = [
        'Bueno ubicación y limpieza',
        'Todo correcto',
        'Hay mejores',
        'Muy buen personal',
        'Recomendable',
        'Gran experiencia',
        'Muy caro',
        'Mucho ruido',
        'Acogedor',
        'Todo muy cerca',
        'Para escapadas cortas',
        'Mejor dormir en la playa!!',
        'Me encanto su restaurante',
        'Gran terraza'
    ];
        $comments = [
            'Muy bien ubicado. La habitación y la limpieza excelente. Los empleados muy amables y atentos a todo. Pagamos una oferta por lo que el precio fue inferior al promedio e hizo valer más todavía la estancia. Muy recomendable!',
            'El hotel está muy nuevo y es muy funcional, la habitación que nos dieron daba a una avenida pero no teníamos ni un solo ruido, muy funcional y a la vez acogedora. Los colchones muy buenos, también la limpieza y destacar la aptitud del personal de recepción. Gracias de nuevo. Desde luego si vuelvo a Barcelona volveremos a hospedarnos allí, está en un lugar bastante céntrico y cerca hay sitios para comer y picotear.',
            'Hay más lugares entre los que puedes elegir en la zona.',
            'Excelente hotel. Muy bien ubicado y muy bonito. El personal es súper amable y cálido; en especial el trato y la atención que nos dieron los empleados. Además el hotel es pet friendly y son muy atentos con las mascotas.',
            'Es un hotel con identidad, distinto a la mayoría. Las habitaciones son confortables, bonitas y soleadas. El trato del personal es muy amigable, los espacios comunes tienen mucho encanto. Tan solo mejoraría algunos detalles en las habitaciones, se echan de menos zapatillas y algunas amenities (solo a demanda). Pero es un hotel muy recomendable y en una ubicación perfecta, alejado del ajetreo',
            'Quien quiera vivir una experiencia cliente, que vaya a este hotel. Todo cuidado al detalle y un personal de 10. Atención exquisita, detalles en la habitación que en mis 32 años dando vueltas por el mundo, no había visto nunca. Francamente, saben cuidar del cliente.',
            'Precio abusivo por lo que es este hotel, habitación interior, muy pequeña, el baño deteriorado. Hemos estado en otros hoteles de Valencia que le dan mil vueltas. La ubicación es buena, pero no justifica el precio por noche, no creo que sea 5 estrellas, más bien sería un 3 estrellas',
            'Cuesta encontrarlo pero una vez lo haces entras en un espacio completamente renovado. Las habitaciones no son muy espaciosas pero suficiente, el trato del casero es muy amable y el desayuno completisimo... pero se cuela en la habitacion todo el ruido de la calle y por la mañana me despertó una banda que ensayaba.',
            'Estuve un fin de semana en este hotel, está en pleno centro de Valencia a 20 minutos andando del centro histórico, muy bien comunicado.
            Muy acogedor, tranquilo y limpio.',
            'Nos pillamos dos días para hacer una visita por el oceanografic y pasear por ahí y todo a mano sin usar coche. Apartamento amplio con 2 baños y dos habitaciones cómodo y muy limpio y el personal muy atento',
            'Fui con mi pareja a cenar un día entre semana y el servicio fue lamentable. No tenían varias cosas de las que pedimos en la carta, en el local habrían unas 8 personas en total y tardaron 15 minutos en tomarnos nota y otros 25 en servirnos una miserable ensalada.',
            'Muy bien las instalaciones, el personal super amable, desde el conserje, limpieza, cafetería... Pero cabe destacar a Amparo, que se preocupó de ayudarnos con cosas para los niños. Repetiriamos sin dudas.
            Muy limpio, y habitaciones silenciosas. No falta detalle... Mascarillas, Agua, toallitas Hidroalcolicas...',
            'No aconsejable mejor dormir en la playa pelos en las toallas camas que ni en la cárcel sin ascensor sin aire acondicionado puertas y ventanas de los años 30 champús abiertos y vacíos sin retirar el colchón de la cama te envuelve como un rollito de primavera menos mal que fue una noche no vuelvo ni loco eso sí el restaurante bien',
            'Hotel con una buena calidad precio. Es correcto y limpio. Está muy bien situado. Su restaurante me encantó. Por poner algo malo diría que lo peor es que no tiene ascensor. Un hotel muy bueno para escapadas cortas.',
            'Lo mejor es pedir unas tapas y luego un arroz en la terracita del restaurante mirando a la playa de la Malvarrosa.
            Puede que el arroz no sea el mejor del mundo pero es bastante aceptable, lo que si es verdad es que si estas en la terracita y viendo la playa todo se ve de otro color.'
        ];
        $faker = Faker::create();
        foreach ($titulos as $key => $titulo){
            $comment = new Comments();
            $comment->titulo = $titulo;
            $comment->contenido = $comments[$key];
            $comment->user_id = $faker->unique()->numberBetween(1, 50);
            $comment->save();
        }
    }
}
