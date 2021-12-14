const state = {
    items: [],
};

const getters = {
    getItems(state) {
        return state.items;
    },
    getItem(state) {
         return (slug) => state.items.find(item => item.slug === slug);
    }
};

const mutations = {
    setItems(state, items) {
        state.items = items;
    }
};

const actions = {
    setItems({commit}, items) {
        commit('setItems', items)
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
