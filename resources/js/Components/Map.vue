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
import { FwbInput } from "flowbite-vue";

const map = ref(null);
const marker = ref(null);
const selectedLocation = ref({ lat: -6.194585, lng: 106.823772 });

const initMap = () => {
    map.value = L.map("map").setView(
        [selectedLocation.value.lat, selectedLocation.value.lng],
        13
    ); // Set posisi awal (Jakarta)

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map.value);

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

// Watch untuk memperbarui peta ketika user memasukkan lat/lng secara manual
watch(
    () => selectedLocation.value,
    (newVal) => {
        if (map.value && marker.value) {
            map.value.setView([newVal.lat, newVal.lng], 13); // Pindahkan peta
            marker.value.setLatLng([newVal.lat, newVal.lng]); // Pindahkan marker
        }
        console.log(newVal);
    }
);

// ketika pertama kali halaman dirender
onMounted(() => {
    initMap();
});
</script>
