<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import {useForm} from '@inertiajs/vue3'

const form = useForm({
    search: '',
})

</script>


<template>
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form class="p-2">
                <TextInput class="block w-full rounded-3xl"/>
                <PrimaryButton class="mt-5 bg-slate-900">Search</PrimaryButton>
            </form>
            <div class="w-full mt-2 bg-black h-screen border border-white p-2">ss</div>
        </div>
    </AuthenticatedLayout>
</template>
