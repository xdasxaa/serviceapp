<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

const cars = ref([]);
const columns = [
  { name: 'id', label: 'ID', align: 'left', field: 'id' },
  { name: 'brand', label: 'Brand', align: 'left', field: 'brand' },
  { name: 'model', label: 'Model', align: 'left', field: 'model' },
  // Add more columns as needed
];

onMounted(async () => {
  try {
    console.log('hani anfetchi')
    const response = await axios.get('http://localhost:8000/api/cars');
    console.log(response.data);
    cars.value = response.data;
    console.log('Fetched cars:', cars.value); // Log fetched cars data
  } catch (error) {
    console.error('Error fetching cars:', error);
  }
});
</script>

<template>
  <div>
    <h1>List of Cars</h1>
    <q-table
      :rows="cars"
      :columns="columns"
      row-key="id"
    />
  </div>

</template>

<style scoped>

</style>
