
<script setup>
import {Link} from '@inertiajs/vue3'
</script>

<template>

    <Head title=" من نحن" />

    <div class="main_splash">
        <n class="mt-3 flex   items-center justify-center">
         <p class="items-center sitename"> من نحن</p>
       </n>

<div class="grid">
  <div class="blur"></div>
</div>


<div class="title">
    <p style="letter-spacing: -0.2rem; align-self: flex-end ;font-size: 40px;">إشراف : أ/ محمد مقنم    </p>
    <p class="">:طور بواسطة </p>

    <div class="developer-text-grid">
        <div class="developer-item">غسان شكيب</div>
        <div class="developer-item">فراس محمد</div>
        <div class="developer-item">صالح السلمي</div>
        <div class="developer-item">سليم عايض</div>
        <div class="developer-item">محمد صلاح المنيفي</div>
        <div class="developer-item">اكرم اليفاعي</div>
        <div class="developer-item">عبدالوهاب مشرح </div>
        <div class="developer-item">جمال الهمداني</div>
        <div class="developer-item"> مهند الجرادي</div>
    </div>
</div>


<Link href="/" target="_blank" class="button first">
    <button>عودة</button><span></span>
</Link>


</div>

</template>

<style>

.developer-text-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
    text-align: center;
    max-width: 700px;
    margin: 0 auto;
}

.developer-item {
    flex: 1 1 calc(50% - 30px);
    font-size: 18px;
    padding: 10px;
    letter-spacing: -0.1rem;
     color: hsl(155, 100%, 65%);
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

@media (max-width: 768px) {
    .developer-item {
        flex: 1 1 calc(50% - 30px); /* Full width for smaller screens */

        font-size: 16px;
    }
}

</style>
<style scoped src="../../../css/splash_page_css.css"></style>

