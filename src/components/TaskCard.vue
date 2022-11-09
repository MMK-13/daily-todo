<template>
	<div class="task" draggable="true" @dragstart="startDarg($event)" @click="taskOptions">
		<div class="task__header">
			<div class="title">
				{{ title }}
			</div>
			<div class="hour">
				{{ hour }}
			</div>
		</div>
		<div class="task__body">
			{{ content }}
		</div>
		<div class="task__info">
			<div class="info">
				{{ category }}
			</div>
		</div>
		<Transition name="fade2">
			<TaskOptionModal v-if="showModal && status!=='done'" :task_id="id" :status_name="status" @closed="closeOption" />
		</Transition>
	</div>
</template>

<script>
	import { mapActions } from 'vuex'
	import TaskOptionModal from './TaskOptionModal'

	export default {
		name: 'TaskCard',
		components: {
			TaskOptionModal,
		},
		mounted() {
			this.parent_id = this.parent
		},
		props: ['id', 'title', 'content', 'parent', 'hour', 'color', 'status', 'category'],
		data() {
			return {
				parent_id: '',
				showModal: false,
			}
		},
		methods: {
			...mapActions(['setTask']),
			startDarg(event) {
				event.dataTransfer.dropEffect = 'move'
				event.dataTransfer.effectAllowed = 'move'
				this.setTask(this.id)
			},
			taskOptions() {
				this.showModal = true
			},
			closeOption() {
				console.log('Test: closed')
				this.$router.go()
			}
		},
	}
</script>

<style scoped>
	.fade2-enter-active,
	.fade2-leave-active {
		transition: opacity 0.5s ease;
	}

	.fade2-enter-from,
	.fade2-leave-to {
		opacity: 0;
	}
	.task {
		display: flex;
		flex-direction: column;
		gap: 2px;
		padding: 4px 8px;
		border: 1px solid #CACACA;
		border-radius: 4px;
		cursor: pointer;
		letter-spacing: .5px;
		background-image: linear-gradient(#FFF, #FAFAFA);
		box-shadow: 2px 2px 1px #F0F0F0;
		border-left: 4px solid v-bind(color);
	}
	.task:hover {
		box-shadow: 2px 2px 1px #A0A0A0;
	}
	.task__header {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
	}
	.task__info {
		display: flex;
		flex-direction: row;
		gap: 4px;
	}
	.info {
		font-size: 12px;
		padding: 2px 4px;
		background-color: v-bind(color);
		color: #FFF;
		border-radius: 4px;
	}
	.title {
		font-size: 16px;
		font-weight: 700;
		color: #0A0A0A;
	}
	.hour {
		font-size: 14px;
		opacity: .75;
	}
	.task__body {
		font-size: 12px;
		color: #2A2A2A;
	}
</style>