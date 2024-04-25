<script setup>
import axios from 'axios';
import {ref, onMounted} from 'vue';

const cars = ref([]);
const columns = [
  {name: 'id', label: 'ID', align: 'left', field: 'id'},
  {name: 'brand', label: 'Brand', align: 'left', field: 'brand'},
  {name: 'model', label: 'Model', align: 'left', field: 'model'},
  // Add more columns as needed
];

onMounted(async () => {
  try {
    const response = await axios.get('https://localhost:8000/api/cars');
    console.log(response.data);
    cars.value = response.data;
    console.log('Fetched cars:', cars.value); // Log fetched cars data
  } catch (error) {
    console.error('Error fetching cars:', error);
  }
});
</script>

<template>
  <q-page class="q-ml-lg q-mr-lg">
    <div>
      <div class="row">
        <h2 class="col-10">List of Cars</h2>
        <div class="col-2 self-center">
          <q-btn
            label="Add car"
            align="right"
            class="q-btn"
            color="primary"
            icon="add"
            size="lg"
            to="cars/add"
          />
        </div>
      </div>
      <q-table
        color="primary"
        table-class="text-primary"
        table-header-class="text-weight-bold"
        bordered
        :rows="cars"
        :columns="columns"
        row-key="id"
      >
        <template v-slot:header="props">
          <q-tr
            class="text-center">
            <q-th
              v-for="col in props.cols"
              :key="col.id"
              style="font-weight: bold; text-align: left"
            >
              {{ col.label }}
            </q-th>
          </q-tr>
        </template>
      </q-table>
    </div>
  </q-page>
</template>

<style scoped>

</style>
