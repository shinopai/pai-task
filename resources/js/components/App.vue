<template>
<div class="flex">
  <div class="w-1/4 px-2">
    <SideNav />
  </div>
  <div class="w-3/4 px-2">
    <router-view></router-view>
  </div>
</div>
</template>

<script>
import SideNav from './SideNav.vue'

export default {
  components: {
    SideNav
  },
  setup() {

  },
}
</script>
