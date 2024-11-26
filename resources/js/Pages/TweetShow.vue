<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Tweet from '@/Components/Tweet.vue'

defineProps(['tweet'])

</script>

<template>
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <Tweet
            :key="tweet.id"
            :tweet="tweet"
            />
        </div>
    </AuthenticatedLayout>
</template>
