<template>
    <div>
        <div class="row m-0 p-0 h-dashboard">
            <div class="col-sm-12 col-md-2 col-lg-2 p-0 m-0 border-right">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link rounded-0 active mt-3" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="#000000" d="M16,21H8A1,1 0 0,1 7,20V12.07L5.7,13.12C5.31,13.5 4.68,13.5 4.29,13.12L1.46,10.29C1.07,9.9 1.07,9.27 1.46,8.88L7.34,3H9C9,4.1 10.34,5 12,5C13.66,5 15,4.1 15,3H16.66L22.54,8.88C22.93,9.27 22.93,9.9 22.54,10.29L19.71,13.12C19.32,13.5 18.69,13.5 18.3,13.12L17,12.07V20A1,1 0 0,1 16,21M20.42,9.58L16.11,5.28C15.8,5.63 15.43,5.94 15,6.2C14.16,6.7 13.13,7 12,7C10.3,7 8.79,6.32 7.89,5.28L3.58,9.58L5,11L8,9H9V19H15V9H16L19,11L20.42,9.58Z" />
                        </svg>
                       <b class="pl-3">Productos</b>
                    </a>
                    <a class="nav-link rounded-0" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="#000000" d="M3,13H15V11H3M3,6V8H21V6M3,18H9V16H3V18Z" />
                        </svg>
                        <b class="pl-3">Categorías</b>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-10 col-lg-10  m-0">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <RegistrarProductoComponent></RegistrarProductoComponent>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <Categoria></Categoria>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import RegistrarProductoComponent from '../components/RegistrarProductoComponent.vue'
    import Categoria from '../components/Categoria.vue'
export default {
    components:{RegistrarProductoComponent,Categoria}
}
</script>

<style  scoped>
    .h-dashboard{
        min-height: 92vh;
    }

    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        color: rgb(0, 158, 61);
        background-color: rgba(0, 159, 59, 0.23);
    }

    .nav-link {
        display: block;
        padding: 0.8rem 1.5rem;
    
    }

    .nav-link:hover {
        background: #f1f1f1;
        
    }

    .nav-link, a {
        color: #000000;
        text-decoration: none;
        background-color: transparent;
    }
</style>