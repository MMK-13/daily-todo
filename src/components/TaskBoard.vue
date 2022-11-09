<template>
	<div class="tasks" @dragenter.prevent @dragover.prevent @drop="onDrop()">
		<div class="tasks__title">
			{{ title }}
		</div>
		<div class="tasks__body">
			<div class="todo">
				<h3 class="tasks__body-title">Не выполнено</h3>
				<slot name="todo"></slot>
			</div>
			<div class="done">
				<h3 class="tasks__body-title">Выполнено</h3>
				<slot name="done"></slot>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapActions } from 'vuex'

	export default {
		name: 'TaskBoard',
		props: {
			id: {
				type: String
			},
			title: {
				type: String,
				default: 'Tâches'
			},
		},
		methods: {
			...mapActions(['setBoard', 'dropTaskInBoard']),
			onDrop() {
				this.setBoard(this.id)
				this.dropTaskInBoard(this.id)
			}
		},
	}
</script>

<style scoped>
	.tasks {
		width: 240px;
		border: 1px solid #CACACA;
		border-radius: 4px;
		box-shadow: 2px 2px 2px #F0F0F0;
		height: fit-content;
	}
	.tasks__title {
		font-weight: 900;
		font-size: 18px;
		height: 32px;
		line-height: 32px;
		text-align: center;
		background-color: var(--primary-color);
		color: #FFF;
	}
	.tasks__body {
		display: flex;
		flex-direction: column;
		gap: 4px;
		padding: 8px;
	}
	.todo, .done {
		display: flex;
		flex-direction: column;
		gap: 4px;
	}
	.done {
		margin-top: 16px;
		border-top: 4px solid var(--primary-color);
		opacity: .5;
	}
</style>