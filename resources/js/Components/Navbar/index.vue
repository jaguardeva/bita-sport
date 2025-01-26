<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <nav class="flex w-full h-[80px] border-b items-center justify-center">
        <div class="flex max-w-[1240px] h-full mx-auto w-full items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Bita<span class="text-red-800">Sport</span></h1>
            </div>
            <div class="flex items-center gap-3">
               <Link href="/" class="px-5 py-3 text-gray-500 hover:text-black transition font-semibold text-lg">Home</Link>
               <Link :href="route('venues.index')" class="px-5 py-3 text-gray-500 hover:text-black transition font-semibold text-lg">Lapangan</Link>
               <Link class="px-5 py-3 text-gray-500 hover:text-black transition font-semibold text-lg">About</Link>
            </div>
            <div class="flex items-center gap-3">
                <Link :href="route('login')" class="px-5 py-2 text-gray-500 hover:text-black transition font-semibold text-lg">Masuk</Link>
                <Link :href="route('register')" class="px-5 py-2 font-semibold text-lg rounded-lg bg-red-800 text-white">Daftar</Link>
            </div>
        </div>
    </nav>
</template>



<style  scoped>

</style>