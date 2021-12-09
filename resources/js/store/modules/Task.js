const state = {
    task: [],
    activeTask: {}
};

const getters = {
    getTask(state) {
        return state.task;
    },
    getActiveTask(state) {
        return state.activeTask;
    }
};

const mutations = {
    setTask(state, task) {
        state.task = task;
    },
    setActiveTask(state, activeTask) {
        state.activeTask = activeTask;
    }
};

const actions = {
    setTask({commit}, task) {
        commit('setTask', task)
    },
    setActiveTask({commit}, task) {
        commit('setActiveTask', task)
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
