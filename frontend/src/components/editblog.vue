<template>
     <div class="container">
    <h1>Edit blog</h1>
   <form>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control"   placeholder="Enter title" v-model="blog.title">
    
  </div>
  <div class="form-group">
    <label >content</label>
    <textarea class="md-textarea form-control" rows="3" placeholder="enter content" v-model="blog.content"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary" @click.prevent="updatedata">Edit blog</button>
</form>
  </div>
</template>

<script>
export default {
    data:function(){
        return{
          blog:{

          }
        }
    },
    created(){
        //console.log(this.$route.params.id) created haduna gamanma get data function eka call karana
        this.getdata()
    },
    methods:{
        getdata:function(){

          this.$http.get("http://localhost:8000/api/getblog/"+this.$route.params.id).then(function(data){
              //console.log(data)
              this.blog=data.body.blog
          })
        },
        updatedata:function(){
           this.$http.put("http://localhost:8000/api/editblog/"+this.$route.params.id,this.blog).then
           (function(data){
               //console.log(data)
                this.$router.push('/list')
           })
        }
    }
}
</script>