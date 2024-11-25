<template>
    <fwb-button @click="showModal" :size="size"> {{ btn }} </fwb-button>

    <fwb-modal v-if="isShowModal" @close="closeModal">
        <template #header>
            <div class="flex items-center text-lg">
                <slot name="header"></slot>
            </div>
        </template>
        <template #body>
            <slot name="body"></slot>
        </template>
        <template #footer>
            <div class="flex justify-between">
                <fwb-button @click="closeModal" color="alternative">
                    Cancel
                </fwb-button>
                <slot name="footer"> </slot>
            </div>
        </template>
    </fwb-modal>
</template>
<script setup>
import { ref } from "vue";
import { FwbButton, FwbModal } from "flowbite-vue";
defineProps({
    btn: String,
    size: {
        type: String,
        default: "sm",
    },
});

const isShowModal = ref(false);

function closeModal() {
    isShowModal.value = false;
}
function showModal() {
    isShowModal.value = true;
}

defineExpose({
    closeModal,
    showModal,
});
</script>
