<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <nav class="flex w-full h-[80px] border-b items-center justify-center">
        <div class="flex max-w-[1240px] h-full mx-auto w-full items-center justify-between">
            <div>
                <h1 class="text-3xl font-black">Bita<span class="text-red-800">Sport</span></h1>
            </div>
            <div class="flex items-center gap-3">
               <Link href="/" class="px-5 py-3 text-gray-500 hover:text-black transition font-semibold text">Home</Link>
               <Link :href="route('venues.index')" class="px-5 py-3 text-gray-500 hover:text-black transition font-semibold text">Lapangan</Link>
               <Link class="px-5 py-3 text-gray-500 hover:text-black transition font-semibold text">About</Link>
            </div>
            <div v-if="!$page.props.auth.user">
                <div class="flex items-center gap-3">
                <Link :href="route('login')" class="px-5 py-2 text-gray-500 hover:text-black transition font-semibold text">Masuk</Link>
                <Link :href="route('register')" class="px-5 py-2 font-semibold text rounded-lg bg-red-800 text-white">Daftar</Link>
                </div>
            </div>
            <div v-else="$page.props.auth.user" class="flex items-center">
                <Link href="/cart" class="px-5 py-3 text-gray-500 hover:text-black transition font-semibold"><i class="fa-solid fa-cart-shopping text-xl"></i></Link>
                <div class="text-gray-500">|</div>
                <Link href="/profile" class="relative px-5 py-3 text-gray-500 hover:text-black transition font-semibold">
                    <i class="fa-regular fa-user text-xl"></i>
                    <div class="absolute top-0 border w-20 h-20">
                        
                    </div>
                </Link>
            </div>
        </div>
    </nav>
</template>



<style  scoped>

</style>