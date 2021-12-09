import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import task from './modules/Task';
import skills from './modules/Skills';

export default new Vuex.Store({
    modules: {
        task,
        skills
    }
})
