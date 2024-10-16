



<script setup>
import { Head,Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import { ref } from 'vue';
const printSection = ref(null);


// async function printReport() {
//   // استدعاء نافذة الطباعة
//   window.print();
// }

function printReport() {
  const printContent = printSection.value.innerHTML;
  const originalContent = document.body.innerHTML;

  // استبدال محتوى الصفحة بالمحتوى المحدد للطباعة
  document.body.innerHTML = printContent;

  // استدعاء نافذة الطباعة
  window.print();

  // إعادة المحتوى الأصلي بعد الطباعة
  document.body.innerHTML = originalContent;
}
const props = defineProps({
    percentag: Number,
    comment : String
});

</script>


<template>

    <Head title="Report" />
    <AuthenticatedLayout>
        <template class="dark:bg-slate-950" #header>
            <h2 class="text-xl text-center font-semibold leading-tight text-white dark:bg-slate-950 dark:text-white ">
                تقرير بالإختبار الذي قمت به
            </h2>
            <div class="flex justify-end">
                <div class="flex">

                    <PrimaryButton class="ms-4 block" @click="printReport">
                        طباعة
                    </PrimaryButton>
                    <PrimaryButton class="ms-4 block bg-blue-600">

                        pdf حفظ
                    </PrimaryButton>
                    <Link href="/questions-main-page" target="_blank" class="">
                    <PrimaryButton class="ms-4 block bg-blue-600">

                        عودة
                    </PrimaryButton>
                        </Link>

                </div>

            </div>
        </template>
        <div class="w-full  h-full overflow-hidden bg-slate-950">

            <div ref="printSection" class="max-w-xl bg-slate-500 mx-auto p-8 rounded shadow-sm my-6" id="report">

                <div class="flex justify-center">
                    <p class="text-white text-cente  text-xl">أسئلة البرمجة الشاملة </p>
                </div>
                <div class="grid grid-cols-2 items-center">
                    <div>
                        <!--  Company logo  -->
                        <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="company-logo" height="100" width="100"> -->
                        <img src="/assets/icons/ic_report.png" alt="report-logo" height="70" width="80">
                        <p class="ml-3">تقرير</p>
                    </div>

                    <div class="text-right">
                        <p class="text-white text-sm">

                        <div class="text-base font-medium text-white">
                            {{ $page.props.auth.user.name }} : اسم المستخدم
                        </div>
                        <div class="text-sm font-medium text-white">
                            {{ $page.props.auth.user.email }}:البريد الإلكتروني
                        </div>
                        </p>

                        <p class="text-gray-700 text-sm mt-1">
                        <div class="text-sm font-medium text-white">
                            +967 000 000 : الهاتف
                        </div>
                        </p>

                    </div>
                </div>

                <!-- Client info -->
                <div class="grid grid-cols-2 items-center mt-8">
                    <!-- <div>
                  <p class="font-bold text-white">
                    Bill to :
                  </p>
                  <p class="text-white">
                    Laravel LLC.
                    <br />
                    102, San-Fransico, CA, USA
                  </p>
                  <p class="text-white">
                    info@laravel.com
                  </p>
                </div> -->

                    <!-- <div class="text-right">
                  <p class="">
                    Report number:
                    <span class="text-white">INV-2023786123</span>
                  </p>
                  <p>
                    Report date: <span class="text-white">03/07/2023</span>
                    <br />
                    Due date:<span class="text-white">31/07/2023</span>
                  </p>
                </div> -->
                </div>

                <!-- Report Items -->
                <div class="-mx-4 mt-8 flow-root sm:mx-0">
                    <table class="min-w-full">
                        <colgroup>
                            <col class="w-full sm:w-1/3">
                            <col class="sm:w-1/7">
                            <col class="sm:w-1/8">
                            <col class="sm:w-1/8">
                        </colgroup>
                        <thead class="border-b border-gray-300 text-white">
                            <tr>
                                <th scope="col"
                                    class="py-2.5 pl-4 pr-3  text-center text-sm font-semibold text-white sm:pl-0">
                                    المجموع</th>
                                <th scope="col"
                                    class="hidden px-3 py-3.5 text-right text-sm font-semibold text-white sm:table-cell">
                                    العدد</th>
                                <th scope="col"
                                    class="hidden px-3 py-3.5 text-right text-sm font-semibold text-white sm:table-cell">
                                    الخاطءة</th>
                                <th scope="col"
                                    class="hidden px-3 py-3.5 text-right text-sm font-semibold text-white sm:table-cell">
                                    الصحيحة</th>
                                <th scope="col"
                                    class="py-3.5 px-5  pr-3 text-righ text-sm font-semibold text-white sm:pr-0">اللغة
                                    او التقنية</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200">
                                <td class="max-w-0  py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="font-medium text-center text-white">10</div>
                                    <div class="mt-1 truncate text-center font-bold text-white">ركز جيدا انها لعة مهمه
                                    </div>
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold  text-sm text-white sm:table-cell">10
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold text-sm text-white sm:table-cell">3
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold text-sm text-white sm:table-cell">3
                                </td>
                                <td class="py-5 pl-3 pr-4 text-center font-bold  text-sm text-white sm:pr-0">javascript
                                </td>
                            </tr>

                            <tr class="border-b border-gray-200">
                                <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="font-medium text-center text-white">4</div>
                                    <div class="mt-1 truncate text-cente font-boldr  text-white">ركز جيدا انه اطار مهم
                                    </div>
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold text-sm text-white sm:table-cell">10
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold text-sm text-white sm:table-cell">3
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold text-sm text-white sm:table-cell">3
                                </td>
                                <td class="py-5 pl-3 pr-4 text-center font-bold  text-sm text-white sm:pr-0">laravel
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200">
                                <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="font-medium text-center text-white">6</div>
                                    <div class="mt-1 truncate text-center text-white">ركز جيدا انها الافضل </div>
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold  text-sm text-white sm:table-cell">10
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold text-sm text-white sm:table-cell">3
                                </td>
                                <td class="hidden px-3 py-5 text-center font-bold text-sm text-white sm:table-cell">3
                                </td>
                                <td class="py-5 pl-3 pr-4 text-center font-bold  text-sm text-white sm:pr-0">vueتs</td>
                            </tr>
                        </tbody>
                        <tfoot class="border ">
                            <tr>
                                <td class="pl-3 pr-6  pt-6 text-right text-sm text-white sm:pr-0">9</td>
                                <th scope="row" colspan="3"
                                    class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal text-white sm:table-cell sm:pl-0">
                                    الإجابات الصحيحة</th>
                                <th scope="row" colspan="3"
                                    class="hidden pl-6 pr-3 pt-6 text-right text-sm font-normal text-white sm:hidden">
                                    Subtotal</th>
                                <th scope="row"
                                    class="pl-6 pr-3 pt-6 text-left text-sm font-normal text-white sm:hidden">Subtotal
                                </th>
                            </tr>
                            <tr>
                                <td class="pl-3 pr-6 pt-6 text-right text-sm text-white sm:pr-0">12</td>
                                <th scope="row" colspan="3"
                                    class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal text-white sm:table-cell sm:pl-0">
                                    الإجابات الخاطئة</th>
                                <th scope="row"
                                    class="pl-6 pr-3 pt-6 text-right text-sm font-normal text-white sm:hidden">Subtotal
                                </th>
                                <th scope="row"
                                    class="pl-6 pr-3 pt-6 text-right text-sm font-normal text-white sm:hidden">Subtotal
                                </th>
                            </tr>
                            <tr>
                                <td class="pl-3 pr-6 pt-6 text-right text-sm text-white sm:pr-0">26</td>
                                <th scope="row" colspan="3"
                                    class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal text-white sm:table-cell sm:pl-0">
                                    إجمالي الإجابات</th>
                                <th scope="row"
                                    class="pl-6 pr-3 pt-6 text-right text-sm font-normal text-white sm:hidden">Subtotal
                                </th>
                                <th scope="row"
                                    class="pl-6 pr-3 pt-6 text-right text-sm font-normal text-white sm:hidden">Subtotal
                                </th>
                            </tr>
                            <tr>
                                <td class="pl-3 pr-2 pt-6 text-right text-sm text-white sm:pr-0">{{comment}}</td>
                                <th scope="row" colspan="3"
                                    class="hidden pl-2 pr-3 pt-6 text-right text-sm font-normal text-white sm:table-cell sm:pl-0">
                                    التقدير العام</th>
                                <td class="pl-3 pr-2 pt-6 text-right text-sm text-white sm:pr-0">{{percentag}}</td>
                                <th scope="row" colspan="3"
                                    class="hidden pl-5 pr-1 pt-6 text-right text-sm font-normal text-white sm:table-cell sm:pl-0">
                                    :النسبة</th>
                                <th scope="row"
                                    class="pl-6 pr-3 pt-6 text-right text-sm font-normal text-white sm:hidden">Subtotal
                                </th>
                                <th scope="row"
                                    class="pl-6 pr-3 pt-6 text-right text-sm font-normal text-white sm:hidden">Subtotal
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!--  Footer  -->
                <div class="border-t-2 pt-4 text-xs text-white text-center mt-10">
                    devtrust@gmail.com
                    شكرا لاستخدامك موقعنا للتواصل مع الدعم
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>


