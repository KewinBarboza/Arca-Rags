<template>
    <div>
        <div class="row h-form">
             <div class="col-sm-12 col-md-5 col-lg-5 border-right">
                <h2 class="mt-2  pl-0 pr-0 pb-2">Crear categoría</h2>
                <form @submit.prevent="registrar" class="mt-3">
                    <div class="input-group mb-3">
                        <input type="text" v-model="categoria.nombre" class="form-control" placeholder="Nombre de categoria" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn verde-s text-white rounded-0 " type="submit" id="button-addon2">Guardar</button>
                        </div>
                    </div>

                </form>
             </div>
             <div class="col-sm-12 col-md-7 col-lg-7 pl-0 div-scroll">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Categoría</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(categoria , index) in categorias" :key="index">
                            <th scope="row">{{categoria.id}}</th>
                            <td>{{categoria.categoria}}</td>
                            <td class="d-flex justify-content-end">
                                <button class="btn rounded-circle btn-edit text-white">
                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                    <path fill="#000000" d="M2,6V8H14V6H2M2,10V12H14V10H2M20.04,10.13C19.9,10.13 19.76,10.19 19.65,10.3L18.65,11.3L20.7,13.35L21.7,12.35C21.92,12.14 21.92,11.79 21.7,11.58L20.42,10.3C20.31,10.19 20.18,10.13 20.04,10.13M18.07,11.88L12,17.94V20H14.06L20.12,13.93L18.07,11.88M2,14V16H10V14H2Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){

            return{
                categorias:[],
                categoria:{nombre:''}
            }

        },

        methods:{

            registrar(){
                const params = {nombre: this.categoria.nombre}

                axios.post('api/categorias', params)
                    .then((res)=>{
                        this.categorias.push(res.data);
                        this.consultarCategoria();
                    })
            },

            consultarCategoria(){
                axios.get('api/categorias')
                     .then(res=>{this.categorias = res.data;})
                     .catch(function (error) { console.log(error);});
            },

            modificar(){
                
            },

            created(){
                this.consultarCategoria();
            },
        }
   }

</script>

<style scoped>
    .h-form{
      height: 92vh;
    }

    .table tbody tr:hover td .btn-delete{
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
        visibility: visible;
    }

    .table tbody tr:hover td .btn-edit{
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
        visibility: visible;
    }

    .table tbody tr td .btn-edit:hover{
        background:#00a5504a;
    }

    .table tbody tr td .btn-delete:hover{
        background:#ffb2b2;
    }

    .table tbody tr td{
        cursor: pointer;
    }

    .btn-delete, .btn-edit{
      visibility: hidden;
      
    }
    
    .form-control{
          padding: .375rem .75rem;
    }

    .div-scroll{
        overflow-y: hidden;
        height: 92vh;
    }

    .div-scroll:hover{
        overflow-y: scroll;
    }

</style>