import {
    createRouter,
    createWebHistory
} from "vue-router";
import Task from '../components/Task.vue'
import CreateProject from '../components/pages/CreateProject.vue'
import CreateTask from '../components/pages/CreateTask.vue'
import PerProject from '../components/pages/perprojects/PerProject.vue'
import EditTask from '../components/pages/EditTask.vue'

const routes = [{
        path: '/top',
        component: Task
    },
    {
        path: '/projects/create',
        component: CreateProject
    },
    {
        path: '/tasks/create',
        component: CreateTask
    },
    {
        path: '/projects/:projectId/tasks',
        component: PerProject,
        name: 'project-task',
        props: true
    },
    {
        path: '/tasks/:taskId',
        component: EditTask,
        name: 'edit-task',
        props: true
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
