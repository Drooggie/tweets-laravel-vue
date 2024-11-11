<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps(['user'])
const bioEditing = ref(false)

const form = useForm({
    bio: '',
})

</script>

<template>
    <div class="w-auto bg-black text-white block mb-2">
        <!--Header-->
        <div class="w-auto h-44 bg-gray-500 relative">
            <img class="h-36 w-36 absolute top-28 left-10 rounded-full" src="https://pbs.twimg.com/profile_images/1852369494250770432/fYUxsm9h_400x400.jpg" alt="something">
            <div class="absolute" style="right: 30px; bottom: -60px;">
                <PrimaryButton :href="route('profile.edit')" class="bg-slate-900">
                    Edit
                </PrimaryButton>
            </div>
        </div>

        <!-- Main info -->
         <div class="w-full bg-black block pt-24 pb-10 px-10 text-gray-400">

            <h1 class="text-3xl font-extrabold text-white">{{ user.name }}</h1>
            <p class="mt-2 text-xs inline-block mr-4">@{{ user.username }}</p>
            <span class="mt-2 text-sm">{{ user.created_at }}</span>

            <div class="w-full">
                <div class="text-sm text-gray-300 inline-block mr-2">Bio</div>
                <button class="text-sm" @click="bioEditing = bioEditing ? false : true;">Edit</button>
                <div class="text-white">{{ user.bio }}</div>
            </div>

            <form class="mb-20" v-if="bioEditing" @submit.prevent="form.put(route('profile.bioUpdate', user.id), {onSuccess: () => {bioEditing = false}})">
                <textarea v-model="form.bio" class="mt-4 w-full border-gray-600 bg-slate-900 focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm placeholder-white"></textarea>
                <div class="space-x-2">
                    <InputError :message="form.errors.bio" class="mt-2" />
                    <PrimaryButton class="mt-4">Save</PrimaryButton>
                    <button class="mt-4" @click="bioEditing = false; form.reset(); form.clearErrors()">Cancel</button>
                </div>
            </form>

            <div class="block">
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
    </div>
</template>
