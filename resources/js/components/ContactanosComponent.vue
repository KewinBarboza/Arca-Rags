<template>
    <div>
        <div class="row">
            <div class="col-12 mb-5 mt-5">
                <h2 class=""><span class="text-verde">Contáctanos</span></h2>
                <p class="text-center color-parrafo">Escoja las prendas de vestir o los artículos complementarios de nuestro catálogo y solicítelos por nuestro formulario en la página de contactos. También puede contactarnos directamente a nosotros usando la información al final, indicando sus datos y los detalles de lo que usted desea y le enviaremos una cotización <br>Gracias por su interés en nuestros productos.</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
                <transition name="fade" mode="out-in">
                    <p v-if="sent">Tu mensaje ha sido enviado, te contactaremos pronto.</p>
                    <form class="" @submit.prevent="datosCorreo" v-else>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre" v-model="infoCorreo.nombre">
                        </div> 
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="correo" v-model="infoCorreo.correo">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="asunto" v-model="infoCorreo.asunto">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="mensaje" v-model="infoCorreo.mensaje"></textarea>
                        </div>
                        
                        <button class="mx-auto d-block btn verde-s text-white btn-lg rounded-0" type="submit" :disabled="enviando">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="#ffffff" d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                            </svg>
                            <span v-if="enviando">Enviando...</span> 
                            <span v-else>Enviar Mensaje</span>
                        </button>
                    </form> 
                </transition>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <iframe class="responsi" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1961.5051981509328!2d-66.84251404187104!3d10.499846135425344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a59b1ac9c680f%3A0x69b47c0b20075ff4!2sResidencias%20Romar%2C%20Av%20Sta%20Eduvigis%2C%20Caracas%2C%20Distrito%20Capital!5e0!3m2!1ses!2sve!4v1570766360414!5m2!1ses!2sve" width="500" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data(){
        return{
            sent:false, 
            enviando:false,
            infoCorreo:{nombre:'',correo:'',asunto:'',mensaje:''}
        }
    },

    methods:{
        datosCorreo(){
            this.enviando = true;

            axios.post('api/correos', this.infoCorreo)
                 .then(()=>{
                     this.sent = true;
                     this.enviando = false;
                 })
                 .catch((error)=>{
                     console.log(error)
                     this.infoCorreo = false;
                     this.enviando = false; 
                 })

        }
    }
    
}
</script>

<style scoped>
    h2{
        font-size: 50px;
        text-align: center;
    }

    p{
        font-size: 20px;
    }

    .color-parrafo{
       color: #9b9b9b;
    }

    .verde-s{
        background-color: rgb(0, 165, 80);
    }

    .text-verde{
        color: rgb(0, 165, 80);
    }

    .text-white{
        color: #ffffff;
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

    .responsi{
        max-width:100%;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    
    .fade-enter, .fade-leave-to{
        opacity: 0;
    }


</style>