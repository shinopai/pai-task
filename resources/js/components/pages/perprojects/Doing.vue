<template>
  <div class="py-5 h-screen bg-gray-300 px-2 relative">
    <h2 class="text-left mb-5 font-bold pl-2 text-yellow-500">Doing<span class="float-right pr-2">{{ allProjectTasksDoing.length }}</span></h2>
    <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden md:max-w-lg">
        <div class="md:flex">
            <div class="w-full p-4">
                <ul>
                    <li v-for="task in allProjectTasksDoing" :key="task" class="flex justify-between items-center bg-white mt-2 p-2 hover:shadow-lg rounded cursor-pointer transition">
                        <div class="flex ml-2"> <input type="checkbox" name="" id="">
                            <div class="flex flex-col ml-2"> <span class="font-medium text-black -mt-1">{{ task.subject }}</span> <span class="text-sm text-gray-400 truncate w-32">{{ task.project.project_name }}</span> </div>
                        </div>
                    </li>
                    <li v-if="allProjectTasksDoing.length == 0">No tasks yet</li>
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
    const allProjectTasksDoing = ref([])

    // get all tasks that state is doing and project is props value
    const getAllProjectTasksDoing = async () => {
        await Axios.get('/api/projects/' + props.projectId + '/tasks/doing')
                   .then( response => {
                       allProjectTasksDoing.value = response.data
                       console.log(response.data);
                   })
                   .catch( error => {
                       console.log(error)
                   })
    }

    onMounted(() => {
        getAllProjectTasksDoing()
    })

    // watching if props value changes
    watch( () => props.projectId, () => {
      getAllProjectTasksDoing()
    })

    return {
        allProjectTasksDoing
    }
  },
}
</script>
