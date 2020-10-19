<template>
    <div class="card" >
      <item-component 
          v-for="item in Items" 
          :key="item.id"
          :item="item">
      </item-component>
</div>
</template>

<script>
    export default {
        data(){
            return{
                Items: [{
                  'id':1,
                  'description':'lorenipsum lorenipsum lorenipsum 1',
                  'categorias':['lacteos','quesos']
                },
                {
                  'id':2,
                  'description':'item 2',
                  'categorias':['lacteos','quesos']

                }]
            }
        },
        mounted() {
            console.log('List component mounted.')
        },

    }
</script>
