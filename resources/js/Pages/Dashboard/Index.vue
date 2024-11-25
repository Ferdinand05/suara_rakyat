<template>
    <DashboardLayout title="Dashboard" subtitle="Dashboard">
        <div class="grid md:grid-cols-3 grid-cols-1 gap-3 md:gap-10 mb-6">
            <div class="bg-red-500 text-center md:py-8 py-5 rounded-md">
                <div class="text-2xl font-semibold md:text-3xl">Users</div>
                <div class="font-semibold text-xl md:text-2xl">10</div>
            </div>
            <div class="bg-yellow-500 text-center md:py-8 py-5 rounded-md">
                <div class="text-2xl font-semibold md:text-3xl">Pengaduan</div>
                <div class="font-semibold text-xl md:text-2xl">10</div>
            </div>
            <div class="bg-green-500 text-center md:py-8 py-5 rounded-md">
                <div class="text-2xl font-semibold md:text-3xl">
                    Pengaduan <span class="italic text-sm">Pending</span>
                </div>
                <div class="font-semibold text-xl md:text-2xl">10</div>
            </div>
        </div>
        <hr />
        <div class="my-3">
            <h3 class="font-semibold text-xl md:text-2xl">Statistik</h3>
        </div>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from "../Layouts/DashboardLayout.vue";
</script>
