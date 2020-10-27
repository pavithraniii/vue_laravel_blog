<template>
  <div class="container">
    <h1>Add blog</h1>
   <form>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control"   placeholder="Enter title" v-model="blog.title">
    
  </div>
  <div class="form-group">
    <label >content</label>
    <textarea class="md-textarea form-control" rows="3" placeholder="enter content" v-model="blog.content"></textarea>
  </div>
  <div class="form-group">
    <label>picture</label>
    <input type="file" class="form-control" 
    @change="getImage($event)"
    >
  </div>
  
  
  <button type="submit"  @click.prevent="addblog" class="btn btn-primary">Submit</button>
</form>
  </div>
</template>

<script>
export default {
 
  data () {
    return {
      blog:{
        title:'laravel',
        content:'laravel ..',
        image:''
      }
    }
  },
  methods:{
    addblog:function(){
      //console.log('form submitted')
      this.$http.post("http://localhost:8000/api/addblog",this.blog).then(function(data){
        //console.log(data)
        this.$router.push('/list')
      })
    },
    getImage:function(e){
  var filereader=new FileReader();
  filereader.readAsDataURL(e.target.files[0]);
  filereader.onload = (e)=>{
    this.blog.image=e.target.result;
   
  }
   console.log(this.blog)
}
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
