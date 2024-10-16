

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

  <div class="blur"></div>
</div>

<div class="title-all-questions">
  <p>{{ language }}</p>

</div>

<div class="container">
    <div class="quizz-answer">

    <div class="">
        <question_text class="flex justify-end">
                <Link href="/generate-exam-choose-language" target="_blank" class="button-lang ">
        <d  class=""> عودة
        </d>
    </Link>
        </question_text>
    </div>
    <div class="">
     <form @submit.prevent="submitAnswers">
      <!-- Display the current question -->
      <div v-if="currentQuestionIndex < questions.length" class="question mb-4">
        <h2 class="d-flex justify-content-center">{{ questions[currentQuestionIndex].title }}</h2>
            <div class="custom-radio-grou option  d-flex justify-content-center" v-for="(option, key) in questions[currentQuestionIndex].options" :key="key">
            <label class="custom-radio-container w-100 m-1 d-flex justify-content-center">
                 <input :class="{'selected': key === currentQuestionIndex}"
              type="radio"
              :name="'question_' + currentQuestionIndex"
              :value="key"
              v-model="answers[currentQuestionIndex]"
            />
            <label >

                <span class="custom-radio-checkmark"></span>
                {{ option }}

            </label>
            </label>

            </div>

      </div>
      <!-- Navigation buttons -->
      <div class="navigation-buttons d-flex  justify-content-center m-2">
        <a   class="button-lang"
          v-if="currentQuestionIndex > 0"
          type="button"
          @click="prevQuestion">
          السابق
      </a>
        <a class="button-lang "
          v-if="currentQuestionIndex < questions.length - 1"
          type="button"
          @click="nextQuestion">
          التالي
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
  border: 2px solid white;
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
  border: 2px solid white;
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
<style scoped src="../../../../css/app.scss"></style>

