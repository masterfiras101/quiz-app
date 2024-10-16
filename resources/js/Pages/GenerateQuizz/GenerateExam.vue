

<script setup>

import { Link ,router } from '@inertiajs/vue3';

const props = defineProps({
  languages: Array
});

const languages = props.languages;

const startQuiz = (language) => {
  router.visit('/generate-exam-choose-language/'+language);
};
</script>

<template>
    <Head title="توليد اختبار" />

    <div class="main_splash">
<n class="mt-3 flex   items-center justify-center">
    <p class="items-center sitename"> توليد اختبار</p>

</n>

<div class="grid">
  <div class="blur"></div>
</div>

<Link href="/generate-single-quizz" target="_blank" class="button-lang btn ">
        <d  class=""> عودة
        </d>
    </Link>
<div class="title-all-questions">
  <p>قم باختيار اللغة او التقنية لبد ء الإختبار</p>

</div>

<div class="grid-container">
  <div  v-for="(language, index) in languages" :key="index"  class="grid-item">  <div  class="col">

    <a  @click="startQuiz(language)"  class="button-lang btn ">
            <language_quizz> {{ language }}
            </language_quizz>
        </a>
  </div></div>


</div>



<!--  -->
</div>


</template>

<style scoped src="../../../css/choose-language.css"></style>
<style scoped src="../../../css/splash_page_css.css"></style>
