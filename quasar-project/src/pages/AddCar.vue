<script setup>
import {onMounted, ref} from 'vue';
import {api} from "boot/axios";
import {useQuasar} from "quasar";
import {useRouter} from "vue-router";

const $q = useQuasar();
const router = useRouter();
const addCarForm = ref('')
const brand = ref('')
const model = ref('')
const rental_price = ref(0)
const pictures = ref('')
const location = ref('')
const year = ref(new Date().getFullYear())
const gearbox = ref('')
const fuel_type = ref('')
const delivery_place = ref('')
const return_place = ref('')
const description = ref('')
const fields = {
  'brand': brand,
  'model': model,
  'rental_price': rental_price,
  'pictures': pictures,
  'location': location,
  'year': year,
  'gearbox': gearbox,
  'fuel_type': fuel_type,
  'delivery_place': delivery_place,
  'return_place': return_place,
  'description': description
};
const fieldKeys = Object.keys(fields);
const fuels = [
  'Mazot',
  'Essence'
]
const gearboxes = [
  'Automatic',
  'Manual'
]


function onSubmit () {
  console.log(gearbox)
  let formData = {};
  for (let i = 0; i < fieldKeys.length; i++) {
    formData[fieldKeys[i]] = fields[fieldKeys[i]].value
  }
  api.postForm('/api/cars/new', JSON.stringify(formData))
    .then(response => {
      router.push({path: '/cars'})
      $q.notify({message: response.data.message, color: 'positive'})
    })

}

onMounted(() => {
  console.log("Mounted")
})

function reset () {
  addCarForm.value.resetValidation()
}


</script>

<template>
  <q-page class="flex flex-center">
    <div class="full-width" style="max-width: 600px">
      <q-card
        class="q-pa-lg q-ma-lg"
      >
        <h5>Add new car</h5>
        <q-form ref="addCarForm" @submit="onSubmit" id="addCarForm">
          <q-card>
            <q-card-section>
              <q-input filled clearable v-model="brand" label="Brand" class="q-mb-sm" />
              <q-input filled clearable v-model="model" label="Model" class="q-mb-sm"/>
              <q-input filled v-model.number="rental_price" label="Rental Price" type="number" class="q-mb-sm"/>
              <q-input filled clearable v-model="pictures" label="Brand" class="q-mb-sm"/>
              <q-input filled clearable v-model="location" label="Location" class="q-mb-sm"/>
              <q-input filled clearable v-model="year" label="Year" lazy-rules hide-bottom-space class="q-mb-sm"
                       :rules="[
                                  val => val == null || val > 1900 && val <= new Date().getFullYear() || 'Please enter a year between 1900 and current year',
                                ]"/>
              <q-select filled clearable v-model="gearbox" :options="gearboxes" label="Gearbox Type" class="q-mb-sm"/>
              <q-select filled clearable v-model="fuel_type" :options="fuels" label="Fuel Type" class="q-mb-sm"/>
              <q-input filled clearable v-model="delivery_place" label="Delivery Location" class="q-mb-sm"/>
              <q-input filled clearable v-model="return_place" label="Return Location" class="q-mb-sm"/>
              <q-input filled clearable v-model="description" autogrow label="Description"/>
            </q-card-section>
            <q-btn label="Add" color="primary" type="submit" class="q-btn full-width"/>
          </q-card>
        </q-form>
      </q-card>
    </div>
  </q-page>
</template>

<style scoped>

</style>
