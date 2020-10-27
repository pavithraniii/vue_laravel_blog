<template>
  <div>
     <Navbar/>
    <router-view/>
   
  </div>
</template>

<script>
import Addblog from './components/addblog'
import Bloglist from './components/bloglist'
import Navbar from './components/navbar'

export default {
  
  components: {
    Addblog,Bloglist,Navbar
  }
}
</script>

<style>

</style>
