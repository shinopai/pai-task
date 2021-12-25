<template>
  <div class="py-12">
    <h2 class="text-2xl font-bold text-center">Create new project</h2>
    <p v-if="errorMessage" class="text-red-300 text-center">{{ errorMessage }}</p>
    <div class="mt-8 max-w-xl mx-auto">
      <div class="grid grid-cols-1 gap-6">
        <form method="POST" action="" @submit.prevent>
        <label class="block mt-2">
          <span class="text-gray-700">Project name</span>
          <input
            type="text" name="project_name"
            class="
              mt-0
              block
              w-full
              px-0.5
              border-0 border-b-2 border-gray-200
              focus:ring-0 focus:border-black
            "
            placeholder="for example(family, work)" v-model="projectName"
          />
        </label>
        <div class="block mt-2">
          <div class="mt-2">
            <div>
                <button type="submit" class="p-2 rounded-xl cursor-pointer text-white bg-green-300 hover:bg-green-500 mt-2" @click="createNewProject">Create</button>
            </div>
          </div>
        </div>
    </form>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, watch, computed } from 'vue'
import Axios from 'axios'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'

export default {
  setup() {
    const projectName = ref('')
    const errorMessage = ref('')
    const router = useRouter()
    const store = useStore()
    const currentUserId = ref()

    onMounted(async () => {
      await store.dispatch('getCurrentUserId')
    })

    currentUserId.value = computed(() => store.state.currentUserId)

    // watching if projectName value changes
    watch(projectName, (oldValue, newValue) => {
      if(newValue.length > 30){
        errorMessage.value = 'project name must be less than 30 letters'
      }else{
        errorMessage.value = ''
      }
    })

    // create new project
    const createNewProject = async () => {
      await Axios.post('/api/projects', {
        project_name: projectName.value,
        user_id: currentUserId.value.value
      })
      .then( response => {
        store.dispatch('getAllProjects')
        router.push('/top')
      })
      .catch( error => {
        console.log(error)
      })
    }

    return {
      projectName, errorMessage, createNewProject,currentUserId
    }
  },
}
</script>
