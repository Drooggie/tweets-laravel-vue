<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue'
import {useForm} from '@inertiajs/vue3'
import Tweet from '@/Components/Tweet.vue'

defineProps(['tweets'])

const form = useForm({
    search: '',
})

</script>


<template>
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 text-white">

            <form @submit.prevent="form.get(route('explore.search'), { onSuccess: () => form.reset() })">
                <TextInput
                v-model="form.search"
                placeholder="Explore"
                class="block w-full border-slate-700 bg-black text-white focus:border-slate-900 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm placeholder-white"
                ></TextInput>
                <InputError :search="form.errors.search" class="mt-2" />
                <PrimaryButton class="mt-4">Search</PrimaryButton>
            </form>

            <div class="mt-6 divide-y">
                <Tweet
                    v-for="tweet in tweets.data"
                    :key="tweet.id"
                    :tweet="tweet"
                />
                <div ref="toLoad"></div>
            </div>

        </div>
    </AuthenticatedLayout>
</template>
