<template>
<div>
<div id="app" class="row justify-content-center">

    <div class="margin">
<label for="" class="">Clase</label>

<select id="inputState" v-model="seleccion2" class="form-control" >
        <option v-for="muestra in muestra" :key="muestra.codigo_clase" selected v-bind:value="muestra.codigo_clase">{{muestra.nombre_clase}}</option>
      </select>
      </div>


      <div class="margin">
<label for="" class="">Textura</label>

<select id="inputState" v-model="seleccion4" class="form-control" >
        <option v-for="texturas in texturas" :key="texturas.codigo_textura" selected v-bind:value="texturas.codigo_textura">{{texturas.nombre_textura}}</option>
      </select>
      </div>

      <div class="margin">
    
<label for="" class="">Variedad</label>
<select v-model="seleccion3" id="inputState" class="form-control">
        <option selected v-for="Variedad in Variedad" :key="Variedad.codigo_variedad" v-bind:value="Variedad.codigo_variedad">{{Variedad.nombre_variedad}}</option>
      </select>
</div>


      <div class="margin">
<label for="" class="">Finca</label>

<select v-model="seleccion1" id="inputState" class="form-control">
        <option v-for="Finca in Finca" :key="Finca.codigo_finca" selected v-bind:value="Finca.codigo_finca">{{Finca.nombre_finca}}</option>
      </select>
          </div>

          <div class="margin">
<label for="" class="">Peso</label>
<input type="number" v-model="peso" class="form-control">
      </div>





          <div class="margin">
              <label for=""></label>
<div v-if="datos==0 || datos==2">
    <button  type="button" class="btn btn-primary" @click="saveDetalles">Agregar al contenido del Pilon</button>

      <br>
      <br>
<br>
</div>
<div v-else>
    <button  type="button" class="btn btn-primary"   disabled>Agregar al contenido del Pilon</button>

      <br>
      <br>
<br>
</div>

      </div>
       </div>
      <table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Clase</th>
            <th>Textura</th>
            <th>Variedad</th>
            <th>Finca</th>
            <th>Peso</th>
			<th>Eliminar</th>
			
			</tr>
		</thead>
		<tbody>
		
			<tr v-for="detalles in detalles" :key="detalles.id">
				<td>{{detalles.class}}</td>
                <td>{{detalles.text}}</td>
                <td>{{detalles.varied}}</td>
                <td>{{detalles.fincas}}</td>
                <td>{{detalles.peso}}</td>
                <td><button v-on:click.prevent="deletedetalles(detalles)" class="btn btn-outline-danger">Eliminar</button></td>
                    
                </tr>
		

		</tbody>
	</table>
</div>


    
</template>
<script>
export default {
    props: ['fin', 'rows', 'varie', 'true', 'mostrar', 'textura'],

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
            texturas:[],
            detalles:[],
            seleccion1:{},
            seleccion2:{},
            seleccion3:{},
            seleccion4:{},
            peso:0

        }
        },
        methods:{
            getDates(){
                this.muestra= this.rows;
                this.Finca=this.fin;
                this.Variedad = this.varie;
                this.datos = this.true;
                this.id= this.mostrar;
                this.texturas= this.textura;
            },

            deletedetalles(data){
                let me =this;
                let pilon = data.id
                if (confirm('¿Seguro que deseas esto?')) {
                    axios.delete('/pilon/delete/'+pilon
                    ).then(function (response) {
                        me.verDetalles();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }

            },
            verDetalles(){
                   let me =this;
                   let id = this.id
                let url = '/pilon/ver/'+id;
                axios.get(url).then(function (response) {
                   
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
                    'codigo_textura':this.seleccion4,
                    'pilon_id':this.mostrar,
                    'peso':this.peso,
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
 
        },
        created: function(){
            this.id= this.mostrar;
            this.verDetalles();
        }


    }
</script>