<script setup>
import {watch, computed, ref} from 'vue'

let time = ref(4000)
const hours = computed(() => Math.round(time.value / 3600))
const seconds = computed(() => time.value % 60)

watch(time, () => {
  if (time.value > 0) {
    setTimeout(() => {
      time.value--;
    }, 1000)
  }
}, {immediate: true})

</script>

<template>
  <q-page>
    <div class="absolute-center">
      <q-card class="q-pa-lg" style="font-size: 30px">
        <q-spinner-hourglass size="100" color="primary" class="q-ma-lg"></q-spinner-hourglass>
        This website is under construction
        <q-spinner-hourglass size="100" color="primary" class="q-ma-lg"></q-spinner-hourglass>
        <q-card-section class="text-center">
          It will be done after:
          {{ hours }} hour{{ hours === 1 ? '' : 's' }} and {{ seconds }} seconds
        </q-card-section>
      </q-card>
    </div>

  </q-page>
</template>

<style scoped>

</style>
