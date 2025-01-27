<template>
  <Layout>
    <div>
      <div class="w-full bg-red-800 p-2 flex items-center justify-center relative overflow-hidden">
        <div class="w-full max-w-[1240px] mx-auto flex items-center gap-2 text-sm font-medium text-white capitalize z-20">
          <Link :href="route('home')">Home</Link>
          <i class="fa-solid fa-angle-right text-xs"></i>
          <Link :href="route('venues.index')">Venues</Link>
          <i class="fa-solid fa-angle-right text-xs"></i>
          <p class="opacity-70">{{ field.name }}</p>
        </div>
        <div class="absolute w-48 h-48 rounded-full top-5 left-0 bg-gray-200 opacity-20"></div>
        <div class="absolute w-48 h-48 rounded-full top-5 left-20 bg-gray-200 opacity-40"></div>
        <div class="absolute w-48 h-48 rounded-full top-20 left-5 bg-gray-200 opacity-15"></div>
        <div class="absolute w-48 h-48 rounded-full top-20 right-16 bg-gray-200 opacity-40"></div>
        <div class="absolute w-48 h-48 rounded-full top-5 right-10 bg-gray-200 opacity-15"></div>
        <div class="absolute w-24 h-24 rounded-full top-28 right-1/2 translate-x-1/2 bg-gray-200 opacity-20"></div>
        <div class="absolute w-32 h-32 rounded-full bottom-20 right-1/3 translate-x-1/2 bg-gray-200 opacity-15"></div>
        <div class="absolute w-10 h-10 rounded-full bottom-20 left-1/3 translate-x-1/2 bg-gray-200 opacity-10"></div>
      </div>
      <div class="w-full max-w-[1240px] mx-auto py-10">
        <div class="w-full flex gap-10">
          <div class="w-[60%] h-screen ">
            <div class="w-full max-h-[403px] overflow-hidden rounded-xl">
              <img :src="field.image" alt="" class="w-full h-full object-cover object-center">
            </div>
            <div class="mt-8">
              <div class="flex justify-between">
                <div>
                  <h1 class="text-3xl font-bold text-gray-700">{{ field.name }}</h1>
                <div class="p-1 px-3 flex items-center justify-center rounded-md w-fit bg-red-800 text-white text-sm font-medium mt-3 capitalize">
                  <p>{{ field.category.name }}</p>
                </div>
              </div>
                <div>
                <h2 class="text-5xl font-bold text-gray-700">{{ field.reviews_avg_rating ? parseFloat(field.reviews_avg_rating) : 0 }}</h2>
              <div class="flex gap-1">
                <div v-for="n in 5" :key="n">
                  <i 
                    :class="{
                      'fa-solid fa-star text-yellow-500': n <= Math.floor(field.reviews_avg_rating), 
                      'fa-solid fa-star-half-alt text-yellow-500': n === Math.ceil(field.reviews_avg_rating) && field.reviews_avg_rating % 1 !== 0, 
                      'fa-regular fa-star': n > field.reviews_avg_rating
                    }">
                  </i>
              </div>
              </div>
              </div>
              
              </div>
              <div class="mt-12">
                <p>{{ field.description }}</p>
              </div>
            </div>
          </div>
          <div class="w-[40%] h-screen border ">

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
    field: Array
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