const state = {
    character_items: [],
};

const getters = {
    getCharacterItems(state) {
        return state.character_items;
    },
    getCharacterItem(state) {
        return (itemId) => state.character_items.find(item => item.item_id === itemId);
    }
};

const mutations = {
    setCharacterItems(state, items) {
        state.character_items = items;
    }
};

const actions = {
    setCharacterItems({commit}, items) {
        commit('setCharacterItems', items)
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
