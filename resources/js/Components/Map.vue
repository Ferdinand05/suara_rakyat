<template>
    <div>
        <div id="map" style="height: 400px; width: 100%"></div>
        <div class="space-x-1 text-sm text-blue-600">
            <span>{{ selectedLocation.lat }}</span
            >,
            <span>{{ selectedLocation.lng }}</span>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, watch, reactive } from "vue";

import L from "leaflet";

const props = defineProps({
    latitude: {
        type: Number,
        default: -6.194585,
    },
    longitude: {
        type: Number,
        default: 106.823772,
    },
    zoom: {
        type: Number,
        default: 13,
    },
});
const map = ref(null);
const marker = ref();
const selectedLocation = ref({ lat: props.latitude, lng: props.longitude });

const initMap = () => {
    map.value = L.map("map").setView(
        [selectedLocation.value.lat, selectedLocation.value.lng],
        props.zoom
    ); // Set posisi awal (Jakarta)

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map.value);

    // Tambahkan marker pertama kali berdasarkan props
    if (selectedLocation.value.lat && selectedLocation.value.lng) {
        marker.value = L.marker([
            selectedLocation.value.lat,
            selectedLocation.value.lng,
        ]).addTo(map.value);
    }

    map.value.on("click", (e) => {
        const { lat, lng } = e.latlng;
        selectedLocation.value = { lat, lng };

        if (marker.value) {
            marker.value.setLatLng([lat, lng]);
        } else {
            marker.value = L.marker([lat, lng]).addTo(map.value);
        }
    });
};

// ketika pertama kali halaman dirender
onMounted(() => {
    initMap();
});

// Ekspos data dan fungsi untuk parent
defineExpose({
    selectedLocation,
});
</script>
