<script setup>
    import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps(['user'])
</script>

<template>
    <div class="w-auto h-96 bg-black text-white block mb-16">
        <!--Header-->
        <div class="w-auto h-44 bg-gray-500 relative">
            <img class="h-36 w-36 absolute top-28 left-10 rounded-full" src="https://pbs.twimg.com/profile_images/1852369494250770432/fYUxsm9h_400x400.jpg" alt="something">
            <div class="absolute" style="right: 30px; bottom: -60px;">
                <PrimaryButton :href="route('profile.edit')" class="bg-slate-900">
                    <a :href="route('profile.edit')">Edit</a>
                </PrimaryButton>
            </div>
        </div>

        <!-- Main info -->
         <div class="w-full bg-black block pt-24 pb-10 px-10 text-gray-400">
            <h1 class="text-3xl font-extrabold text-white">{{ user.name }}</h1>
            <p class="mt-2 text-xs">@{{ user.username }}</p>
            <span class="mt-2 text-sm">{{ user.created_at }}</span>
            <div class="flex mt-2">
                <div>
                    <span class="text-white mr-1">1</span> following
                </div>
                <div class="flex-1 ml-4">
                    <span class="text-white mr-1">1</span> follower
                </div>
            </div>
         </div>
    </div>
</template>
