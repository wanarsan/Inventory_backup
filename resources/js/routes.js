
import productindex from './components/product/index.vue';
import productedit from './components/product/edit.vue';
import Material from './components/material/index.vue';
import Materialedit from './components/material/edit.vue';
import home from './components/ExampleComponent.vue';



export default{
    mode:'history',
    routes:[

        
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
    ]
}