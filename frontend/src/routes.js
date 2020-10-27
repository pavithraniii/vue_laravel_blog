import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);
import Addblog from './components/addblog'
import Bloglist from './components/bloglist'
import Editblog from './components/editblog'

const router= new VueRouter(
    {
        mode:'history',
        routes:[
            
            {path:"",component: Addblog},
            {path:"/list",component:Bloglist},
            {path:"/edit/:id",component:Editblog}
            
        ]
    }
    );

export default router