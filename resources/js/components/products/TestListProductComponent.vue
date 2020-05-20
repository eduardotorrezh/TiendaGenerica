<template>
  <div class="widget-container" >
    <div
      v-for="product in products" v-bind:key="product.id">
      <div   >
        <div class="widget-sale">
          Disponible!
        </div>
      </div>
      <div class="widget-product" :style="'border-bottom: 1px solid ' " >
        <v-img src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" height="200px" class="wimg"> </v-img>

            <H3>
                <a href="/">{{ product.name }}</a>
            </H3>
      
        <div class="widget-card-footer">
            <div class="widget-button">
                <v-btn  class="widget-button-icon" text>Ver</v-btn>
            </div>
            
            <div class="widget-button">
                <v-btn class="widget-button" color="purple" text>
                Agregar al carrito
                </v-btn>
            </div>
                <div class="widget-price">
                    ${{ product.price/100 }}
                </div>
            <!-- <div
                class="product-sale"
                
            >
               <span  class="fullprice">$ {{product.price/100}}</span>
            </div> -->
            
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vuetify from '../plugins/vuetify.js'
import axios from 'axios'
export default {
data(){
    return {
        products:[],
        endpoint:'/productos/'
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




<style>
.widget-container {
  max-width: 100%;
  display: grid;
  justify-content: space-evenly;
  grid-gap: 0.5rem;
  grid-template-columns: repeat(auto-fill, 320px);
  margin-bottom: 2rem;
}
.widget-card {
  display: block;
  border: 0px solid #eaeaea;
  width: 100%;
  margin-bottom:1rem;
}
.widget-card > .wimg {
  position: absolute;
  margin: 1rem 0 0 1rem;
  border-radius: 0.2rem;
  border: 1px solid #eaeaea;
  max-width: 8rem;
  width: 8rem;
  height: 8rem;
  max-height: 8rem;
  background-size: cover !important;
  background-position: center center !important;
  background-repeat: no-repeat !important;
}
.widget-sale {
  position: absolute;
  padding: 0.6rem;
  z-index: 1;
  background: red;
  font-size: 0.7rem;
  color: #fff;
}
.widget-title {
  min-height: 8rem;
  padding: 1rem;
  text-align: right;
}
.widget-card-footer {
  max-width: 100%;
  margin-top: 1.5rem;
  min-height: 2.5rem;
  padding-bottom: .2rem;
  display: grid;
  justify-content: space-evenly;
  grid-gap: 0.002rem;
  grid-template-columns: 1fr 0.5fr 1fr 2fr;
}
.widget-rating {
  text-align: left;
  margin-left: 1rem;
  margin-right: 1rem;
  margin-top:.2rem;
}
.widget-button {
  text-align: center;
  cursor: pointer;
}
.widget-button-icon {
  background: transparent;
  border:0;
}
.widget-icon {
  border-radius:50%;
  padding:.4rem;
}
.widget-icon:hover {
  background:#cecece;
}
.widget-icon:mouseout {
  background:transparent;
}
.widget-price {
  text-align: center;
  padding: 0.3rem;
}
.w-elevation-1 {
  box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12) !important;
}
.w-elevation-2 {
  box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.2), 0px 5px 8px 0px rgba(0,0,0,0.14), 0px 1px 14px 0px rgba(0,0,0,0.12) !important;
}
.w-elevation-3 {
  box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2), 0px 8px 10px 1px rgba(0,0,0,0.14), 0px 3px 14px 2px rgba(0,0,0,0.12) !important;
}
.widgetproduct {
  position: absolute;
  top: 1rem;
  left: 1rem;
  background: #fff;
  border: 1px solid #eaeaea;
  padding: 0;
  min-width: 6rem;
  width: 6rem;
  border-radius: 0.5rem;
}
.widgetproduct img {
  width: 100%;
  height: auto;
}
.product-title {
  font-size: 1.2rem;
}
.product-abstract {
  font-size: .9rem;
  margin-left:40%;
}
.product-price {
  font-size: 2.5rem;
  margin-top: -3.6rem;
}
.product-sale {
  color: red;
  font-size: 1.2rem;
}
.fullprice {
  text-decoration: line-through;
  font-size: 0.8rem;
  margin-top: -1rem;
}
</style>