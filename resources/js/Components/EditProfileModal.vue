<script setup>
import {useForm} from "@inertiajs/vue3";
import {defineEmits} from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps(['user', 'profileEditing']);
const emit = defineEmits(['close']);

const form = useForm({
    image: props.user.image,
    bio: props.user.bio,
})
</script>

<template>
    <div class="bg-slate-900 absolute rounded-lg shadow-lg p-6 w-full max-w-lg z-50 shadow-2xl">
      <!-- Modal Header -->
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Edit Profile</h2>
        <button @click="emit('close')" class="text-gray-400 hover:text-gray-600">&times;</button>
      </div>

      <!-- Modal Body -->
      <form @submit.prevent="form.patch(route('profile.imageBioUpdate'))" enctype="multipart/form-data">
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-1">Image</label>
          <input type="file" @input="form.image = $event.target.files[0]" />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-1">Bio</label>
          <textarea v-model="form.bio" value="{{ user.bio }}" rows="4" class="w-full border border-gray-300 rounded-md p-2 bg-black"></textarea>
        </div>

        <!-- Modal Footer -->
        <div class="flex justify-end">
          <button type="button" @click="emit('close')" class="mr-3 text-gray-700 border border-gray-300 px-4 py-2 rounded-md hover:bg-gray-100">
            Cancel
          </button>
          <PrimaryButton class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Save Changes
          </PrimaryButton>
        </div>
      </form>
    </div>
</template>

