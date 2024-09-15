

<script setup>



import { ref, defineProps } from 'vue';
import { Link , router } from '@inertiajs/vue3';

const props = defineProps({
  questions: Array,
  language: String
});

const answers = ref(new Array(props.questions.length).fill(null));
const result = ref(null);
const currentQuestionIndex = ref(0);


const nextQuestion = () => {
  if (currentQuestionIndex.value < props.questions.length - 1) {
    currentQuestionIndex.value++;
  }
};

const prevQuestion = () => {
  if (currentQuestionIndex.value > 0) {
    currentQuestionIndex.value--;
  }
};
const submitAnswers = () => {
  const answerData = answers.value.map((answer, index) => ({
    question: props.questions[index].title,
    selected: answer,
    correct: props.questions[index].correct
  }));

  router.post('/GenerateQuizz/GenerateSingleQuizzResult', {
    results: {
      score: calculateScore(answerData),
      totalQuestions: props.questions.length
    }
  }).then(response => {
    result.value = response.props.result;
  }).catch(error => {
    console.error('Error submitting answers:', error);
  });
};

const calculateScore = (answers) => {
  const correctAnswersCount = answers.reduce((carry, answer) =>
    carry + (answer.selected === answer.correct ? 1 : 0), 0);
  const percentage = (correctAnswersCount / answers.length) * 100;
  return {
    score: correctAnswersCount,
    percentage
  };
};

</script>


<template>
    <Head title="الأسئلة" />

    <div class="main_splash">
<n class="mt-3 flex   items-center justify-center">
    <p class="items-center sitename"> الأسئلة</p>

</n>

<div class="grid">
  <svg class="grid-svg" xmlns="http://www.w3.org/2000/svg" width="982" height="786" viewBox="0 0 982 786" fill="none">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M490 401V537H348.5V401H490ZM490 785.5V676H348.5V785.5H347.5V676H206V785.5H205V676H63.5V785.5H62.5V676H0V675H62.5V538H0V537H62.5V401H0V400H62.5V258H0V257H62.5V116H0V115H62.5V0H63.5V115L205 115V0H206V115L347.5 115V0H348.5V115H490V0H491V115L627.5 115V0H628.5V115H765V0H766V115L902.5 115V0H903.5V115H982V116H903.5V257H982V258H903.5V400H982V401H903.5V537H982V538H903.5V675H982V676H903.5V785.5H902.5V676H766V785.5H765V676H628.5V785.5H627.5V676H491V785.5H490ZM902.5 675V538H766V675H902.5ZM902.5 537V401H766V537H902.5ZM902.5 400V258H766V400H902.5ZM902.5 257V116L766 116V257H902.5ZM627.5 675H491V538H627.5V675ZM765 675H628.5V538H765V675ZM348.5 675H490V538H348.5V675ZM347.5 538V675H206V538H347.5ZM205 538V675H63.5V538H205ZM765 537V401H628.5V537H765ZM765 400V258H628.5V400H765ZM765 257V116H628.5V257H765ZM347.5 401V537H206V401H347.5ZM205 401V537H63.5V401H205ZM627.5 401V537H491V401H627.5ZM627.5 116L491 116V257H627.5V116ZM627.5 258H491V400H627.5V258ZM63.5 257V116L205 116V257H63.5ZM63.5 400V258H205V400H63.5ZM206 116V257H347.5V116L206 116ZM348.5 116V257H490V116H348.5ZM206 400V258H347.5V400H206ZM348.5 258V400H490V258H348.5Z" fill="url(#paint0_radial_1_8)" />
    <defs>
      <radialGradient id="paint0_radial_1_8" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(491 392.75) rotate(90) scale(513.25 679.989)">
        <stop stop-color="white" stop-opacity="0.2" />
        <stop offset="1" stop-color="#000" stop-opacity="0" />
      </radialGradient>
    </defs>
  </svg>
  <div class="blur"></div>
</div>

<div class="title-all-questions">
  <p>{{ language }}</p>

</div>

<div class="container">
    <div class="quizz-answer">

    <div class="">
        <question_text class="d-flex justify-content-end">
                <Link href="/generate-exam-choose-language" target="_blank" class="button-lang btn ">
        <d  class=""> رجوع
        </d>
    </Link>
        </question_text>
    </div>
    <div class="">
     <form @submit.prevent="submitAnswers">
      <!-- Display the current question -->
      <div v-if="currentQuestionIndex < questions.length" class="question">
        <h2 class="d-flex justify-content-center">{{ questions[currentQuestionIndex].title }}</h2>
            <div class="custom-radio-grou option  d-flex justify-content-center" v-for="(option, key) in questions[currentQuestionIndex].options" :key="key">
            <label class="custom-radio-container border w-100 d-flex justify-content-center">
                 <input :class="{'selected': key === currentQuestionIndex}"
              type="radio"
              :name="'question_' + currentQuestionIndex"
              :value="key"
              v-model="answers[currentQuestionIndex]"
            />
            <label>

                <span class="custom-radio-checkmark"></span>
                {{ option }}
            </label>
            </label>

            </div>

      </div>
      <!-- Navigation buttons -->
      <div class="navigation-buttons d-flex  justify-content-center m-2">
        <a   class="button-lang btn ml-5"
          v-if="currentQuestionIndex > 0"
          type="button"
          @click="prevQuestion">
          السابق
      </a>
        <a class="button-lang btn"
          v-if="currentQuestionIndex < questions.length - 1"
          type="button"
          @click="nextQuestion">
          التالي
        </a>
        <a class="button-lang"
          v-if="currentQuestionIndex === questions.length - 1"
          type="submit">
          Finish
    </a>
      </div>
    </form>
    <!-- Display the result after submission -->
    <div v-if="result !== null">
      <h3>النتيجة:</h3>
      <p>You scored {{ result.score }} out of {{ result.totalQuestions }} ({{ result.percentage }}%)</p>
    </div>
    <div  class="option">

    </div>


    </div>

    </div>

</div>

</div>
</template>


<style>

.custom-radio-group {
  display: flex;
  flex-direction: column;
  gap: 12px;
  border-radius: 12px;
  padding: 16px;
}
.custom-radio-container {
  position: relative;
  display: flex;
  align-items: center;
  cursor: pointer;
  padding: 12px 20px;
  border-radius: 8px;
  transition:
    background-color 0.3s ease,
    transform 0.3s ease,
    box-shadow 0.3s ease;
    font-size: 16px;

  user-select: none;
}
.custom-radio-container:hover {
  background-color: rgba(32, 255, 132, 0.699);
  transform: scale(1.03);
}
.custom-radio-container input[type="radio"] {
  opacity: 0;
  position: absolute;
}

@keyframes pulse {
  0% {
    transform: scale(1.2);
  }
  50% {
    transform: scale(1.4);
  }
  100% {
    transform: scale(1.2);
  }
}

</style>
<style scoped src="../../../../css/choose-language.css"></style>
<style scoped src="../../../../css/splash_page_css.css"></style>
