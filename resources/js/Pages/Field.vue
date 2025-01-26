<template>
  <Layout>
    <div>
      <div class="w-full bg-red-800 p-14 flex items-center justify-center relative overflow-hidden">
        <h1 class="text-4xl font-bold text-white uppercase z-20">booking lapangan terbaik</h1>
        <div class="absolute w-48 h-48 rounded-full top-5 left-0 bg-gray-200 opacity-20"></div>
        <div class="absolute w-48 h-48 rounded-full top-5 left-20 bg-gray-200 opacity-40"></div>
        <div class="absolute w-48 h-48 rounded-full top-20 left-5 bg-gray-200 opacity-15"></div>
        <div class="absolute w-48 h-48 rounded-full top-20 right-16 bg-gray-200 opacity-40"></div>
        <div class="absolute w-48 h-48 rounded-full top-5 right-10 bg-gray-200 opacity-15"></div>
        <div class="absolute w-48 h-48 rounded-full top-20 right-1/2 translate-x-1/2 bg-gray-200 opacity-20"></div>
        <div class="absolute w-48 h-48 rounded-full bottom-20 right-1/3 translate-x-1/2 bg-gray-200 opacity-15"></div>
        <div class="absolute w-48 h-48 rounded-full bottom-20 left-1/3 translate-x-1/2 bg-gray-200 opacity-10"></div>
      </div>
      <div class="w-full max-w-[1240px] mx-auto border">
        <div class="mt-16">
          <form action="" class="flex items-center gap-4">
              <div class="flex items-center gap-4 w-full">
                <input class="w-full border rounded-lg p-3 px-4" type="text" name="venue" id="venue" placeholder="Cari nama venue">
                <select name="venue" id="" class="w-full border rounded-lg p-3 px-4 relative">
                    <option selected>Pilih cabang olahraga</option>
                    <option v-for="venue in venues" :key="venue.id" :value="venue.id">{{ venue.name }}</option>
                </select>
              </div>
              <button type="submit" class="bg-red-800 text-white rounded-lg p-3 px-4 w-[18rem] font-semibold">Cari venue</button>
          </form>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import Layout from '@/Layouts/Layout.vue';
import { onMounted } from 'vue';
  
  const props = defineProps({
    venues: Array,
  })

  onMounted(() => {
    console.log(props.venues);
  })
</script>

<style lang="scss" scoped>

</style>