<template>
  <div class="py-5 h-screen bg-gray-300 px-2 relative">
    <h2 class="text-left mb-5 font-bold pl-2 text-green-500">Done<span class="float-right pr-2">{{ allProjectTasksDone.length }}</span></h2>
    <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden md:max-w-lg">
        <div class="md:flex">
            <div class="w-full p-4">
                <ul>
                    <li v-for="task in allProjectTasksDone" :key="task" class="flex justify-between items-center bg-white mt-2 p-2 hover:shadow-lg rounded cursor-pointer transition">
                        <div class="flex ml-2"> <input type="checkbox" name="" id="">
                            <div class="flex flex-col ml-2"> <span class="font-medium text-black -mt-1">{{ task.subject }}</span> <span class="text-sm text-gray-400 truncate w-32">{{ task.project.project_name }}</span><span><fa icon="trash" class="mt-2" @click="deleteTask(task.id)"/><router-link :to="{ name: 'edit-task', params: { taskId: task.id } }"><fa icon="edit" class="ml-2" /></router-link></span></div>
                        </div>
                    </li>
                    <li v-if="allProjectTasksDone.length == 0">No tasks yet</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { ref, onMounted, watch } from 'vue'
import Axios from 'axios'

export default {
  props: {
    projectId: {
      type: String,
      required: true
    }
  },
  setup(props) {
    const allProjectTasksDone = ref([])

    // get all tasks that state is Done and project is props value
    const getAllProjectTasksDone = async () => {
        await Axios.get('/api/projects/' + props.projectId + '/tasks/done')
                   .then( response => {
                       allProjectTasksDone.value = response.data
                       console.log(response.data);
                   })
                   .catch( error => {
                       console.log(error)
                   })
    }

    // delete task
    const deleteTask = async (taskId) => {
        await Axios.delete('/api/tasks/' + taskId)
                   .then( response => {
                       getAllProjectTasksDone()
                   })
                   .catch( error => {
                       console.log(error)
                   })
    }

    onMounted(() => {
        getAllProjectTasksDone()
    })

    // watching if props value changes
    watch( () => props.projectId, () => {
      getAllProjectTasksDone()
    })

    return {
        allProjectTasksDone, deleteTask
    }
  },
}
</script>
