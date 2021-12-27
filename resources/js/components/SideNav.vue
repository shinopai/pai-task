<template>
<div>
      <h2 class="text-center mb-5 font-bold">Projects</h2>
  <div class="py-5 h-screen bg-gray-300 px-2 relative">
    <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden md:max-w-lg">
        <div class="md:flex">
            <div class="w-full p-4">
                <ul>
                    <li v-if="projects.value.length == 0">No projects yet</li>
                    <li v-else v-for="project in projects.value" :key="project" class="flex justify-between items-center bg-white mt-2 p-2 hover:shadow-lg rounded cursor-pointer transition">
                    <router-link :to="{ name: 'project-task', params: { projectId: project.id } }">
                            <div class="flex flex-col ml-2"> <span class="font-medium text-black">{{ project.project_name }}</span> <span class="text-sm text-gray-400 truncate w-32">{{ project.tasks.length }} pending tasks</span> </div>
                    </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <router-link to="/projects/create" class="text-blue-500 absolute bottom-2">Create project</router-link>
</div>
</div>
</template>

<script>
import { ref, onMounted, watch, computed } from 'vue'
import Axios from 'axios'
import { useStore } from 'vuex'

export default {
  name: ['SideNav'],
  setup() {
    const projects = ref({})
    const store = useStore()

    onMounted( async () => {
      await store.dispatch('getAllProjects')
    })

    projects.value = computed(() => store.state.projects)

    // watching if projects length changes
    watch(projects, () => {
      store.dispatch('getAllProjects')
    })

    return {
      projects
    }
  },
}
</script>
