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
        <div class="absolute w-24 h-24 rounded-full top-28 right-1/2 translate-x-1/2 bg-gray-200 opacity-20"></div>
        <div class="absolute w-32 h-32 rounded-full bottom-20 right-1/3 translate-x-1/2 bg-gray-200 opacity-15"></div>
        <div class="absolute w-10 h-10 rounded-full bottom-20 left-1/3 translate-x-1/2 bg-gray-200 opacity-10"></div>
      </div>
      <div class="w-full max-w-[1240px] mx-auto">
        <div class="mt-16 border-b pb-10">
          <form action="" class="flex items-center gap-4">
              <div class="flex flex-1 items-center gap-4 w-full">
                <div class="w-full relative">
                  <input class="w-full border rounded-lg p-3 px-4 pl-12" type="text" name="venue" id="venue" placeholder="Cari nama venue">
                  <i class="fa-solid fa-magnifying-glass absolute text-xl left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <select name="venue" id="" class="w-full border rounded-lg p-3 px-4 relative">
                    <option selected>Pilih cabang olahraga</option>
                    <option v-for="category in categories" :key="category.uuid" :value="category.uuid" class="capitalize">{{ category.name }}</option>
                </select>
              </div>
              <button type="submit" class="bg-red-800 hover:bg-red-900 transition text-white rounded-lg p-3 px-4 w-[18rem] font-semibold">Cari venue</button>
          </form>
        </div>
        <div class="grid grid-cols-4 gap-5 mt-10 pb-10">
          <div v-for="venue in venues">
          <Link :href="route('venues.show', venue.uuid)">
            <div class="border rounded-xl overflow-hidden bg-white hover:shadow-xl hover:scale-105 transition">
              <div class="w-full max-h-[165px] flex items-center justify-center overflow-hidden">
              <img :src="venue.image" :alt="venue.name" class=" object-cover object-center">
            </div>
            <div class="p-4">
              <h2 class="font-black text-red-800 mb-4">Venue</h2>
              <h1 class="font-bold text-xl">{{ venue.name }}</h1>
              <div>
                <p class="text-sm capitalize">{{ venue.category.name }}</p>
              </div>
              <div class="flex items-center gap-1 mt-2">
                <div v-for="n in 5" :key="n">
                  <i 
                    :class="{
                      'fa-solid fa-star text-yellow-500': n <= Math.floor(venue.reviews_avg_rating), 
                      'fa-solid fa-star-half-alt text-yellow-500': n === Math.ceil(venue.reviews_avg_rating) && venue.reviews_avg_rating % 1 !== 0, 
                      'fa-regular fa-star': n > venue.reviews_avg_rating
                    }">
                  </i>
                    </div>
              </div>
              <div class="flex items-end gap-1 mt-8">
                <p class="text-xs">Mulai</p>
                <p class="font-bold text-xl">{{ formatRupiah(venue.price) }}</p>
                <p class="text-xs">/jam</p>
              </div>
            </div>
            </div>
          </Link>
        </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import Layout from '@/Layouts/Layout.vue';
import { onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
  
  const props = defineProps({
    venues: Array,
    categories: Array
  })

  const formatRupiah = (value) => {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(value);
  }

  onMounted(() => {
    console.log(props.categories);
  })
</script>

<style lang="scss" scoped>

</style>