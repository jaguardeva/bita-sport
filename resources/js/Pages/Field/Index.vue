<template>
  <Head title="Sewa Lapangan" />
  <Layout>
    <div>
      <div
        class="relative flex w-full items-center justify-center overflow-hidden bg-red-800 p-14"
      >
        <h1 class="z-20 text-4xl font-bold uppercase text-white">
          Sewa lapangan terbaik
        </h1>
        <div
          class="absolute left-0 top-5 h-48 w-48 rounded-full bg-gray-200 opacity-20"
        ></div>
        <div
          class="absolute left-20 top-5 h-48 w-48 rounded-full bg-gray-200 opacity-40"
        ></div>
        <div
          class="absolute left-5 top-20 h-48 w-48 rounded-full bg-gray-200 opacity-15"
        ></div>
        <div
          class="absolute right-16 top-20 h-48 w-48 rounded-full bg-gray-200 opacity-40"
        ></div>
        <div
          class="absolute right-10 top-5 h-48 w-48 rounded-full bg-gray-200 opacity-15"
        ></div>
        <div
          class="absolute right-1/2 top-28 h-24 w-24 translate-x-1/2 rounded-full bg-gray-200 opacity-20"
        ></div>
        <div
          class="absolute bottom-20 right-1/3 h-32 w-32 translate-x-1/2 rounded-full bg-gray-200 opacity-15"
        ></div>
        <div
          class="absolute bottom-20 left-1/3 h-10 w-10 translate-x-1/2 rounded-full bg-gray-200 opacity-10"
        ></div>
      </div>
      <div class="mx-auto w-full max-w-[1240px]">
        <div class="mt-16 border-b pb-10">
          <form action="" class="flex items-center gap-4">
            <div class="flex w-full flex-1 items-center gap-4">
              <div class="relative w-full">
                <input
                  class="w-full rounded-lg border p-3 px-4 pl-12"
                  type="text"
                  name="venue"
                  id="venue"
                  placeholder="Cari nama venue"
                />
                <i
                  class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-xl text-gray-400"
                ></i>
              </div>
              <select
                name="venue"
                id=""
                class="relative w-full rounded-lg border p-3 px-4"
              >
                <option selected>Pilih cabang olahraga</option>
                <option
                  v-for="category in categories"
                  :key="category.uuid"
                  :value="category.uuid"
                  class="capitalize"
                >
                  {{ category.name }}
                </option>
              </select>
            </div>
            <button
              type="submit"
              class="w-[18rem] rounded-lg bg-red-800 p-3 px-4 font-semibold text-white transition hover:bg-red-900"
            >
              Cari venue
            </button>
          </form>
        </div>
        <div class="mt-10 grid grid-cols-4 gap-5 pb-10">
          <Link
            v-for="venue in venues"
            :key="venue.uuid"
            :href="route('venues.show', venue.uuid)"
          >
            <div
              class="overflow-hidden rounded-xl border bg-white shadow transition hover:scale-105 hover:shadow-xl"
            >
              <div
                class="flex max-h-[165px] w-full items-center justify-center overflow-hidden"
              >
                <img
                  :src="venue.image"
                  :alt="venue.name"
                  class="object-cover object-center"
                />
              </div>
              <div class="p-4">
                <h2 class="mb-4 font-black text-red-800">Venue</h2>
                <h1 class="text-xl font-bold">
                  {{ venue.name }}
                </h1>
                <div>
                  <div
                    class="mt-3 flex w-fit items-center justify-center gap-1 rounded bg-gray-100 p-1 px-3 text-xs font-semibold capitalize text-gray-800"
                  >
                    <i
                      :class="{
                        'fa-solid fa-shuttlecock':
                          venue.category.name === 'badminton',
                        'fa-solid fa-futbol': venue.category.name === 'futsal',
                        'fa-solid fa-basketball':
                          venue.category.name === 'basket',
                        'fa-solid fa-tennis-ball':
                          venue.category.name === 'tennis',
                      }"
                    ></i>
                    <p>{{ venue.category.name }}</p>
                  </div>
                </div>
                <div class="mt-2 flex items-center gap-1">
                  <div v-for="n in 5" :key="n">
                    <i
                      :class="{
                        'fa-solid fa-star text-yellow-500':
                          n <= Math.floor(venue.reviews_avg_rating),
                        'fa-solid fa-star-half-alt text-yellow-500':
                          n === Math.ceil(venue.reviews_avg_rating) &&
                          venue.reviews_avg_rating % 1 !== 0,
                        'fa-regular fa-star': n > venue.reviews_avg_rating,
                      }"
                    >
                    </i>
                  </div>
                </div>
                <div class="mt-8 flex items-end gap-1">
                  <p class="text-xs">Mulai</p>
                  <p class="text-xl font-bold">
                    {{ formatRupiah(venue.price) }}
                  </p>
                  <p class="text-xs">/jam</p>
                </div>
              </div>
            </div>
          </Link>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import { Link, Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/Layout.vue';
import { onMounted } from 'vue';

const props = defineProps({
  venues: Array,
  categories: Array,
});

const formatRupiah = (value) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    maximumFractionDigits: 0,
  }).format(value);
};

onMounted(() => {
  console.log(props.categories);
});
</script>

<style lang="scss" scoped></style>
