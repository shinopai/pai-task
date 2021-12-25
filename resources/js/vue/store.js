import {
    createStore
} from 'vuex'
import Axios from 'axios'

const store = createStore({
    state: {
        currentUserId: null,
        projects: [],
    },
    mutations: {
        setId(state, resId) {
            state.currentUserId = resId
        },
        setProjects(state, resProjects) {
            state.projects = resProjects
        }
    },
    actions: {
        async getCurrentUserId(context) {
            await Axios.get('/api/user')
                .then(response => {
                    context.commit('setId', response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async getAllProjects(context) {
            await Axios.get('/api/projects/all')
                .then(response => {
                    context.commit('setProjects', response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
})

export default store
