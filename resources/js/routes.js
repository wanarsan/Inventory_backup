
import productindex from './components/product/index.vue';
import productedit from './components/product/edit.vue';
import Material from './components/material/index.vue';
import Materialedit from './components/material/edit.vue';
import home from './components/home.vue';
import manage from './components/manage/index.vue';

export default{
    mode:'history',
    routes:[
        {
            path:'/',component:home
        },
        {
            path:'/product',component:productindex,name:'product'
        },
        {
            path:'/product/:id/edit',component:productedit,name:'edit-product', props: true 
        },
        {
            path:'/material',component:Material,name:'material'
        },
         {
             path:'/material/:id/edit',component:Materialedit,name:'edit-material', props: true 
        },
        {
            path:'/manage',component:manage
        },
       
    ]
}