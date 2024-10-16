<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12 ">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
                <div class="overflow-hidden flex justify-center dark:bg-slate-900 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-white">
                        تم تسجيل دخول انت في لوحة التحكم
                    </div>

                </div>
                <Link href="/help" target="_blank" class="button sec"><button>مساعدة</button><span></span></Link>


            </div>
        </div>
    </AuthenticatedLayout>
</template>
