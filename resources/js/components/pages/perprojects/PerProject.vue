<template>
<div>
    <h2 class="text-center mb-5 font-bold">{{ projectName }}</h2>
  <div class="flex justify-center items-center gap-2">
	<div class="item w-1/3 h-28">
    <Do :projectId="projectId" />
  </div>
	<div class="item w-1/3 h-28">
    <Doing :projectId="projectId" />
  </div>
	<div class="item w-1/3 h-28">
    <Done :projectId="projectId" />
  </div>
</div>
</div>
</template>

<script>
import { ref, onMounted, watch } from 'vue'
import Axios from 'axios'
import Do from './Do.vue'
import Doing from './Doing.vue'
import Done from './Done.vue'

export default {
  components: {
    Do, Doing, Done
  },
  props: {
    projectId: {
      type: String,
      required: true
    }
  },
  setup(props) {
    const projectName = ref('')

    const getProjectName = async () => {
      await Axios.get('/api/project_name/' + props.projectId)
                 .then( response => {
                   projectName.value = response.data
                 })
                 .catch( error => {
                   console.log(error)
                 })
    }

    onMounted(() => {
      getProjectName()
    })

    return {
      projectName
    }
  },
}
</script>
