import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import task from './modules/Task';
import skills from './modules/Skills';
import items from './modules/Items';
import characterItems from './modules/CharacterItems';

export default new Vuex.Store({
    modules: {
        task,
        skills,
        items,
        characterItems,
    }
})
