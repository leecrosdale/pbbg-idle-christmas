const state = {
    skills: [],
};

const getters = {
    getSkills(state) {
        return state.skills;
    }
};

const mutations = {
    setSkills(state, skills) {
        state.skills = skills;
    }
};

const actions = {
    setSkills({commit}, skills) {
        commit('setSkills', skills)
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
