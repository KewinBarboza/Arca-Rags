<template>
    <div>
        <transition  name="fade" mode="out-in">
            <div v-if="showModal">
                <form class="modal-mask" @submit.prevent="enviarCorreo">
                    <div class="modal-wrapper">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Consultar precio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" @click="hidden">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body p-5">
                                    <div class="form-group">
                                        <input v-model="infoCorreo.nombre" type="text" class="form-control"  placeholder="nombre">
                                    </div>
                                    <div class="form-group">
                                        <input v-model="infoCorreo.correo" type="email" class="form-control"  placeholder="correo">
                                    </div>
                                    <div class="form-group">
                                        <textarea v-model="infoCorreo.consulta" class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Tu consulta"></textarea>
                                    </div>
                                    <p class="text-center" v-if="sent" >Tu mensaje ha sido enviado, te contactaremos pronto.</p>
                                </div>
                            <div class="modal-footer">
                                <a class="text-verde mr-4" @click="hidden">Cerrar</a>
                                <button type="submit" class="btn verde-s text-blanco rounded-0">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="#ffffff" d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                                    </svg>
                                    
                                    <span v-if="enviando">Enviando...</span> 
                                    <span v-else>Enviar Mensaje</span>
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    
    props:['showModal'], 

    data(){

       return{
            ocultar:false,
            sent:false, 
            enviando:false,
            infoCorreo:{nombre:'',correo:'',consulta:''}
       }

    },
    
    methods:{

        enviarCorreo(){
            axios.post('api/correo.cotizacion', this.infoCorreo)
                 .then(()=>{
                     this.sent = true;
                     this.enviando = false;
                 })
                 .catch((error)=>{
                     console.log(error);
                     this.sent = false;
                     this.enviando = false;
                 })
        },

        hidden(){
          return  this.$emit('hiddenModal',this.ocultar);
        }

    }
    
}
</script>

<style scoped>
    .verde-p{
        background-color:rgb(0, 165, 80);
    }

    a:not([href]):not([tabindex]) {
        color: rgb(0, 165, 80);
        text-decoration: none;
        cursor: pointer;
    }

    .text-blanco{
        color: #fff;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    

    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s;
    }
  
    .fade-enter, .fade-leave-to{
        opacity: 0;
    }

    .form-control{
        padding: 25px;
        border-radius: 0px;
        border: 1px solid rgb(0, 165, 80);
        font-size: 15px;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 165, 80, 0.11);
    }
</style>