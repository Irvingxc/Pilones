<template>
<div>
<div id="app" class="row justify-content-center">
<div class="margin">
    
<label for="" class="">Variedad</label>
<select v-model="seleccion1" id="inputState" class="form-control">
        <option selected v-for="Variedad in Variedad" :key="Variedad.codigo_variedad" v-bind:value="Variedad.codigo_variedad">{{Variedad.nombre_variedad}}</option>
      </select>
</div>

    <div class="margin">
<label for="" class="">Clase</label>

<select id="inputState" v-model="seleccion2" class="form-control" >
        <option v-for="muestra in muestra" :key="muestra.codigo_clase" selected v-bind:value="muestra.codigo_clase">{{muestra.nombre_clase}}</option>
      </select>
      </div>


      <div class="margin">
<label for="" class="">Finca</label>

<select v-model="seleccion3" id="inputState" class="form-control">
        <option v-for="Finca in Finca" :key="Finca.codigo_finca" selected v-bind:value="Finca.codigo_finca">{{Finca.nombre_finca}}</option>
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
<button  type="button" class="btn btn-primary" @click="saveDetalles">Agregar al contenido del Pilon</button>
      <br>
      <br>
<br>
</div>

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
		
			<tr v-for="detalles in detalles" :key="detalles.id">
				<td>{{detalles.codigo_variedad}}</td>
				<td>{{detalles.codigo_clase}}</td>
                <td>{{detalles.codigo_variedad}}</td>
                    

                   <td><button type="submit" class="btn btn-outline-danger">Eliminar</button></td>
                    
                </tr>
		

		</tbody>
	</table>
{{mostrar}}
</div>


    
</template>
<script>
export default {
    props: ['fin', 'rows', 'varie', 'true', 'mostrar'],

    data(){
        return{
            value:"",
            value2:"",
            value3:"",
            datos: [],//this.true,
            muestra: [],
            Variedad:[],
            Finca:[],
            id:[],
            detalles:[],
            seleccion1:{},
            seleccion2:{},
            seleccion3:{}


        }
        },
        methods:{
            getDates(){
                this.muestra= this.rows;
                this.Finca=this.fin;
                this.Variedad = this.varie;
                this.datos = this.true;
                this.id= this.mostrar;
                

            },

            deletedetalles(){
                

            },
            verDetalles(){
                   let me =this;
                   let id = this.mostrar
                let url = '/pilon/ver/'+id; //Ruta que hemos creado para que nos devuelva todas las tareas
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.detalles = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
                saveDetalles(){
                let me =this;
                let url = '/pilon/detalle' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                    'codigo_variedad':this.seleccion3,
                    'codigo_clase':this.seleccion2,
                    'codigo_finca':this.seleccion1,
                    'pilon_id':this.mostrar,
                }).then(function (response) {
                    me.verDetalles();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                })
                .catch(function (error) {
                    console.log(error);
                });   

            },

        },
        mounted(){
            this.getDates();
        }


    }
</script>