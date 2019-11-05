<template>
    <div>
        <transition  name="fade" mode="out-in">
            <div v-if="showModal">
                <form class="modal-mask">
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
                                        <input type="text" class="form-control" id="" placeholder="nombre">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="" placeholder="correo">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Tu consulta"></textarea>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <a class="text-verde mr-4" @click="hidden">Cerrar</a>
                                <button type="submit" class="btn verde-s text-blanco rounded-0">Enviar</button>
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
            ocultar:false
       }

    },
    
    methods:{

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