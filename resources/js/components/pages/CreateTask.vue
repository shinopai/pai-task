<template>
  <div class="py-12">
    <h2 class="text-2xl font-bold text-center">Create new task</h2>
    <p v-if="errorMessage" class="text-red-300 text-center">{{ errorMessage }}</p>
    <div class="mt-8 max-w-xl mx-auto">
      <div class="grid grid-cols-1 gap-6">
        <form method="POST" action="" @submit.prevent>
        <label class="block mt-2">
          <span class="text-gray-700">Task subject</span>
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
            placeholder="for example(watch TV, fuck with Ueto)" v-model="taskSubject"
          />
        </label>
        <label class="block mt-2">
          <span class="text-gray-700">Task state</span><br>
          <select class="py-1" v-model="taskState">
            <option value="">task state</option>
            <option value="do">do</option>
            <option value="doing">doing</option>
            <option value="done">done</option>
          </select>
        </label>
        <label class="block mt-2">
          <span class="text-gray-700">Project</span><br>
            <select class="py-1" v-model="taskProject">
              <option value="">task project</option>
            <option v-for="project in projects.value" :key="project" :value="project.id">{{ project.project_name }}</option>
          </select>
        </label>
        <div class="block mt-2">
          <div class="mt-2">
            <div>
                <button type="submit" class="p-2 rounded-xl cursor-pointer text-white bg-green-300 hover:bg-green-500 mt-2" @click="createNewTask">Create</button>
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
    const taskSubject = ref('')
    const taskState = ref('')
    const taskProject = ref('')
    const errorMessage = ref('')
    const currentUserId = ref()
    const projects = ref([])
    const router = useRouter()
    const store = useStore()

    onMounted(async () => {
      await store.dispatch('getCurrentUserId')
      await store.dispatch('getAllProjects')
    })

    currentUserId.value = computed(() => store.state.currentUserId)
    projects.value = computed(() => store.state.projects)

    // watching if taskSubject value changes
    watch(taskSubject, (oldValue, newValue) => {
      if(newValue.length > 50){
        errorMessage.value = 'task subject must be less than 50 letters'
      }else{
        errorMessage.value = ''
      }
    })

    // create new task
    const createNewTask = async () => {
      await Axios.post('/api/tasks', {
        subject: taskSubject.value,
        state: taskState.value,
        user_id: currentUserId.value.value,
        project_id: taskProject.value
      })
      .then( response => {
        router.push('/top')
      })
      .catch( error => {
        console.log(error)
      })
    }

    return {
      taskSubject, taskState, taskProject, errorMessage, createNewTask, projects
    }
  },
}
</script>
