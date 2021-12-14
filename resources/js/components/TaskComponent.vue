<template>

    <div @click="start" class="col-md-6 border m-3 p-3 text-center text-white-50" :class="isActive ? 'bg-primary' : 'bg-secondary'">
        <div>{{ task.name }}</div>
        <div>{{ task.title }}</div>
        <div><span class="badge bg-success">{{ task.item_quantity }}</span> x {{ item.name }} - <span class="badge bg-success">{{ quantity }}</span></div>
        <div>every <span class="badge bg-success">{{ task.time_in_seconds }}</span> seconds</div>

        <div v-if="task.items_required">
            Requires
            <p v-for="(qty, slug) in task.items_required">
                <span class="badge bg-danger">{{ qty }}</span> x {{ slug }}
                <span class="badge bg-success">
                    {{ showItemQuantity(slug) }}
                </span>
            </p>
        </div>

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

import {mapGetters, mapActions} from 'vuex';

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
            intervalId: null,
            currentProgress: 0,
            currentSeconds: 0,
        }
    },
    computed: {
        ...mapGetters({
            activeTask: 'task/getActiveTask',
            items: 'items/getItems',
            getItem:  'items/getItem',
            getCharacterItem: 'characterItems/getCharacterItem',
        }),
        isActive() {
            return this.activeTask.id === this.task.id;
        }
    },
    methods: {
        ...mapActions({
            setActiveTask: 'task/setActiveTask',
            setItems: 'items/setItems',
            setCharacterItems: 'characterItems/setCharacterItems'
        }),
        showItemQuantity(slug) {

            let item = this.getItem(slug);

            if (item) {
                let characterItem = this.getCharacterItem(item.id);
                if (characterItem) {
                    return characterItem.quantity;
                }

            }
            return 0;
        },
        start() {
            axios.get('/task/' + this.task.id + '/start').then(response => {


                this.setActiveTask(this.task);
                this.startTick();
                this.setItems(response.data.items);
                this.setCharacterItems(response.data.character_items);
            });
        },
        startTick() {
            this.intervalId = setInterval(() => this.tick(), 1000);
        },
        tick() {
            if (this.activeTask.id !== this.task.id) {
                this.stop();
                return;
            }

            this.currentSeconds++;

            this.recalculateCurrentProgress();

            if (this.currentSeconds >= this.seconds_per_tick) {

                this.stop();
                // this.quantity += this.quantity_per_tick;
                this.currentSeconds = 0;

                axios.get('/task/' + this.task.id + '/work').then(response => {
                    this.quantity += response.data.task.item_quantity;
                    this.startTick();
                    this.recalculateCurrentProgress();
                    this.setItems(response.data.items);
                    this.setCharacterItems(response.data.character_items);
                }).catch(error => {
                    console.log(error);
                    this.currentSeconds = 0;
                    this.stop();
                    this.setActiveTask({});
                });
            }
        },
        stop() {
            clearInterval(this.intervalId)
            this.intervalId = null;
            this.recalculateCurrentProgress();
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
