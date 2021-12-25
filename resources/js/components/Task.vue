<template>
<div>
    <h2 class="text-center mb-5 font-bold">All</h2>
  <div class="flex justify-center items-center gap-2">
	<div class="item w-1/3 h-28">
    <Do />
  </div>
	<div class="item w-1/3 h-28">
    <Doing />
  </div>
	<div class="item w-1/3 h-28">
    <Done />
  </div>
</div>
</div>
</template>

<script>
import Do from './Do.vue'
import Doing from './Doing.vue'
import Done from './Done.vue'

export default {
  components: {
    Do, Doing, Done
  },
  setup() {

  },
}
</script>
