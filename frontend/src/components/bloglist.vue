<template>
    <div class="container">
        <h1>Blog list</h1>
       <div id="products" class="row list-group">

        <div class="item  col-xs-4 col-lg-4" v-for="y in blog"  v-bind:key="y">
            <div class="thumbnail">
                <img class="group list-group-image" v-bind:src="'http://localhost:8000/'+y.image">
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                     </h4>
                    <p class="group inner list-group-item-text">
                        {{y.title}}
                        </p>
                         <p class="group inner list-group-item-text">
                        {{y.content}}
                        </p>
                    <div class="row">
                       
                        <div class="col-xs-12 col-md-6">
                           <router-link class="btn btn-success" :to="'/edit/'+ y.id">Edit</router-link>
                        </div>
                        <div class="col-xs-12 col-md-6">
                             <a @click="deleteblog($event)" class="btn btn-danger" v-bind:id="y.id">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!---->
    
     
     <!---->
       </div>
    </div>
</template>
<script>
export default {
    data:function(){
        return{
            blog:[]
        }
    },
    created(){
        this.$http.get("http://localhost:8000/api/getblogs").then(function(data){
           //console.log(data);
           this.blog=data.body.alliblogs
        })
    },
    methods:{
        deleteblog:function(event){
            //console.log(event.target.id)
            this.$http.delete("http://localhost:8000/api/deleteblog/" +event.target.id).then
            (function(data){
                //console.log(data)
                var position=this.blog.findIndex(function(element)
            {
                return element.id==event.target.id;
            }
            );
            this.blog.splice(position,1)
            })
        }
    }
}
</script>