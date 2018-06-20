<?php

use Illuminate\Database\Seeder;

class UvasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('uvas')->insert([
        	[
        "title"=> "Grenache",
        "subtitle"=> "Garnacha",
        "image"=> "storage/images/uva.jpeg",
        "olfato"=> "muy aromáticos, frescos y ftorales que recuerdan la frambuesa",
        "gusto"=> "frutas negras muy maduras, ciruelas secas",
        "vista"=> " intenso, rojo dorado",
        "maridaje"=> "Paella, Fideos, chiles rellenos de queso, atún o frijoles. Arroces"
      ],
      [
        "title"=> "Carinana",
        "subtitle"=> "Carignan",
        "image"=> "storage/images/uva1.jpeg",
        "olfato"=> "De aromas que recuerdan las frutas rojas en mermelada.",
        "gusto"=> "Sabores frescos, en ocasiones muy perfumados.",
        "vista"=> "rojo claro, de color brillante",
        "maridaje"=> "Mariscos, pastas livianas"
      ],
      [
        "title"=> "Tempranillo",
        "subtitle"=> "Cencibel de la Mancha, Tinto de Toro, Tinto de Madrid, Tinta Aragonesa, Arganda",
        "image"=> "storage/images/uva2.jpg",
        "olfato"=> "frutas rojas maduras, principalmente ciruelas y grosellas, con algo de frutos secos. Tambien deja sentir frutos silvestres, guindas, frambuesas y un leve olor a pasto recién cortado. Complementados con tabaco, café y cacao",
        "gusto"=> "paladar franco, interesante en vino joven y aterciopelado cuando envejece. No es una variedad muy rica en taninos, por lo que suelen ser amables en boca y sabrosos. Sabores que recuerdan las fresas y frutos silvestres (moras, grosellas, etc). El roble le aporta notas de chocolate y vainilla",
        "vista"=> "Color rojo intenso y matices violáceos en su juventud; con los años se transforma en teja",
        "maridaje"=> "Pastas con salsas livianas, carnes asadas como corderos y chivos, pescados de río, guisos, embutidos y quesos suaves"
      ],
      [
        "title"=> "Cabernet Sauvignon",
        "subtitle"=> "",
        "image"=> "storage/images/uva3.jpeg",
        "olfato"=> "frutas rojas y especiadas, floral obscuro y herbales",
        "gusto"=> "Pimiento verde o herbáceo causado por las pirazinas. Menta y eucalipto",
        "vista"=> "Color rojo obscuro con matices violetas.",
        "maridaje"=> "El Cabernet Sauvignon es ideal para acompañar: Quesos cambembert y similares, todas las carnes rojas, carnes de caza, pastas salseadas y picantes, guisos y estofados."
      ], 
      [
        "title"=> "Cabernet Franc",
        "subtitle"=> "Bouchet, Gros Bouchet, Bouchy, Breton",
        "image"=> "storage/images/uva4.jpeg",
        "olfato"=> "suave y delicado, presenta aroma herbáceo con notas a frutas rojas maduras como la frambuesa y en algunas ocasiones recuerda a mermelada",
        "gusto"=> " Sabor seco, ligero y de fina textura. Cuando no se abusa del roble, delicadamente tánico",
        "vista"=> "Del rubí al granate",
        "maridaje"=> ""
      ],
      [
        "title"=> "Merlot",
        "subtitle"=> "Semillon rouge, Merlau, Bigney",
        "image"=> "storage/images/uva5.jpeg",
        "olfato"=> "Aromas bien definidos, de fruta roja y especias suaves, como la canela y el azafrán. Suele dar vinos de larga guarda en Burdeos.",
        "gusto"=> " Ciruela, pasa de uva, miel y menta",
        "vista"=> "Rubi intenso y violeta",
        "maridaje"=> "Platos con legumbres, frutos secos; Verduras asadas; Carnes de caza(pato, vizcacha, conejo); Pescado en salsa; Estofados o guisos livianos; Arroz; Quesos semiduros; Como postre, con membrillos."
      ],
      [
        "title"=> "Malbec",
        "subtitle"=> "",
        "image"=> "storage/images/uva6.jpeg",
        "olfato"=> "Aporta estructura y aromas frescos a los grandes vinos de Burdeos. Con ella se elaboran delicados y frutales vinos en la Argentina.",
        "gusto"=> "Frutas rojas frescas como la frambuesa y en ocasiones higo y moras.",
        "vista"=> "Rojo rubí y violeta",
        "maridaje"=> "Pastas con quesos o bien condimentadas. Empanadas de pescado, rajas con queso y carne. Risottos.",
      ],
      [
        "title"=> "Petit Verdot",
        "subtitle"=> "",
        "image"=> "storage/images/uva7.jpeg",
        "olfato"=> "Frutos negros y bayas como las moras, melaza y alquitran",
        "gusto"=> "Frutos negros, moras  vainilla, coco y madera dulce",
        "vista"=> "Rojo tenue por lo general",
        "maridaje"=> "En España y México puede encontrarse en vinos monovarietales, Platillos condimentados.",
      ],
      [
        "title"=> "Nebbiolo",
        "subtitle"=> "",
        "image"=> "storage/images/uva8.jpeg",
        "olfato"=> "Intensos aromas anisados y cuando la madera de la barrica es de tostado medio o alto, aromas de café, tabaco y chocolate.",
        "gusto"=> "Gusto cálido y sabores aterciopelados.",
        "vista"=> "De color rojo intenso, a veces violeta.",
        "maridaje"=> "Pastas, carnes a la parrilla, filete, mole negro",
      ],
      [
        "title"=> "Barbera",
        "subtitle"=> "",
        "image"=> "storage/images/uva9.jpeg",
        "olfato"=> "Notas que recuerdan a la zarzamora y las moras frescas. También a la pimienta blanca",
        "gusto"=> "Suele ser intenso en boca, con larga caudalia y retrogusto de especias finas como el cardamomo y en ocasiones un sutil dejo de genciana.",
        "vista"=> "Brillante y atractivo. De rojo claro a intenso según la edad.",
        "maridaje"=> "Pulpo en salsa de chile, platillos de la cocina mexicana tradicional no picantes.",
      ],
      [
        "title"=> "Zinfandel",
        "subtitle"=> "",
        "image"=> "storage/images/uva10.jpeg",
        "olfato"=> "Aromas muy frutales, hoja de jamaica y a veces arándano",
        "gusto"=> "De sabores que recuerdan la ciruela dulce y el tamarindo",
        "vista"=> "Rojo rubí de matices más bien ligeros.",
        "maridaje"=> "Si es joven, con pizzas y tapas. Sim tiene crianza con platillos de sabores intensos"
      ],
      [
        "title"=> "Syrah",
        "subtitle"=> "",
        "image"=> "storage/images/uva11.jpeg",
        "olfato"=> "Cuero, la trufa, violeta entre los mas destacados. Los Syrahjóvenes tienen aromas muy agradables a violeta, cassis, coco, higos, frutos secos, grafito, vainilla, violeta, mermelada de ciruelas, grosella negra y zarzamora. Los Syrah con crianza en roble desarrollan otros aromas, ligeros toques ahumados, coco, higos secos, aceituna negra, trufa, clavo de olor, especias.",
        "gusto"=> "Untuoso, vigoroso con buen grado alcohólico, suave, con gran cantidad de taninos que se redondean y reducen su astringencia durante la crianza en barricas, mejorando las propiedades naturales del cepaje y lo habilitan para largas estibas en botella. Predominan los sabores a grosella negra, cassis, y mermelada de ciruelas, zarzamoras y sabores especiados dejando un prolongado recuerdo en la boca.",
        "vista"=> "Joven, presenta colores muy oscuros e intensos del estilo rojo grosella o frambuesa o violeta intenso",
        "maridaje"=> "Muy recomendable para acompañar platillos sofisticados de nuestra cocina por la intensidad aromática y de sabores."
      ],
      [
        "title"=> "Mourvedre",
        "subtitle"=> "Monastrell, Morrastell, Vermeta",
        "image"=> "storage/images/uva12.jpeg",
        "olfato"=> "De aromas herbáceos que emigran con el aire a frutas rojas frescas compostas y pasas",
        "gusto"=> "Sabor intenso con taninos suaves",
        "vista"=> "",
        "maridaje"=> "Cocina de tipo mediterráneo."
      ],
      [
        "title"=> "Cinsault",
        "subtitle"=> "",
        "image"=> "storage/images/uva13.jpeg",
        "olfato"=> "Más bien especioso y muy aromático en general",
        "gusto"=> "Un poco astringente pero de retrogusto fijo y elegante de mediana acidez",
        "vista"=> "Intensa fragancia frutal y frescos con notas de pasas y almibar",
        "maridaje"=> "Quesos cremosos como el brie y el Camembert. Frutas secas"
      ],
      [
        "title"=> "Petit Syrah",
        "subtitle"=> "",
        "image"=> "storage/images/uva14.jpeg",
        "olfato"=> "De notas alegres y frutales hata intensos aromas de berries en compota",
        "gusto"=> "Con notas que recuerdan las fresas en mermelada y las especias de sabores dulces, como la canela y el azafrán.",
        "vista"=> "",
        "maridaje"=> "Jamón bellotero, embutidos finos"
      ],
      [
        "title"=> "Pinot Noir",
        "subtitle"=> "pinot negro, pinot blanco, pinot gris",
        "image"=> "storage/images/uva15.jpeg",
        "olfato"=> "Frutas rojas y negras como cereza, frambuesa, grosella, guinda, violeta, coco, pasto recién cortado. Cuando joven el Pinot Noir exhibe una amplia gama de aromas frutados de la franja de las frutillas, las frambuesas y grosellas",
        "gusto"=> "Delicado, sus taninos y la acidez son bajos y aparecen sabores a frutillas, arándalos, violetas, canela, rosas y anís. Una característica muy común en los pinots argentinos es que huele a tierra u hongos. La crianza en roble le aporta marcadas expresiones de vainilla, tabaco y cuero",
        "vista"=> "Cuando es joven, es de color rojo rubí con reflejos violeta. A medida que envejece ofrece reflejos anaranjados y ocres",
        "maridaje"=> "Pescado, aves ligeras de caza como pato, comidas con salsas a bases de hongos, platos de carne elaborados, pastas con crema"
      ],
      [
        "title"=> "Sangiovese",
        "subtitle"=> "",
        "image"=> "storage/images/uva16.jpeg",
        "olfato"=> "florales, especialmente de rosas. Además da con aromas muy variables",
        "gusto"=> "toque de cerezas amargas al final, fresco. Se caracteriza también por su elevada acidez, poco extracto, graduación media y no ofrecer una resistencia demasiado buena a la oxidación",
        "vista"=> "tono rojo púrpura que evoluciona hacia el anaranjado",
        "maridaje"=> "Pizzas pastas con salsas de tomate, pescados fritos y marinados, pescados a la plancha y arroces de color"
      ]
        ]);
    }
}
