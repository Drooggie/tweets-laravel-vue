<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue'
import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';

const props = defineProps(['tweet'])
const commenting = ref(false);
const comments = ref([])

const form = useForm({
    comment: '',
});


function showComments () {
    axios.get(`comment/${props.tweet.id}`).then((response) => {
        console.log(response)
        comments.value = [];
        comments.value.push(...response.data)
    });
}
function toggleCommentVisibility () {
    commenting.value = commenting.value ? false : true
}
</script>

<template>
    <div class="text-white mt-5">
        <PrimaryButton @click="toggleCommentVisibility(); showComments()" style="background-color: rgb(15 23 42);">
            Comment
        </PrimaryButton>


        <div v-if="commenting">
            <form @submit.prevent="form.post(route('tweets.comments.store', tweet.id), {onSuccess: () => form.reset() })" class="my-5">
                <textarea v-model="form.comment" class="h-24 w-full text-white border-gray-600 bg-slate-900 focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm placeholder-white"></textarea>
                <div class="flex">
                    <div class="ml-auto mt-3">
                        <Button class="mr-3" @click="commenting = false">
                            Close
                        </Button>
                    </div>
                    <InputError :message="form.errors.message" class="mt-2" />
                    <PrimaryButton style="background-color: rgb(15 23 42);" @onclick="showComments">
                        Send
                    </PrimaryButton>
                </div>
            </form>

            <div
                v-for="comment in comments"
                :key="comment.id"
            >
                <div class="inline-block bg-slate-900 rounded-md px-5 my-1">
                    <p class="my-3">{{ comment.content }}</p>
                </div>
            </div>

        </div>
    </div>
</template>
