<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const dropdownProfile = ref(false);

const handleDropdownProfile = () => {
  dropdownProfile.value = !dropdownProfile.value;
};
</script>

<template>
  <nav
    class="sticky top-0 z-50 flex h-[70px] w-full items-center justify-center border-b bg-white"
  >
    <div
      class="mx-auto flex h-full w-full max-w-[1240px] items-center justify-between"
    >
      <div>
        <h1 class="text-3xl font-black">
          Bita<span class="text-red-800">Sport</span>
        </h1>
      </div>
      <div class="flex items-center gap-3">
        <Link
          href="/"
          class="text px-5 py-3 font-semibold text-gray-500 transition hover:text-black"
          >Beranda</Link
        >
        <Link
          :href="route('venues.index')"
          class="text px-5 py-3 font-semibold text-gray-500 transition hover:text-black"
          >Sewa Lapangan</Link
        >
        <Link
          class="text px-5 py-3 font-semibold text-gray-500 transition hover:text-black"
          >About</Link
        >
      </div>
      <div v-if="!$page.props.auth.user">
        <div class="flex items-center gap-3">
          <Link
            :href="route('login')"
            class="text px-5 py-2 font-semibold text-gray-500 transition hover:text-black"
            >Masuk</Link
          >
          <Link
            :href="route('register')"
            class="text rounded-lg bg-red-800 px-5 py-2 font-semibold text-white"
            >Daftar</Link
          >
        </div>
      </div>
      <div v-if="$page.props.auth.user" class="flex items-center">
        <Link
          href="/cart"
          class="px-5 py-3 font-semibold text-gray-500 transition hover:text-black"
          ><i class="fa-solid fa-cart-shopping text-xl"></i
        ></Link>
        <div class="text-gray-500">|</div>
        <div class="relative">
          <div
            @click="handleDropdownProfile"
            href="/profile"
            class="cursor-pointer px-5 py-3 font-semibold text-gray-500 transition hover:text-black"
          >
            <i class="fa-regular fa-user text-xl"></i>
          </div>
          <ul
            v-if="dropdownProfile"
            class="absolute right-0 top-[3.5rem] z-[999] w-[16rem] rounded-lg border bg-white p-2 px-4 font-semibold text-gray-600 shadow-lg"
          >
            <Link>
              <div
                class="flex items-center gap-1 border-b py-2 hover:bg-gray-50"
              >
                <div
                  class="flex h-8 w-8 items-center justify-center overflow-hidden"
                >
                  <i class="fa-solid fa-user-pen text-lg"></i>
                </div>
                <p>Profile</p>
              </div>
            </Link>
            <Link>
              <div
                class="flex items-center gap-1 border-b py-2 hover:bg-gray-50"
              >
                <div
                  class="flex h-8 w-8 items-center justify-center overflow-hidden"
                >
                  <i class="fa-solid fa-gauge text-lg"></i>
                </div>
                <p>Dashboard</p>
              </div>
            </Link>
            <Link
              :href="route('logout')"
              method="POST"
              as="button"
              class="w-full"
            >
              <div class="flex items-center gap-1 py-2 hover:bg-gray-50">
                <div
                  class="flex h-8 w-8 items-center justify-center overflow-hidden"
                >
                  <i class="fa-solid fa-arrow-right-from-bracket text-lg"></i>
                </div>
                <p>Keluar</p>
              </div>
            </Link>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped></style>
