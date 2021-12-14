<template>
    <ul class="navbar-nav ms-auto">
    <li class="nav-item" v-for="skill in skills">
        <a class="nav-link" :href="'/skill/' + skill.skill.slug">
            {{ skill.skill.name }} ({{ skill.level }} / {{ skill.skill.max_level }})
            <br/>
            {{ skill.experience }} / {{ skill.level * 110 * skill.level }}
        </a>
    </li>
    </ul>
</template>

<script>
import {mapGetters, mapActions} from "vuex";

export default {
    name: "SkillComponent",
    mounted() {
        this.setSkills(this.initial_skills);
        this.intervalId = setInterval(() => this.tick(), 30000);
    },
    props: {
        initial_skills: {
          required: true,
          type: Array
      }
    },
    data() {
        return {
            intervalId: null
        }
    },
    methods: {
        ...mapActions({
            setSkills: 'skills/setSkills'
        }),
        tick() {
            axios.get('/skills').then(response => {
                this.setSkills(response.data.skills);
            });
        }
    },
    computed: {
        ...mapGetters({
            skills: 'skills/getSkills'
        })
    }
}
</script>

<style scoped>

</style>
