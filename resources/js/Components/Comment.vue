<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';


const form = useForm({
    comment: '',
});

const commenting = ref(false);
</script>

<template>
    <div class="text-white mt-5">
        <PrimaryButton @click="commenting = true" style="background-color: rgb(15 23 42);">
            Comment
        </PrimaryButton>


        <div v-if="commenting">
            <form class="my-5">
                <textarea v-model="form.comment" class="h-24 w-full text-white border-gray-600 bg-slate-900 focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm placeholder-white"></textarea>
                <div class="flex">
                    <div class="ml-auto mt-3">
                        <PrimaryButton class="mr-3" style="background-color: rgb(15 23 42);" @click="commenting = false">
                            Close
                        </PrimaryButton>
                        <PrimaryButton style="background-color: rgb(15 23 42);">
                            Send
                        </PrimaryButton>
                    </div>
                </div>
            </form>

            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error ab sint blanditiis tenetur possimus aspernatur, quis deleniti officia soluta cum ipsum dolores consectetur at, quia, dolore nisi! Saepe, architecto iusto!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error ab sint blanditiis tenetur possimus aspernatur, quis deleniti officia soluta cum ipsum dolores consectetur at, quia, dolore nisi! Saepe, architecto iusto!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error ab sint blanditiis tenetur possimus aspernatur, quis deleniti officia soluta cum ipsum dolores consectetur at, quia, dolore nisi! Saepe, architecto iusto!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error ab sint blanditiis tenetur possimus aspernatur, quis deleniti officia soluta cum ipsum dolores consectetur at, quia, dolore nisi! Saepe, architecto iusto!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error ab sint blanditiis tenetur possimus aspernatur, quis deleniti officia soluta cum ipsum dolores consectetur at, quia, dolore nisi! Saepe, architecto iusto!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error ab sint blanditiis tenetur possimus aspernatur, quis deleniti officia soluta cum ipsum dolores consectetur at, quia, dolore nisi! Saepe, architecto iusto!</p>
        </div>
    </div>
</template>
