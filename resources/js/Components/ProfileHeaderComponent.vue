<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import EditProfileModal from '@/Components/EditProfileModal.vue';
import { ref } from 'vue';

defineProps(['user'])
const profileEditing = ref(false)

function toggleProfileEditing() {
  profileEditing.value = !profileEditing.value;
}

</script>

<template>
    <div class="w-auto bg-black text-white block mb-2">
        <!--Header-->
        <div class="w-auto h-44 bg-gray-500 relative">

            <img class="h-36 w-36 absolute top-28 left-10 rounded-full" :src="user.image" alt="something">

            <div class="absolute" style="right: 30px; bottom: -60px;">
                <PrimaryButton @click="toggleProfileEditing" class="bg-slate-900">
                    Edit
                </PrimaryButton>
            </div>
        </div>

        <EditProfileModal v-if="profileEditing" :user="user" @close="toggleProfileEditing">

        </EditProfileModal>

        <!-- Main info -->
         <div class="w-full bg-black block pt-24 pb-10 px-10 text-gray-400">

            <h1 class="text-3xl font-extrabold text-white">{{ user.name }}</h1>
            <p class="mt-2 text-xs inline-block mr-4">@{{ user.username }}</p>
            <span class="mt-2 text-sm">{{ user.created_at }}</span>

            <div class="w-full">
                <div class="text-sm text-gray-300 inline-block mr-2">Bio</div>
                <div class="text-white">{{ user.bio }}</div>
            </div>

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
