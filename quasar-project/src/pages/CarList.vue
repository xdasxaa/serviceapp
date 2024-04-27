<script setup>
import {api} from "boot/axios";
import {ref, onMounted} from 'vue';
import {useQuasar} from "quasar";

let loading = ref(false);
const $q = useQuasar();
const cars = ref([]);
const columns = [
  {name: 'id', label: 'ID', align: 'left', field: 'id'},
  {name: 'brand', label: 'Brand', align: 'left', field: 'brand', sortable: true},
  {name: 'model', label: 'Model', align: 'left', field: 'model', sortable: true},
  {name: 'rental_price', label: 'Rental Price', align: 'left', field: 'rentalPrice', sortable: true},
  {name: 'pictures', label: 'Pictures', align: 'left', field: 'pictures'},
  {name: 'location', label: 'Location', align: 'left', field: 'location'},
  {name: 'year', label: 'Year', align: 'left', field: 'year'},
  {name: 'typeOfGearbox', label: 'Gearbox', align: 'left', field: 'typeOfGearbox'},
  {name: 'fuel_type', label: 'FuelType', align: 'left', field: 'fuelType'},
  {name: 'place_of_delivery', label: 'Delivery Place', align: 'left', field: 'placeOfDelivery'},
  {name: 'place_of_return', label: 'Return Place', align: 'left', field: 'placeOfReteur'},
  {name: 'description', label: 'Description', align: 'left', field: 'description'},
  {name: 'delete', field: 'delete'}
];

onMounted(async () => {
  await refresh_cars();
});

async function refresh_cars(){
  try {
    loading.value = true;
    const response = await api.get('/api/cars');
    console.log(response.data);
    cars.value = response.data;
    console.log('Fetched cars:', cars.value); // Log fetched cars data
    loading.value = false;
  } catch (error) {
    console.error('Error fetching cars:', error);
  }
}

function delete_car(carId){
  api.delete('/api/cars/'+carId).then(response => {
    refresh_cars()
    $q.notify({message: response.data.message, color: 'negative'});
  })
}
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
        :loading="loading"
      >
        <template v-slot:body-cell-delete="props">
          <q-td :props="props">
            <q-btn
              color="negative"
              icon-right="delete"
              no-caps
              flat
              dense
              @click="delete_car(props.row.id)"
            />
          </q-td>
        </template>
      </q-table>
    </div>
  </q-page>
</template>

<style scoped>
:global(table.q-table thead th) {
  font-weight: bold;
}

</style>
