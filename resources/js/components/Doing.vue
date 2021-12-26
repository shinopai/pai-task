<template>
  <div class="py-5 h-screen bg-gray-300 px-2 relative">
    <h2 class="text-left mb-5 pl-2 font-bold text-yellow-500">Doing<span class="float-right pr-2">{{ allTasksDoing.length }}</span></h2>
    <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden md:max-w-lg">
        <div class="md:flex">
            <div class="w-full p-4">
                <ul>
                    <li v-for="task in allTasksDoing" :key="task" class="flex justify-between items-center bg-white mt-2 p-2 hover:shadow-lg rounded cursor-pointer transition">
                        <div class="flex ml-2"> <input type="checkbox" name="" id="">
                            <div class="flex flex-col ml-2"> <span class="font-medium text-black -mt-1">{{ task.subject }}</span> <span class="text-sm text-gray-400 truncate w-32">{{ task.project.project_name }}</span> <span><fa icon="trash" class="mt-2" @click="deleteTask(task.id)"/><router-link :to="{ name: 'edit-task', params: { taskId: task.id } }"><fa icon="edit" class="ml-2" /></router-link></span></div>
                        </div>
                    </li>
                    <li v-if="allTasksDoing.length == 0">No tasks yet</li>
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
  setup() {
    const allTasksDoing = ref([])

    // get all tasks that state is doing
    const getAllTasksDoing = async () => {
        await Axios.get('/api/tasks/doing')
                   .then( response => {
                       allTasksDoing.value = response.data
                   })
                   .catch( error => {
                       console.log(error)
                   })
    }

    // delete task
    const deleteTask = async (taskId) => {
        await Axios.delete('/api/tasks/' + taskId)
                   .then( response => {
                       getAllTasksDoing()
                   })
                   .catch( error => {
                       console.log(error)
                   })
    }

    onMounted(() => {
        getAllTasksDoing()
    })

    return {
        allTasksDoing, deleteTask
    }
  },
}
</script>
