<script setup>
import { ref } from 'vue'

const visible = ref(false);
visible.value = true;
</script>

<template>
  <q-page>
    <div class="absolute-center">
      <div class="row">
        <div class="col-12">
          <q-inner-loading :showing="visible">
            <q-spinner-hourglass size="200px" color="primary"/>
          </q-inner-loading>
        </div>
        <div>
          <h1>
            Building
          </h1>
        </div>
      </div>
    </div>

  </q-page>
</template>

<style scoped>

</style>
