import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import mixins from './mixins'

createApp(App).mixin(mixins).use(store).use(router).mount('#app')

window.Kakao.init('248de9938684b707b5343cc081851a7f')
