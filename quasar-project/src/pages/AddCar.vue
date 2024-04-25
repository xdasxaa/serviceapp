<script>
import { ref } from 'vue'
export default {
  setup () {
    return {
      brand: ref(''),
      model: ref(''),
      rental_price: ref(0),
      pictures: ref(null),
      location: ref(''),
      year: ref(new Date().getFullYear()),
      gearbox: ref(null),
      fuel_type: ref(null),
      delivery_place: ref(null),
      return_place: ref(null),
      description: ref(null),
      fuels:[
        'Mazot',
        'Essence'
      ],
      gearboxes: [
        'Automatic',
        'Manual'
      ]
    }
  }
}
</script>

<template>
  <q-page class="q-ml-lg q-mr-lg q-mb-xl">
    <h5>Add new car</h5>
    <q-form>
      <div class="q-gutter-y-md column">
        <q-input clearable v-model="brand" label="Brand"/>
        <q-input clearable v-model="model" label="Model"/>
        <q-input v-model.number="rental_price" label="Rental Price" type="number"/>
        <q-file clearable v-model="pictures" label="Pictures">
          <template v-slot:prepend>
            <q-icon name="attach_file" />
          </template>
        </q-file>
        <q-input clearable v-model="location" label="Brand"/>
        <q-input clearable v-model="year" label="Year"/>
        <q-select clearable v-model="gearbox" :options="gearboxes" label="Gearbox Type"/>
        <q-select clearable v-model="fuel_type" :options="fuels" label="Fuel Type "/>
        <q-input clearable v-model="delivery_place" label="Delivery Location"/>
        <q-input clearable v-model="return_place" label="Return Location"/>
        <q-input clearable v-model="description" autogrow label="Description"/>
        <q-btn label="Submit" color="primary" size="lg" />
      </div>
    </q-form>
  </q-page>
</template>

<style scoped>

</style>
