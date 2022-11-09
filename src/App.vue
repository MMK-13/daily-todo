<template>
	<div class="container">
		<TopHeader />
		<div class="content">
			<TaskBoard v-for="board in getBoards" :key="board.date"
			:id="board.date" :title="board.date">
				<template #todo>
					<TaskCard v-for="task of getTasksByBoard(board.date, 'todo')"
					:key="task.id"
					:id="task.id"
					:title="task.title"
					:content="task.content"
					:parent="board.date"
					:hour="task.hour"
					:color="task.color"

					:status="task.status"
					:category="task.category"
					/>
				</template>
				<template #done>
					<TaskCard v-for="task of getTasksByBoard(board.date, 'done')"
					:key="task.id"
					:id="task.id"
					:title="task.title"
					:content="task.content"
					:parent="board.date"
					:hour="task.hour"
					:color="task.color"
					:status="task.status"
					:category="task.category"
					/>
				</template>
			</TaskBoard>
		</div>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	import TopHeader from './components/TopHeader'
	import TaskBoard from './components/TaskBoard'
	import TaskCard from './components/TaskCard'

	export default {
		name: 'App',
		mounted() {
			this.loadData()
		},
		components: {
			TopHeader,
			TaskBoard,
			TaskCard,
		},
		computed: {
			...mapGetters(['getBoards', 'getTasksByBoard']),
		},
		methods: {
			...mapActions(['loadData']),
		},
	}
</script>

<style scoped>
	.container {
		display: grid;
		grid-template-rows: 48px 1fr;
		grid-gap: 16px;
	}
	.content {
		display: flex;
		flex-direction: row;
		justify-content: space-evenly;
		flex-wrap: wrap;
		width: 80%;
		margin: 0 auto;
	}
</style>
