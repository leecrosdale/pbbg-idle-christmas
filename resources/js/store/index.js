import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import task from './modules/Task';

export default new Vuex.Store({
    modules: {
        task,
    }
})
