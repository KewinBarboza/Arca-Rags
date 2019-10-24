<template>
    <div>
        <!-- jumbotron -->
        <header>
            <jumbotrom></jumbotrom>
        </header>
        <!-- menu categorias -->
        <div class="container mb-5">
            <div class="row">
                <div class="nav-categorias col-sm-12 col-md-2 col-lg-2">
                    <ul class="list-group mt-2">
                        <li class="pl-4 list-group-item list-title rounded-0 border-0"><h3 class="border-bottom pb-2"><b>CATEGORIAS</b></h3></li>
                        <li v-for="(categoria, index) of categorias" :key="index" class="pl-4 list-group-item list-group-item-action list-group-item-light border-0">
                            {{categoria}}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <ProductoComponent></ProductoComponent>
                </div>
            </div>
        </div>
        <!-- footer -->
    </div>
</template>


<script>
    import ProductoComponent from '../components/ProductoComponent'
    import jumbotrom from '../components/Jumbotrom'
    
    export default {
        data(){
            return{
                categorias:['Chemises ','Camisas','Franelas','Chaquetas','Chaleco','Gorras','Bolsos','Cava']
            }
        },

        components:{ProductoComponent,jumbotrom}
    }
</script>

<style scoped>
    .verde-s{
        background-color: rgb(0, 165, 80);
    }

    .list-title{
        color:rgb(34, 31, 31);
    }

    .list-group-item{
        padding: 0.30rem 1.10rem;
        cursor:pointer;
        color:#888888;
    }

    .list-group-item:hover{
        color: rgb(0, 165, 80);
        background-color: #fff;
    }
    

</style>