Layout Builder
Visible Header
Visible Footer
Visible left-side Drawer
Visible right-side Drawer
Inject Drawer content for scrolling
<template>
  <q-layout view="hHh LpR fFf">

    <q-header elevated class="bg-primary text-white" height-hint="98">
      <q-toolbar>
        <q-btn dense flat round icon="menu" @click="toggleLeftDrawer"/>
        <q-toolbar-title>
          <div @click="router.push('/')" class="cursor-pointer" style="width: fit-content">
            <q-avatar>
              <img src="../assets/logo.svg" alt="zeb"/>
            </q-avatar>
            Home
          </div>
        </q-toolbar-title>
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" side="left" elevated overlay :width="250">
      <!-- drawer content -->
      <q-scroll-area class="fit">
        <q-list>
          <template v-for="(drawerItem, index) in drawerItems" :key="index">
            <q-item clickable v-ripple :to="drawerItem.to" active-class="bg-info">
              <q-item-section avatar>
                <q-icon :name="drawerItem.icon"/>
              </q-item-section>
              <q-item-section>
                {{ drawerItem.label }}
              </q-item-section>
            </q-item>
            <q-separator :key="'sep'+index" v-if="drawerItem.separator"/>
          </template>
        </q-list>
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <router-view/>
    </q-page-container>

  </q-layout>
</template>

<script setup>
import {ref} from 'vue'
import {useRouter} from "vue-router";
import {useQuasar} from "quasar";

const $q = useQuasar();
const router = useRouter();
const leftDrawerOpen = ref(false)
const drawerItems = [
  {
    icon: 'directions_car',
    label: 'Cars',
    separator: true,
    to: '/cars'
  },
  {
    icon: 'man',
    label: 'People',
    separator: true,
  }
]

function toggleLeftDrawer () {
  leftDrawerOpen.value = !leftDrawerOpen.value
}

</script>
