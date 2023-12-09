<script setup>
import { Head, router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { onMounted } from 'vue';
import { ref, onBeforeMount } from 'vue';

defineProps();

onBeforeMount(() => {

})

onMounted(() => {
    Echo.private('chat-room')
        .listen('MessageSent', (e) => {
            console.log(e)
        });
    
    // Add event listener for key up
    addEventListener('keyup', (event) => {})
})

// run submit function if keyup === 'Enter'
onkeyup = (event) => {
    if (event.key === 'Enter') {
        submit()
    }
}

const form = reactive({
    message: '',
})

// submit the message
function submit() {
    router.post('message/sent', form);
}
</script>

<template>
    <Head title="Welcome" />

    <section class="flex max-h-screen h-screen py-24 bg-gray-100">
        <!-- container -->
        <div class="relative max-w-6xl bg-white mx-auto w-full h-full shadow-xl rounded-xl border border-gray-300">
            <!-- header -->
            <div class="bg-gray-100 p-4 rounded-t-xl">
                header here
            </div>
            <!-- main -->
            <section class="absolute inset-x-0 bottom-0 top-14 flex rounded-b-xl">
                <aside class="w-3/12 rounded-bl-xl">
                    dsfsd
                </aside>
                <main id="chat-wrapper" class="w-9/12 rounded-br-xl flex flex-col justify-between">
                    <div class="flex-1">
                        dsds
                    </div>
                    <div class="bg-gray-100 p-4 flex justify-between space-x-4 items-center">
                        <div class="flex space-x-2">
                            <svg class="text-gray-500 h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                            </svg>
                            <svg class="text-gray-500 h-7 w-7 stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <input v-model="form.message" type="text" class="flex-1 rounded-xl border-none px-4" placeholder=" Type a message">
                        <div>
                            <svg class="text-gray-500 h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                            </svg>
                        </div>
                    </div>
                </main>
            </section>
        </div>
    </section>
</template>

<style>
#chat-wrapper {
    background-image: url('/images/bg_image.png');
}

input {
  --tw-ring-shadow: 0 0 #000 !important;
}
</style>
