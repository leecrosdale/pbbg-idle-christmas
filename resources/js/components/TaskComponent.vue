<template>

    <div @click="start" class="col-md-3 border m-3 p-3 bg-secondary text-white-50">
        {{ task.name }} - {{ item.name }}
        {{ quantity }}

        <div class="progress w-100">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                 role="progressbar"
                 v-bind:aria-valuenow="currentProgress"
                 aria-valuemin="0"
                 aria-valuemax="100"
                 v-bind:style="{ width: currentProgress + '%', height: '1rem' }">
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "TaskComponent",
    created() {
        if (this.active_task) {
            this.start();
        }
    },
    props: {
        task: {
            required: true,
            type: Object
        },
        item: {
            required: true,
            type: Object
        },
        start_quantity: {
            required: false,
            type: Number,
            default: 0
        },
        quantity_per_tick: {
            required: false,
            type: Number,
            default: 1
        },
        seconds_per_tick: {
            required: false,
            type: Number,
            default: 1
        },
        active_task: {
            required: false,
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            quantity: this.start_quantity,
            interval: null,
            currentProgress: 0,
            currentSeconds: 0,
        }
    },
    methods: {

        start() {
            axios.get('/task/' + this.task.id + '/start').then(response => {
                this.interval = window.setInterval(() => this.tick(), 1000);
            });
        },
        tick() {
            this.currentSeconds++;

            this.recalculateCurrentProgress();

            if (this.currentSeconds >= this.seconds_per_tick) {
                this.quantity += this.quantity_per_tick;
                this.currentSeconds = 0;
            }

            this.recalculateCurrentProgress();


        },
        stop() {
            clearInterval(this.interval)
        },
        recalculateCurrentProgress() {
            const upper = this.seconds_per_tick;
            const lower = this.seconds_per_tick - this.currentSeconds;
            this.currentProgress = (100 - Math.ceil(Math.abs((lower / upper) * 100)));
        },
    }
}
</script>

<style scoped>

</style>
