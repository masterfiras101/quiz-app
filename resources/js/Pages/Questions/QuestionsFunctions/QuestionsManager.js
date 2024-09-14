// QuestionsManager.js

import { ref, computed } from 'vue';
import {router, usePage } from '@inertiajs/vue3';

// State management
export const show_question_model = ref(false);
export const page = usePage();
export const success = computed(() => page.props.flash.success);
export const question_create_model_show = ref(false);
export const question_created = ref(null);
export const answers_new = ref([]);
export const answerId = ref(1);
export const selected_answer = ref(null);
export const selected_question = ref(null);
export const answers_update = ref([]);
export const selected_edit_answer = ref(null);
export const edit_question_modal = ref(false)
export const question_edit = ref(null)
export const deleteConfirm_question_modal = ref(false)
export const question_id = ref(null)

export const appName = computed(()=>page.props.APP_NAME);
// All Functions

// Function to create a question
export function createQuestion() {
    question_create_model_show.value = true;
}

// Function to edit question moda;
export function editQuestion(index){
    edit_question_modal.value = true;
    question_edit.value=page.props.questions[index];

}
// Function to update question
export function updateQuestion(){
    router.put('/questions-main-page',question_edit.value)
}
export function deleteConfirm(q_id){
    deleteConfirm_question_modal.value = true;
    question_id.value =  q_id;
    // alert(delete_question_id.value);
}
// Function to delete question
export function deleteQuestion(){
    router.delete('/questions-main-page/'+question_id.value)

    // router.on('before',()=>{
    //  return confirm('about delete question , are u sure to delete question ?')
    // });
}

// Function to destroy modal
export function destroyModal() {
    question_create_model_show.value = false;
    show_question_model.value = false;
    edit_question_modal.value = false;
    deleteConfirm_question_modal.value = false;
}

// Function to add a new answer
export function addAnswer() {
    const new_answer = {
        id: answerId.value++,
        answer: '',
        correct_answer: 0,
    };
    answers_new.value.push(new_answer);
}

// Function to handle correct answer radio button
export function correct_answer_radio(answer_id) {
    selected_answer.value = answer_id;
    answers_new.value.forEach(answer => {
        answer.correct_answer = (answer.id === answer_id) ? 1 : 0;
    });
}

// Function to validate answers
export function validateAnswers() {
    return answers_new.value.every(answer => answer.answer.trim() !== '');
}

// Function to check if the number of answers is correct
export function answersCount() {
    if (answers_new.value.length < 4) {
        alert('Required four answers');
        return false;
    } else if (answers_new.value.length === 4) {
        return true;
    }
    return false;
}

// Function to submit a question
export function submitQuestion() {
    if (!question_created.value) {
        alert('Question is empty');
        return false;
    }
    if (!validateAnswers() || !answersCount()) {
        alert('Fill all inputs');
        return false;
    }
    router.post('/questions-main-page', {
        question: question_created.value,
        answers: answers_new.value,
    });
    router.on('success', () => {
        question_created.value = null;
        answers_new.value = [];
    });
}

// Function to show question details
export function showQuestionDetails(index) {
    show_question_model.value = true;
    selected_question.value = page.props.questions[index];
    answers_update.value = page.props.questions[index].answers;
}

// Function to update answers
export function updateAnswers() {
    router.put('/answers-main-page', answers_update.value);
}

// Function to handle answer radio button change
export function change_answer_radio(ID) {
    selected_edit_answer.value = ID;
    answers_update.value.forEach(answer => {
        answer.correct_answer = (answer.id === ID) ? 1 : 0;
    });
}
