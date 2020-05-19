<template>
<div >
   <v-card v-for="product in products" v-bind:key="product.id"
   class="mx-auto"
    max-width="344"
  >
    <v-img
      src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
      height="200px"
    ></v-img>

    <v-card-title>
      {{product.name}}
    </v-card-title>

    <v-card-subtitle>
     {{product.description}}
    </v-card-subtitle>
    <v-card-subtitle>
        ${{product.price}}
    </v-card-subtitle>

    <v-card-actions>
      <v-btn text>Ver</v-btn>

      <v-btn
        color="purple"
        text
      >
        Agregar al carrito
      </v-btn>

      <v-spacer></v-spacer>

    </v-card-actions>

  </v-card>
</div>
</template>

<script>
import vuetify from '../plugins/vuetify.js'
import axios from 'axios'
export default {
data(){
    return {
        products:[]
    }
},

mounted(){
    this.getProducts()
    console.log(this.products)
},
methods:{
    getProducts(){
        const path = "/productos"
        axios.get(path).then(response=>{
            this.products = response.data
        })
    }
}



}



</script>
