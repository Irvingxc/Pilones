<template>

<div id="app" class="row justify-content-center">
<div class="margin">
<label for="" class="">Variedad</label>
<select id="inputState" class="form-control" name="Variedad">
        <option selected v-for="Variedad in Variedad" :key="Variedad.codigo_variedad">{{Variedad.nombre_variedad}}</option>
      </select>
</div>

    <div class="margin">
<label for="" class="">Clase</label>

<select id="inputState" class="form-control" name="Variedad">
        <option v-for="muestra in muestra" :key="muestra.codigo_clase" selected >{{muestra.nombre_clase}}</option>
      </select>
      </div>


      <div class="margin">
<label for="" class="">Finca</label>

<select id="inputState" class="form-control" name="Variedad">
        <option v-for="Finca in Finca" :key="Finca.codigo_finca" selected>{{Finca.nombre_finca}}</option>
      </select>
          </div>


          <div class="margin">
              <label for=""></label>
<div v-if="datos==1">
<button  type="button" class="btn btn-primary"   disabled>Agregar al contenido del Pilon</button>
      <br>
      <br>
<br>
</div>
<div v-else>
<button  type="button" class="btn btn-primary">Agregar al contenido del Pilon</button>
      <br>
      <br>
<br>
</div>
      </div>

      <table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Variedad</th>
			<th>Clase</th>
            <th>Finca</th>
			<th>Eliminar</th>
			
			</tr>
		</thead>
		<tbody>
		
			<tr>
				<td><a href=""></a></td>
				<td></td>
                <td> <form method="post" action="">
                    
                   <td></td>
                    
                </form>
                    </td>
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </tr>
		

		</tbody>
	</table>

</div>


    
</template>
<script>
export default {
    props: ['fin', 'rows', 'varie', 'true', 'mostrar'],

    data(){
        return{

            datos: [],//this.true,
            muestra: [],
            Variedad:[],
            Finca:[],
            id:[]

        }
        },
        methods:{
            getDates(){
                this.muestra= this.rows;
                this.Finca=this.fin;
                this.Variedad = this.varie;
                this.datos = this.true;
                this.id= this.mostrar;
                

            }

        },
        mounted(){
            this.getDates();
        }


    }
</script>