<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Tweet from '@/Components/Tweet.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm, router } from '@inertiajs/vue3';
import { useIntersectionObserver } from '@vueuse/core';
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps(['tweets']);

const form = useForm({
    message: '',
})

const toLoad = ref(null)
const tweetState = ref(props.tweets.data)

useIntersectionObserver(toLoad, ([{ isIntersecting }]) => {
    if (!isIntersecting) {
        return
    }
    axios.get(props.tweets.links.next).then((response) => {
        tweetState.value = [...tweetState.value, ...response.data.data]
    })
})
</script>

<template>
    <Head  title="Tweets"/>

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('tweets.store'), { onSuccess: () => form.reset() })">
                <textarea
                v-model="form.message"
                placeholder="Tweet?"
                class="block w-full border-slate-700 bg-black text-white focus:border-slate-900 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm placeholder-white"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>

            <div class="mt-6 divide-y">
                <Tweet
                    v-for="tweet in tweetState"
                    :key="tweet.data"
                    :tweet="tweet"
                    :user="tweet.user"
                />
                <div ref="toLoad"></div>
            </div>

        </div>

    </AuthenticatedLayout>
</template>
