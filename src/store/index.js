import { createStore } from 'vuex'

const state = {
	selected_task: undefined,
	selected_board: undefined,
	boards: [],
	tasks: [],
	categories: [],
	statues: [],
}

const getters = {
	getStatues: (state) => state.statues,
	getCategories: (state) => state.categories,
	getBoards: (state) => state.boards,
	getTasksByBoard: (state) => (parent, status) => state.tasks.filter((task) => task.parent === parent && task.status === status),
}

const mutations = {
	SET_BOARDS: (state, data) => state.boards = data,
	SET_TASKS: (state, data) => state.tasks = data,
	SET_CATEGORIES: (state, data) => state.categories = data,
	SET_STATUES: (state, data) => state.statues = data,

	SET_SELECTED_TASK: (state, id) => state.selected_task = id,
	SET_SELECTED_BOARD: (state, id) => state.selected_board = id,
	SET_TASK_PARENT: (state) => {
		for (let i in state.tasks) {
			if (state.tasks[i].id === state.selected_task)
				state.tasks[i].parent = state.selected_board
		}
	},
	UNSET_SELECTIONS: (state) => {
		state.selected_task = undefined
		state.selected_board = undefined
	}
}

const actions = {
	loadData: (store) => {
		fetch('http://todo.ru/all')
		.then((response) => response.json())
		.then((data) => {
			console.log(data)
			store.commit('SET_BOARDS', data.boards)
			store.commit('SET_TASKS', data.tasks)
			store.commit('SET_CATEGORIES', data.categories)
			store.commit('SET_STATUES', data.statues)
		})
	},
	setTask: (store, id) => {
		store.commit('SET_SELECTED_TASK', id)
	},
	setBoard: (store, id) => {
		store.commit('SET_SELECTED_BOARD', id)
	},
	dropTaskInBoard: (store) => {
		console.log('Move Task #' + store.state.selected_task + ' to Board #' + store.state.selected_board)
		fetch('http://todo.ru/change-todo-date', {
			method: 'POST',
			body: JSON.stringify({
				task: store.state.selected_task,
				date: store.state.selected_board
			})
		}).then((response) => response.json())
		.then((data) => console.log(data))
		store.commit('SET_TASK_PARENT')
		store.commit('UNSET_SELECTIONS')

	}
}

export default createStore({
	state: state,
	getters: getters,
	mutations: mutations,
	actions: actions,
})
