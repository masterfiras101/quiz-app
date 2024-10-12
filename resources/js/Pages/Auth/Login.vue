<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>
        
        <form @submit.prevent="submit">
            <div>
                <InputLabel class="text-right" for="email" value="البريد الإلكتروني" />
                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full text-right text-black"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2 text-right" :message="form.errors.email" />
            </div>
            <div class="mt-4">
                <InputLabel class="text-right" for="password" value="كلمة المرور" />
                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full text-black text-right"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <div class="mt-4 ">
                <label class="flex items-center justify-end ">
                    <span class="ms-2 text-sm text-gray-600 px-2"
                        >تذكرني</span
                    >
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    
                </label>
            </div>

            <div class="mt-4 flex  justify-center">
                <div class="">
                    <PrimaryButton
                    class="ms-4 block"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    دخول
                </PrimaryButton>
                <div class=" justify-center">

                        <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="rounded-md block ml-3  text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                    نسيت كلمة المرور
                    </Link>
                    <Link
                        :href="route('register')"
                        class="rounded-md  px-5 ml-2  pt-3 text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                    أنشأ حساب
                </Link>
                </div>
              </div>
            </div>
         
        </form>
    </GuestLayout>
</template>
