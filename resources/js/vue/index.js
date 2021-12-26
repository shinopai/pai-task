import {
    createApp
} from "vue"
import router from './router'
import store from './store'
import App from "../components/App.vue"
import {
    library
} from '@fortawesome/fontawesome-svg-core'
import {
    faTrash,
    faEdit
} from '@fortawesome/free-solid-svg-icons'
import {
    FontAwesomeIcon
} from '@fortawesome/vue-fontawesome'

library.add(faTrash, faEdit)

const app = createApp(App)
app.use(store)
app.use(router)
app.component('fa', FontAwesomeIcon)
app.mount('#pai-task')
