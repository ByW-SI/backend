@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="col-6 input-group input-group-lg mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
		  </div>
		  <input type="text" class="form-control" placeholder="Buscar.." aria-label="Buscar.." aria-describedby="basic-addon1">
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col" style="width: 190px">Nombre del viñedo</th>
						<th scope="col">Año</th>
						<th scope="col">Filosofía</th>
						<th scope="col">Locación</th>
						<th scope="col">Enologo</th>
						<th scope="col">Viñas</th>
						<th scope="col">Telefono</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">Aborigen</th>
						<th>2000</th>
						<th>Aborigen,  el hombre que viene de la tierra.  Palabra que representa el cmpromiso con el ser humano con su entorno.  Reconociendo al hombre ocmo un elemento mas del contexto.   Sacar al vino de los espacios traicionales, tanto en su concepcion como en su elaboracion.  Trabjar el lado experimental, necesario en toda region que esta buscando su identidad.  Hacer vino dede la virtualidad.  Obteneiendo vinos en sitios disponibles.  Hacer una llamado a recuperar el oficio, elaborar el vino desde el quehacer agricola, una simple interpretacion (expresión) del dia a dia para si recobrar la escala humana</th>
						<th>San Antonio de las Minas, Ensenada, Baja California</th>
						<th>Hugo D´Acosta</th>
						<th></th>
						<th>555588996633</th>
					</tr>

					<tr>
						<th scope="row">Adobe Guadalupe</th>
						<th>2000</th>
						<th>Crear un abmiente de armonia con la naturaleza en donde la gente pueda vivir una experiencia unica acompañada de vino servicios de alta calidad y un trato amable.   Adobe Guadalupe es un lugar especial, un lugar destinado a tener vida y espieitu propios</th>
						<th>El Porvenir, Ensenada, Baja California</th>
						<th>Daniel Lonnberg</th>
						<th>Cabernet Sauvignon, Merlo, Nebbiolo, Tempranillo, Malbec, Grenache, Cinsault, Mourvedre, Syran y Viogner</th>
						<th>555588996633</th>
					</tr>

					<tr>
						<th scope="row">Barón Balche</th>
						<th>2001</th>
						<th></th>
						<th>El Porvenir, Ensenada, Baja California</th>
						<th>Oscar Delgado Rodriguez</th>
						<th></th>
						<th>555588996633</th>
					</tr>

					<tr>
						<th scope="row">Casa de Piedra</th>
						<th>2000</th>
						<th>Nace como un proyecto de inspiracion familiar. La idea motora es y siempre ha sido; obtener vinos que esten caracterizados por su "origen". En las elaboraciones se ha buscado resaltar los elmeentos que conforman el sitio donde se cultivan las uvas.  Desde que iniciaron esa singular aventura, han pasado por los molins de la casa 17 vendimias.  hasta el momento, han liberado 15 cosechas que tratan de reflejar una sensiblidad enologica supeditada al contexto.  Al mantener siempre una escala que les ha permitido cuidad cada botella y asi, imprimirle en lo posible la personalidad del terruño.  Su compromiso es trasladar los sabores y experiencias de la tiera donde vivimos, a traves de los vinos que ofrecen.</th>
						<th>Valle de Guadalupe, Baja California</th>
						<th>Hugo D´Acosta</th>
						<th>Tempranillo, Cabernet Sauvignon, Chardonnay</th>
						<th>5523567941</th>
					</tr>

					<tr>
						<th scope="row">Casta de Vinos</th>
						<th>2010</th>
						<th>Bodega boutique, familiar y llena de pasion, es decir, con vinos de autor, pero con una produccion en crecimiento año con año, con la resonsabilidad sobre los intereses de la tierra de Valle de Guadalupe respetando al maximo el entorno, comprometidos con el medio ambiente, la gente y su cultura</th>
						<th>Valle de Guadalupe, Baja California</th>
						<th></th>
						<th>Mourvedre</th>
						<th>2211449966</th>
					</tr>

					<tr>
						<th scope="row">EMEVE</th>
						<th>2005</th>
						<th></th>
						<th></th>
						<th>Daniel Lonnberg</th>
						<th>Cabernet Sauvignon, Sauvignon Blanc, Cabernet Franc, Tempranillo, Shiraz, Malbec, Merlot, Viognier y Chardonnay</th>
						<th>89253142</th>
					</tr>

					<tr>
						<th scope="row">Las Nubes</th>
						<th>2008</th>
						<th>Busca ser una empresa vitivinicola, productora y distribuidora de vinos de la mejor calidad en la zona de Baja California; a traves de un equipo humano profesional, usando los mejores insumos y tecnicas que protejan nuestra naturaleza y permitan un desarrollo sustentable y efectivo, para atender y satisfacer una clientela sofisticada en el consumo de vino, proporcionando un desarrollo humano a nuestro personal y rentabilidad economica a nuestros socios</th>
						<th>Valle de Guadalupe, Baja California</th>
						<th>Victor Segura</th>
						<th>Nebbiolo, Garnacha, Cariñena, Cabernet Sauvignon, Merlot, Tempranillo, barbera, Malbec, Monastrell, Petit Verdot, Petite syrah, Primitivo , Sangiovese, Syrah, Tannat y Zinfandel;  Chardonnay, Chenin blanc, Sauvignon blanc, Vidal blanc y Viognier</th>
						<th>2368976541</th>
					</tr>

					<tr>
						<th scope="row">Viñas de GarzaViñas de Garza</th>
						<th>2003</th>
						<th>Nace como proyecto familiar destacando la atencion pesonalizada a la crianza y duiddade de la uva por sus propietarios, con la certeza de que las vinicolas pequeñas en Mexico pueden producir vinos de la mas alta calidad y competir con las grandes, ofreciendo a sus consumidores el toque personal y unico de los vinos boutique con al calidad de produccion de los vinos Premium de Mexico. </th>
						<th>Valle de Guadalupe, Baja California</th>
						<th></th>
						<th>Tempranillo, Grenach, Zinfandel, Carignan, Bebbiolo, Montepulciano, Petit Verdot, Syrah, Petit Syrah, Sauvignon blanc y Moscato Canelli</th>
						<th>5533664826</th>
					</tr>

					<tr>
						<th scope="row">Decantos Vinicola</th>
						<th>2001</th>
						<th>Vinicola que como lo dice su nombre, trabaja por decantancion o gravedad, un proyecto que nacio con la firme idea de aliminar por completo los bombeos mecanicos y tulizar unicamente la ley natural de la gravedad desde la recepcion de la uva hasta su embotellado final.  Para lograr este objetivo la vinicola cuenta con instalaciones donde combinan tradicion y modernindad construida con diferentes desniveles.  Creen firmemente en las ventajas de este metodo de elaboracion en el que simplemente vuelven a la tradicion y al respeto de la materia prima</th>
						<th>El Porvenir, Baja California</th>
						<th></th>
						<th></th>
						<th>1236859476</th>
					</tr>

					<tr>
						<th scope="row">Vena Cava</th>
						<th>2005</th>
						<th>Producir vinos orgánicos (sin usar pesticidas ni fertilizantes artificiales) de alta calidad on las mejores vides posibles para reflejar las caractiristicas tipicas de los vinos de la region</th>
						<th>Valle de Guadalupe, Baja California</th>
						<th></th>
						<th></th>
						<th>88661248</th>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
@endsection