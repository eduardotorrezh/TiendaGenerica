<template>
  <form
  @submit="test"
    style="text-align:center; width:match-parent;"
>

  <p>
    <label for="name">Nombre</label>
    <input
      id="name"
      v-model="form.name"
      type="text"
      name="name"
    >
  </p>
  <p>
    <label for="price">Precio</label>
    <input
      id="price"
      v-model="form.price"
      type="number"
      name="price"
    >
  </p>

    <p>
    <label for="brand">marca</label>
    <select
      id="brand"
      name="brand"
      v-model="form.brand_id"
    >
      <option v-for="brandt in brands" v-bind:key="brandt.id" :value="brandt.id">{{brandt.name}}</option>

    </select>
  </p>
  

<p>
    <label for="provider">Proveedor</label>
    <select
      id="proveedor"
      name="proveedor"
      v-model="form.provider_id"
    >
      <option v-for="providert in providers" v-bind:key="providert.id" :value="providert.id">{{providert.full_name}}</option>
    </select>
  </p>
<p>
     <p>
    <label for="stock">Stock</label>
    <input
      id="stock"
      v-model="form.stock"
      type="number"
      name="stock"
    >
  </p>
  <p>
    <label for="type">Tipo</label>
    <input
      id="type"
      v-model="form.type"
      type="text"
      name="type"
    >
  </p>
  <p>
  <label for="description">Descripción</label>
    <input
      id="description"
      v-model="form.description"
      type="text"
      name="description"
    >
  </p>
  <p>
  <label for="size">Tamaño</label>
    <input
      id="size"
      v-model="form.size"
      type="text"
      name="size"
    >
  </p>

  <div>
    <p>Portada: <file-selector v-model="file"></file-selector></p>
    <p v-if="file">{{file.name}}</p>
  </div>




  <p>
    <input
      type="submit"
      value="Enviar"
    >
  </p>

</form>
</template>

<script>
import FileSelector from '../fragments/FileSelector.vue'
import axios from 'axios'

export default {
  components: {
    FileSelector
  },

  data() {
    return {
        form:{
            cover_photo: null,
            name: null,
            price: null,
            brand_id: null,
            provider_id: null,
            type: null,
            stock: null,
            description: null,
            size: null,
        },
        file: null,
        brands: [],
        providers: []
    }
  },
  created(){
      this.getBrands();
      this.getProviders();
  },
  methods:{
      test(){
          const path = '/productos'
          this.form.cover_photo = this.file.name
          console.log(this.form)
          axios.post(path, this.form, {headers:{Accept:"application/json"}}).then((response)=>{
            console.log(response)
          }).catch(err=>{
              console.log(err)
          })
      },
      
  
  
  getProviders(){
      const path = '/proveedores'
      axios.get(path).then((response)=>{
          this.providers = response.data

      }).catch(err=>{
          console.log(err)
      })
  },
  getBrands(){
      const path = '/marcas'
      axios.get(path).then((response)=>{
          this.brands = response.data
      }).catch(err=>{
          console.log(err)
      })
  }
  },
}
</script>
