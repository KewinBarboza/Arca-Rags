<template>
  <div>
    <nav class="navbar navbar-expand-lg negro-s fixed-top p-1">
      <div class="container">
        <router-link :to="{name:'Home'}">
          <img :src="logo"  class="img-fluid"/>
        </router-link>
        <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarNav"  aria-controls="navbarNav"  aria-expanded="false" aria-label="Toggle navigation"  >
          <svg style="width:24px;height:24px" viewBox="0 0 24 24">
              <path fill="#fff" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
          </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item p-4">
              <router-link class="nav-link" :to="{name:'Home'}">Inicio</router-link>
            </li>
            <li class="nav-item p-4">
              <router-link class="nav-link" :to="{name: 'Productos'}">Productos</router-link>
            </li>
            <li class="nav-item p-4">
              <router-link class="nav-link" :to="{name:'Contactanos'}">Contáctanos</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <transition name="fade" mode="out-in">
        <router-view :key="$route.fullPath"></router-view>
    </transition>
        <!-- footer -->
    <footer class="negro-s mt-5">
        <div class="container">
          <div class="row p-4">
              <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 border-right">
                  <div class="rs text-white mt-3">
                      <h3 class="pb-2"><b>Adquirir productos</b></h3>
                      <p class="teal">1- Escoge las prendas del catálogo.</p>
                      <p class="teal">2- Ponte en contacto con nosotros.</p>
                      <p class="teal">3- Pide las prendas y productos.</p>
                      <p class="teal">4- Confeccionamos y entregamos.</p>
                  </div>
              </div>
              <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6 ">
                  <div class="text-white text-center">
                      <img :src="logo" width="80" height="80" class="mt-3 mb-3" />
                      <p class="teal">
                         Somos una empresa orientada a su mercado. Es decir, su compromiso fundamental es ofrecer productos de óptima calidad a las empresas clientes. Para ello se dedica a la procura, diseño, corte, confección y distribución directa de prendas de vestir de excelente calidad, sin olvidar la relación costo-beneficio, frente al precio al detal, existente en el mercado nacional de la confección.
                      </p>
                  </div>
              </div>
              <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 border-left ">
                  <div class="ubicanos text-white mt-3 text-center">
                      <h3 class="pb-2"><b>Ubicanos</b></h3>
                      <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="">
                          <path fill="#fff" d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                      </svg>
                      <p href="mailto:rags.aarca@gmail.com">rags.aarca@gmail.com</p>

                      <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="">
                          <path fill="#fff" d="M12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5M12,2A7,7 0 0,1 19,9C19,14.25 12,22 12,22C12,22 5,14.25 5,9A7,7 0 0,1 12,2M12,4A5,5 0 0,0 7,9C7,10 7,12 12,18.71C17,12 17,10 17,9A5,5 0 0,0 12,4Z" />
                      </svg>
                      <p>1ra. Av. Santa Eduvigis, Edificio Romar, Oficina Nº. 3, Caracas 1071, Venezuela. </p>

                      <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="">
                          <path fill="#fff" d="M20,15.5C18.8,15.5 17.5,15.3 16.4,14.9C16.3,14.9 16.2,14.9 16.1,14.9C15.8,14.9 15.6,15 15.4,15.2L13.2,17.4C10.4,15.9 8,13.6 6.6,10.8L8.8,8.6C9.1,8.3 9.2,7.9 9,7.6C8.7,6.5 8.5,5.2 8.5,4C8.5,3.5 8,3 7.5,3H4C3.5,3 3,3.5 3,4C3,13.4 10.6,21 20,21C20.5,21 21,20.5 21,20V16.5C21,16 20.5,15.5 20,15.5M5,5H6.5C6.6,5.9 6.8,6.8 7,7.6L5.8,8.8C5.4,7.6 5.1,6.3 5,5M19,19C17.7,18.9 16.4,18.6 15.2,18.2L16.4,17C17.2,17.2 18.1,17.4 19,17.4V19Z" />
                      </svg>
                      <p> (+58) 0212 2836466</p>
                  </div>
              </div>
          </div>
        </div>
        <div class="container-fluid verde-p p-3">
            <h4 class="text-center text-white"> Productos ARCA – Marca RAGS ® Todos los derechos reservados 2019. </h4>
        </div>
    </footer>
  </div>
</template>

<script>
export default {
    
    data(){
      return{
        logo:'./images/logo.jpg'
      }
    },
    mounted(){

    },
}
</script>

<style scoped>
  a{
    color: #fff;
  }

  a:hover{
    color: rgb(255, 255, 255);
  }

  .negro-s{
    background-color: rgb(34, 31, 31);
  }

  .verde-p{
    background-color:rgb(0, 165, 80);
  }

  .navbar{
    position: relative;
  }

  .nav-link{
    color: rgb(255, 255, 255);
    font-size: 20px;
  }

  .nav-item .nav-link:hover{
    
    color: rgb(0, 165, 80);
    transition: all 1s;
  }

  .nav-item:hover{
    color: rgb(0, 165, 80);
    transition: all 1s;
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }

</style>


