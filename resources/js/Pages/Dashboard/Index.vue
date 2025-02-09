<template>
    <DashboardLayout title="Dashboard" subtitle="Dashboard">
        <div class="grid md:grid-cols-3 grid-cols-1 gap-3 md:gap-10 mb-6">
            <div class="bg-red-500 text-center md:py-8 py-5 rounded-md">
                <div class="text-2xl font-semibold md:text-3xl">Users</div>
                <div class="font-semibold text-xl md:text-2xl">
                    {{ jumlahUser }}
                </div>
            </div>
            <div class="bg-yellow-500 text-center md:py-8 py-5 rounded-md">
                <div class="text-2xl font-semibold md:text-3xl">Pengaduan</div>
                <div class="font-semibold text-xl md:text-2xl">
                    {{ jumlahPengaduan }}
                </div>
            </div>
            <div class="bg-green-500 text-center md:py-8 py-5 rounded-md">
                <div class="text-2xl font-semibold md:text-3xl">
                    Pengaduan <span class="italic text-sm">Pending</span>
                </div>
                <div class="font-semibold text-xl md:text-2xl">
                    {{ jumlahPengaduanPending }}
                </div>
            </div>
        </div>
        <hr />
        <div class="my-3">
            <h3 class="font-semibold text-xl md:text-2xl">Statistik</h3>
            <div>
                <Bar
                    id="my-chart-id"
                    :options="chartOptions"
                    :data="chartData"
                />
            </div>
            <div>
                <Doughnut :options="chartOptions" :data="chartData"></Doughnut>
            </div>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { onMounted } from "vue";
import DashboardLayout from "../Layouts/DashboardLayout.vue";
defineProps({
    jumlahUser: Number,
    jumlahPengaduan: Number,
    jumlahPengaduanPending: Number,
    kategoriPengaduanCount: Object,
});
import { usePage } from "@inertiajs/vue3";
const page = usePage();
import { Bar } from "vue-chartjs";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";
import { color } from "chart.js/helpers";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

const kategoriPengaduan = page.props.kategoriPengaduanCount;
const labelKategori = kategoriPengaduan.map((item) => {
    return item.nama_kategori;
});
const countKategori = kategoriPengaduan.map((item) => {
    return item.pengaduans_count;
});

const chartData = {
    labels: labelKategori,
    datasets: [
        {
            label: "Total",
            backgroundColor: "lightblue",
            data: countKategori,
        },
    ],
};

const chartOptions = {
    responsive: true,
};
</script>
