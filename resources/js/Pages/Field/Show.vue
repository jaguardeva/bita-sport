<template>
  <Head :title="field.name" />
  <Layout>
    <div>
      <div
        class="relative flex w-full items-center justify-center overflow-hidden bg-red-800 p-2"
      >
        <div
          class="z-20 mx-auto flex w-full max-w-[1240px] items-center gap-2 text-sm font-medium capitalize text-white"
        >
          <Link :href="route('home')">Home</Link>
          <i class="fa-solid fa-angle-right text-xs"></i>
          <Link :href="route('venues.index')">Venues</Link>
          <i class="fa-solid fa-angle-right text-xs"></i>
          <p class="opacity-70">{{ field.name }}</p>
        </div>
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
      <div class="mx-auto w-full max-w-[1240px] py-10">
        <div class="flex w-full gap-10">
          <div class="w-[70%]">
            <div class="max-h-[403px] w-full overflow-hidden rounded-xl">
              <img
                :src="field.image"
                alt=""
                class="h-full w-full object-cover object-center"
              />
            </div>
            <div class="mt-8 border-b pb-5">
              <div class="flex justify-between">
                <div>
                  <h1 class="text-3xl font-bold text-gray-800">
                    {{ field.name }}
                  </h1>
                  <div
                    class="mt-3 flex w-fit items-center justify-center gap-1 rounded bg-gray-200 p-1 px-3 text-xs font-semibold capitalize text-gray-800"
                  >
                    <i
                      :class="{
                        'fa-solid fa-shuttlecock':
                          field.category.name === 'badminton',
                        'fa-solid fa-futbol': field.category.name === 'futsal',
                        'fa-solid fa-basketball':
                          field.category.name === 'basket',
                        'fa-solid fa-tennis-ball':
                          field.category.name === 'tennis',
                      }"
                    ></i>
                    <p>{{ field.category.name }}</p>
                  </div>
                </div>
                <div>
                  <h2 class="text-5xl font-bold text-gray-700">
                    {{
                      field.reviews_avg_rating
                        ? parseFloat(field.reviews_avg_rating)
                        : 0
                    }}
                  </h2>
                  <div class="flex gap-1">
                    <div v-for="n in 5" :key="n">
                      <i
                        :class="{
                          'fa-solid fa-star text-yellow-500':
                            n <= Math.floor(field.reviews_avg_rating),
                          'fa-solid fa-star-half-alt text-yellow-500':
                            n === Math.ceil(field.reviews_avg_rating) &&
                            field.reviews_avg_rating % 1 !== 0,
                          'fa-regular fa-star': n > field.reviews_avg_rating,
                        }"
                      >
                      </i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-10">
              <div class="space-y-2 text-sm">
                <h3 class="text-base font-bold text-gray-800">Deskripsi</h3>
                <p>{{ field.description }}</p>
              </div>
            </div>
            <div class="mt-10">
              <div class="space-y-2 text-sm">
                <h3 class="text-base font-bold text-gray-800">Fasilitas</h3>
                <p>{{ field.description }}</p>
              </div>
            </div>
            <div class="mt-10">
              <div class="space-y-2 text-sm">
                <h3 class="text-base font-bold text-gray-800">Aturan Venue</h3>
                <p>{{ field.description }}</p>
              </div>
            </div>
            <div class="mt-10">
              <div class="text-sm">
                <h3 class="text-base font-bold text-gray-800">
                  Rating dan Ulasan
                </h3>
                <div>
                  <div v-if="reviews.length > 0" class="mt-5 space-y-8">
                    <div
                      v-for="review in reviews"
                      :key="review.id"
                      class="w-full space-y-3"
                    >
                      <div class="flex items-center gap-4">
                        <div
                          class="flex h-8 w-8 items-center justify-center overflow-hidden rounded-full bg-gray-500"
                        >
                          <i
                            class="fa-solid fa-user mt-3 text-2xl text-white"
                          ></i>
                        </div>
                        <div>
                          <p class="font-bold text-gray-600">
                            {{ review.user.name }}
                          </p>
                        </div>
                      </div>
                      <div class="flex items-center gap-4">
                        <div class="flex gap-1">
                          <div v-for="n in 5" :key="n">
                            <i
                              :class="{
                                'fa-solid fa-star text-yellow-500':
                                  n <= Math.floor(review.rating),
                                'fa-solid fa-star-half-alt text-yellow-500':
                                  n === Math.ceil(review.rating) &&
                                  review.rating % 1 !== 0,
                                'fa-regular fa-star': n > review.rating,
                              }"
                            >
                            </i>
                          </div>
                        </div>
                        <div>
                          <p class="font-medium text-gray-600">
                            {{
                              new Date(review.created_at).toLocaleDateString(
                                'id-ID',
                              )
                            }}
                          </p>
                        </div>
                      </div>
                      <div>
                        <p>{{ review.comment }}</p>
                      </div>
                    </div>
                  </div>
                  <div
                    v-else
                    class="mt-4 flex items-center justify-center rounded bg-gray-50 p-10"
                  >
                    <div
                      class="flex items-center justify-center gap-1 text-gray-500"
                    >
                      <i class="fa-solid fa-empty-set"></i>
                      <p class="text-center">Belum ada ulasan!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-[30%]">
            <div class="w-full rounded-xl border p-4 shadow">
              <p class="text-sm font-semibold text-gray-400">Mulai dari</p>
              <div class="mt-2 flex items-center gap-1">
                <p class="text-2xl font-extrabold">
                  {{ formatRupiah(field.price) }}
                </p>
                <p class="text-sm font-medium text-gray-400">/jam</p>
              </div>
              <button
                class="mt-5 w-full rounded-xl bg-red-800 p-3 font-semibold text-white transition hover:bg-red-900"
              >
                Cek Ketersediaan
              </button>
            </div>
          </div>
        </div>
        <div class="mt-20 w-full">
          <div class="flex items-center gap-4">
            <div
              class="flex h-5 w-5 items-center justify-center rounded-full bg-red-200"
            >
              <i class="fa-solid fa-play ml-[2px] text-xs text-red-800"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Pilih Jadwal</h1>
          </div>
          <div class="mt-5 grid grid-cols-6 gap-4">
            <div
              v-for="schedule in field.schedules"
              :key="schedule.id"
              class="flex h-20 w-full cursor-pointer items-center justify-center rounded-lg bg-red-800 text-white transition hover:bg-red-900"
            >
              <div
                class="flex items-center justify-center text-sm font-semibold"
              >
                <p>{{ schedule.start_time.slice(0, 5) }}</p>
                <p class="mx-1">-</p>
                <p>{{ schedule.end_time.slice(0, 5) }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import Layout from '@/Layouts/Layout.vue';
import { onMounted } from 'vue';
import { Link, Head } from '@inertiajs/vue3';

const props = defineProps({
  field: Array,
  reviews: Array,
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
