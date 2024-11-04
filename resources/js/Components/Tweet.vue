<script setup>
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import {useForm} from '@inertiajs/vue3'
import {ref} from 'vue'
import dayjs from 'dayjs'
import relativeTime from 'dayjs/plugin/relativeTime'

dayjs.extend(relativeTime)

const props = defineProps(['tweet'])

const form = useForm({
    message: props.tweet.message,
})

const editing = ref(false);
</script>


<template>
    <div class="p-6 flex space-x-2 blocks bg-black my-5 rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-200 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-gray-100">{{ tweet.user.name }}</span>
                    <small class="ml-2 text-sm text-gray-400">{{ dayjs(tweet.created_at).fromNow() }}</small>
                    <small v-if="tweet.created_at !== tweet.updated_at" class="text-sm text-gray-400">&middot; Edited</small>
                </div>
                <Dropdown v-if="tweet.user.id === $page.props.auth.user.id" >
                    <template #trigger>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </template>
                    <template #content>
                        <button class="block w-full px-4 py-2 text-left text-sm leading-5 text-white hover:bg-slate-800 focus:bg-slate-800 transition duration-150 ease-in-out" @click="editing = true">
                            Edit
                        </button>
                        <DropdownLink as="button" :href="route('tweets.destroy', tweet.id)" method="delete">
                            Delete
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>
            <form v-if="editing" @submit.prevent="form.put(route('tweets.update', tweet.id), {onSuccess: () => editing = false})">
                <textarea v-model="form.message" class="mt-4 w-full text-white border-gray-600 bg-slate-900 focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm placeholder-white"></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <div class="space-x-2">
                    <PrimaryButton class="mt-4">Save</PrimaryButton>
                    <button class="mt-4" @click="editing = false; form.reset(); form.clearErrors()">Cancel</button>
                </div>
            </form>
            <p class="mt-4 text-lg text-white pt-2">{{ tweet.message }}</p>

            <!-- likes  -->
            <div class="flex">
                <div class="mt-5 text-white flex ml-auto justify-center">
                    <span class="fas fa-like">
                    <svg class="h-6 w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" /></svg>
                    </span>
                    <span
                        class="text-xl flex-1 ml-2"
                    >{{ tweet.likes }}</span>
                </div>
            </div>

        </div>
    </div>
</template>
