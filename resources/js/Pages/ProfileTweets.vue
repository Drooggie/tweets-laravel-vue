<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Tweet from '@/Components/Tweet.vue';
import ProfileHeaderComponent from '@/Components/ProfileHeaderComponent.vue';
import { Head, useForm } from '@inertiajs/vue3';


defineProps(['tweets'])

const form = useForm({
    message: '',
})
</script>

<template>
    <Head  title="Tweets"/>

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <ProfileHeaderComponent>

            </ProfileHeaderComponent>

            <div class="mt-6 bg-black shadow-sm rounded-lg divide-y block">
                <Tweet
                    v-for="tweet in tweets"
                    :key="tweet.id"
                    :tweet="tweet"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
